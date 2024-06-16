<?php
    require("connect.php");

    $owner = $_POST['owner'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $taskName = $_POST['taskName'];
    $description =  $_POST['description'];
    $status = $_POST['status'];

    $sql = "INSERT INTO tasks (TaskName, Description, OwnerName, StartDate, EndDate, Status)
    VALUES ('$taskName', '$description', '$owner', '$startDate', '$endDate', '$status')";

$response = array();

if ($conn->query($sql) === TRUE) {
    $response['success'] = true;
} else {
    $response['success'] = false;
    $response['error'] = $conn->error;
}

echo json_encode($response);
?>