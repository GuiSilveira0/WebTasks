<html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/main.css">
    <title>WebTasks</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/edit_task.js"></script>
</head>

<body>
    <nav class="navbar bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">WebTasks</span>
        </div>
    </nav>

    <div class="container d-flex flex-column justify-content-center text-center mt-5">
        <div class="row">
            <div class="col">
                <h3>Tarefas</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="new_task" data-bs-toggle="modal" data-bs-target="#newTaskModal">+ Nova Tarefa</p>
            </div>
        </div>

        <div class="modal fade" id="newTaskModal" tabindex="-1" aria-labelledby="newTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content modal_content_custom">
                    <div class="modal-header">
                        <h5 class="modal-title text_color" id="newTaskModalLabel">Nova Tarefa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="newTaskForm" method="POST">
                            <div class="mb-3">
                                <label for="responsavel" class="form-label text_color">Responsável</label>
                                <input type="text" class="form-control text_input" id="owner" name="owner" required>
                            </div>
                            <div class="mb-3">
                                <label for="startDate" class="form-label text_color">Data de Início</label>
                                <input type="date" class="form-control text_input" id="startDate" name="startDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="endDate" class="form-label text_color">Data Final</label>
                                <input type="date" class="form-control text_input" id="endDate" name="endDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="titulo" class="form-label text_color">Título</label>
                                <input type="text" class="form-control text_input" id="taskName" name="taskName" required>
                            </div>
                            <div class="mb-3">
                                <label for="descricao" class="form-label text_color">Descrição</label>
                                <textarea class="form-control text_input" id="description" name="description" rows="5" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label text_color">Status</label>
                                <select class="form-select text_input" id="status" name="status" required>
                                    <option value="Pendente">Pendente</option>
                                    <option value="Em progresso">Em progresso</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row" id="taskContainer">
            </div>
        </div>
    </div>

    <div class="toast-container">
        <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Sucesso</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Registro inserido com sucesso!
            </div>
        </div>
    </div>

    <div class="toast-container">
        <div id="errorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Erro</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Não foi possível realizar a ação
            </div>
        </div>
    </div>

</body>

</html>