function deleteTask(taskId) {
    if (confirm('Tem certeza que deseja excluir esta tarefa?')) {
        console.log(taskId)
        $.ajax({
            url: 'php/delete_task.php',
            type: 'POST',
            data: {
                task_id: taskId
            },
            success: function(response) {
                alert('Tarefa excluída com sucesso!');
                location.reload();
            },
            error: function(xhr, status, error) {
                alert('Ocorreu um erro ao excluir a tarefa: ' + error);
            }
        });
    }
}