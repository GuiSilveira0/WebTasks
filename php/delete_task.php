<?php
if(isset($_POST['task_id'])) {
    require("connect.php");

    $idToDelete = $_POST['task_id'];
    $deleteQuery = "DELETE FROM tasks WHERE Id = $idToDelete";

    if(mysqli_query($conn, $deleteQuery)) {
        echo "Tarefa excluída com sucesso!";
        exit(); 
    } else {
        echo "Erro ao deletar tarefa: " . mysqli_error($conn);
    }
} else {
    echo "ID da tarefa não especificado.";
}
?>