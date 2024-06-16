<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/delete_task.js"></script>
    <script src="js/edit_task.js"></script>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="container mt-4">
        <div class="row">
            <?php
            require("connect.php");
            $select = mysqli_query($conn, "SELECT * FROM tasks");

            while ($data = mysqli_fetch_array($select)) {
                $startDate = new DateTime($data['StartDate']);
                $endDate = new DateTime($data['EndDate']);

                echo '<div class="col-md-6 mb-3">';
                echo '<div class="card h-100">';
                echo '<div class="card-body">';

                echo '<div class="d-flex justify-content-between align-items-start mb-3">';
                echo '<h5 class="card-title">' . htmlspecialchars($data['TaskName']) . '</h5>';
                echo '<div>';
                echo '<button type="button" class="btn btn-secondary me-2" onclick="editTask(' . $data['Id'] . ', \'' . addslashes($data['OwnerName']) . '\', \'' . $startDate->format('Y-m-d') . '\', \'' . $endDate->format('Y-m-d') . '\', \'' . addslashes($data['TaskName']) . '\', \'' . addslashes($data['Description']) . '\', \'' . addslashes($data['Status']) . '\')">Editar</button>';
                echo '<button type="button" class="btn btn-danger" onclick="deleteTask(' . $data['Id'] . ')">Excluir</button>';
                echo '</div>';
                echo '</div>';

                echo '<div>';
                echo '<p class="card-text text-start mb-5">' . htmlspecialchars($data['Description']) . '</p>';
                echo '</div>';

                echo '<div class="row">';
                echo '<div class="col">';
                echo '<p class="card-text"><strong>Responsável:</strong> ' . htmlspecialchars($data['OwnerName']) . '</p>';
                echo '</div>';
                echo '<div class="col">';
                echo '<p class="card-text"><strong>Data de início:</strong> ' . $startDate->format('d/m/Y') . '</p>';
                echo '</div>';
                echo '<div class="col">';
                echo '<p class="card-text"><strong>Data final:</strong> ' . $endDate->format('d/m/Y') . '</p>';
                echo '</div>';
                echo '<div class="col">';
                echo '<p class="card-text"><strong>Status:</strong> ' . htmlspecialchars($data['Status']) . '</p>';
                echo '</div>';
                echo '</div>';

                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal_content_custom">
                <div class="modal-header">
                    <h5 class="modal-title text_color" id="editTaskModalLabel">Editar Tarefa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editTaskForm">
                        <input type="hidden" id="editTaskId" name="taskId">
                        <div class="mb-3">
                            <label for="editOwner" class="form-label text_color">Responsável</label>
                            <input type="text" class="form-control text_input" id="editOwner" name="owner" required>
                        </div>
                        <div class="mb-3">
                            <label for="editStartDate" class="form-label text_color">Data de Início</label>
                            <input type="date" class="form-control text_input" id="editStartDate" name="startDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEndDate" class="form-label text_color">Data Final</label>
                            <input type="date" class="form-control text_input" id="editEndDate" name="endDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="editTaskName" class="form-label text_color">Título</label>
                            <input type="text" class="form-control text_input" id="editTaskName" name="taskName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label text_color">Descrição</label>
                            <textarea class="form-control text_input" id="editDescription" name="description" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editStatus" class="form-label text_color">Status</label>
                            <select class="form-select text_input" id="editStatus" name="status" required>
                                <option value="Pendente">Pendente</option>
                                <option value="Em progresso">Em progresso</option>
                                <option value="Finalizada">Finalizada</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>