<?php include "db.php" ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de Tâches</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .task-list {
            margin-top: 20px;

        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Gestion des Tâches</h1>
        <form action="addTask.php" method="post" class="input-group mt-4">
            <input type="text" name="task" class="form-control" placeholder="Ajouter une tâche*" aria-label="Ajouter une tâche" required>
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Add Task</button>
            </div>
        </form>

        <div class="task-list">
            <h2 class="mt-5">Tâches Incomplètes</h2>
            <ul class="list-group">
                <?php
                $sql = "SELECT id ,task_name FROM tasks WHERE completed_task= 0 ";
                $result = $conn->query($sql);

                if ($result && $result->rowCount() > 0) {
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li class='list-group-item d-flex justify-content-between align-items-center'>"
                            . $row['task_name'] .
                            "<div>
                            <form action='markTask.php' method='POST' style='display:inline-block;'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <button class='btn btn-success btn-sm' type='submit'>Marquer comme complète</button>
                            </form> 
                            <form action='deleteTask.php' method='POST' style='display:inline-block;'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <button class='btn btn-danger btn-sm' type='submit' >Supprimer</button>
                            </form>

                        </div>
                    </li>";
                    }
                } else {
                    echo '<li class="list-group-item d-flex justify-content-between align-items-center"> 0 tâches trouvées </li>';
                };
                ?>
            </ul>
        </div>

        <div class="task-list">
            <h2 class="mt-5">Tâches Complètes</h2>
            <ul class="list-group">
                <?php
                $sql = "SELECT id ,task_name FROM tasks WHERE completed_task= 1 ";
                $result = $conn->query($sql);

                if ($result && $result->rowCount() > 0) {
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li class='list-group-item d-flex justify-content-between align-items-center'>"
                            . $row['task_name'] .
                            "<div>
                        <form action='deleteTask.php' method='POST' style='display:inline-block;'>
                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                            <button class='btn btn-danger btn-sm' type='submit' >Supprimer</button>
                        </form>    
                    </div>
                    
                    
                    </li> ";
                    }
                } else {
                    echo '<li class="list-group-item d-flex justify-content-between align-items-center"> 0 tâches complete </li>';
                };
                ?>
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>