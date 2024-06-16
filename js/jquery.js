$(document).ready(function() {
    function loadTasks() {
        $.ajax({
            url: 'php/get_tasks.php',
            method: 'GET',
            success: function(response) {
                $('#taskContainer').html(response);
            }
        });
    }

    loadTasks();

    $('#newTaskForm').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: 'php/new_task.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                var data = JSON.parse(response);
                if (data.success) {
                    $('#successToast').toast('show');
                    $('#newTaskForm')[0].reset();
                    $('#newTaskModal').modal('hide'); 
                    $('.modal-backdrop').remove();
                    loadTasks(); 
                } else {
                    $('#errorToast').toast('show'); 
                }
            },
            error: function() {
                $('#errorToast').toast('show');
            }
        });
    });
});