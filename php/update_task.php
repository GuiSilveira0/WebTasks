<?php
require("connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $taskId = $_POST['taskId'];
    $owner = $_POST['owner'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $taskName = $_POST['taskName'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $sql = "UPDATE tasks SET OwnerName='$owner', StartDate='$startDate', EndDate='$endDate', TaskName='$taskName', Description='$description', Status='$status' WHERE Id='$taskId'";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }

    $stmt->close();
    $conn->close();
}
?>