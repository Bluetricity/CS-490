<?php
$dbserver = "sql1.njit.edu";
$user     = "sdp53";
$password = "oEnFrxKN";
$database = "sdp53";
$conn     = mysqli_connect($dbserver, $user, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$ouput   = array();
$sql     = "SELECT * FROM Tests";
$result  = $conn->query($sql);
$tid     = $result->num_rows - 1;
$sql2    = "SELECT * FROM Questions,TestQuestionRelation WHERE TestQuestionRelation.QuestionId=Questions.Id AND TestQuestionRelation.TestId='$tid'";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $output[] = array(
            'QuestionId' => $row['QuestionId'],
            'Question' => $row['Question'],
            'Points' => $row['Points'],
            'Signature' => $row['Signature']
        );
    }
} else {
    echo "0 results";
}
echo json_encode($output, true);
mysqli_close($conn);
?>