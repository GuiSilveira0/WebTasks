function editTask(taskId, owner, startDate, endDate, taskName, description, status) {
    $('#editTaskId').val(taskId);
    $('#editOwner').val(owner);
    $('#editStartDate').val(startDate);
    $('#editEndDate').val(endDate);
    $('#editTaskName').val(taskName);
    $('#editDescription').val(description);
    $('#editStatus').val(status);
    $('#editTaskModal').modal('show');
}

function loadTasks() {
    $.ajax({
        url: 'php/get_tasks.php',
        method: 'GET',
        success: function(response) {
            $('#taskContainer').html(response);
        },
        error: function(xhr, status, error) {
            console.error('Ocorreu um erro ao carregar as tarefas: ' + error);
        }
    });
}

$(document).ready(function() {
    $('#editTaskForm').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: 'php/update_task.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                var data = JSON.parse(response);
                if (data.success) {
                    $('#editTaskModal').modal('hide');
                    loadTasks();
                    alert("Tarefa atualizada com sucesso")
                } else {
                    alert("Não foi possível realizar a ação")
                }
            },
            error: function(xhr, status, error) {
                alert('Ocorreu um erro ao atualizar a tarefa: ' + error);
            }
        });
    });
});