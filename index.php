<?php 
    include_once('db.php');
    include_once('task_display.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Task Manager</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="./styles.css" />
    </head>
    <body onload=''>    
        <div id="TaskManagerPageBox">
            
            <h1>Task Manager</h1>

            <div id="TaskManagerContentBox">
                
                <div id="TaskFormBox">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="mb-3">
                            <label for="taskName" class="form-label">Task Name</label>
                            <input type="text" class="form-control" id="taskName" name="taskName" required>
                        </div>
                        <div class="mb-3">
                            <label for="taskDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="taskDescription" name="taskDescription" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submitTaskBtn" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                
                <div id="TaskListView">
                    <h2>My Tasks</h2>

                    <div id="TaskList">
                        <?php
                            $sql_select_statement = $conn->prepare("SELECT id, name, description, updatedAt, completedAt FROM task");
                            $sql_select_statement->execute();
                            $tasks = $sql_select_statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($tasks as $task) {
                                display_task($task);
                                
                            };
                        ?>
                    </div>
                </div>

                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST["submitUpdateTaskBtn"]) && !empty($_POST["taskName"]) && !empty($_POST["taskDescription"])) {
                            $sql_insert_statement = $conn->prepare("INSERT INTO task (name, description, updatedAt, completedAt) VALUES (:name, :description, :updatedAt, :completedAt)");
                            $sql_insert_statement->bindParam(":name", $_POST['taskName']);
                            $sql_insert_statement->bindParam(":description", $_POST['taskDescription']);
                            $currentDateTime = date('Y-m-d H:i:s');
                            $sql_insert_statement->bindParam(":updatedAt", $currentDateTime);
                            $sql_insert_statement->bindValue(":completedAt", null, PDO::PARAM_NULL);
                            $sql_insert_statement->execute();
                            header("Refresh:0");
                        } else if (isset($_POST['deleteTaskBtn']) && !empty($_POST["task_id"])) {
                            echo "<p>Task ID: {$_POST['task_id']}</p>";
                            $sql_delete_statement = $conn->prepare("DELETE FROM task WHERE id = :id");                            $sql_delete_statement->bindParam(':id', $_POST['task_id']);
                            $sql_delete_statement->execute();
                            header("Refresh:0");
                        } else if (isset($_POST['submitUpdateTaskBtn'])) {
                            $sql_update_statement = $conn->prepare("UPDATE task SET name=:name, description=:description WHERE id=:id");
                            $sql_update_statement->bindParam(":name", $_POST['task_name']);
                            $sql_update_statement->bindParam(":description", $_POST['task_description']);
                            $sql_update_statement->bindParam(":id", $_POST['task_id']);
                            if ($sql_update_statement->execute()) {
                                header("Refresh:0");
                            } else {
                                echo "Error updating task: " . $sql_update_statement->errorInfo()[2];
                            }
                        }
                    }
                ?>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script type="text/javascript">
            if ( window.history.replaceState ) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
    </body>
</html>