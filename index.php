<?php
	$action = 'retrievePending';
	require_once 'server/TaskController.php';
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Lista de Tarefas</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Lista de Tarefas
            </a>
        </div>
    </nav>

    <div class="container app">
        <div class="row">
            <div class="col-md-3 menu">
                <ul class="list-group">
                    <li class="list-group-item active"><a href="/">Tarefas Pendentes</a></li>
                    <li class="list-group-item"><a href="new_task.php">Adicionar Tarefa</a></li>
                    <li class="list-group-item"><a href="all_tasks.php">Todas as Tarefas</a></li>
                </ul>
            </div>

            <div class="col-md-9">
                <div class="container page">
                    <div class="row">
                        <div class="col">
                            <h4>Tarefas Pendentes</h4>
                            <hr />

                            <?php foreach ($tasks as $task) { ?>
                                <div class="row mb-3 d-flex align-items-center task">
                                    <div class="col-sm-9" id="tarefa_<?= $task->id ?>">
                                        <?= $task->name ?>
                                    </div>
                                    <div class="col-sm-3 mt-2 d-flex justify-content-between">
                                        <i class="fas fa-trash-alt fa-lg text-danger" onclick="removeTask(<?= $task->id ?>)"></i>
                                        <i class="fas fa-edit fa-lg text-info" onclick="editTask(<?= $tarefa->id ?>, '<?= $task->name ?>')"></i>
                                        <i class="fas fa-check-square fa-lg text-success" onclick="markAsCompleted(<?= $task->id ?>)"></i>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/scripts.js"></script>
</body>
</html>