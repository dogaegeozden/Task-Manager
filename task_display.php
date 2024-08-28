<?php
function display_task($task){
    echo "<div class='Atask shadow'>";
    echo "<form method='POST' action='".$_SERVER['PHP_SELF']."'>";
    echo "<button id='updateTaskBtn{$task['id']}' type='button' class='float-end' style='background: none; border: none;' data-bs-toggle='modal' data-bs-target='#updateTaskModal{$task['id']}'>";
    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square float-end" viewBox="0 0 16 16">
<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>';
    echo "</button>";
    echo "<div class='modal fade' id='updateTaskModal{$task['id']}' tabindex='-1' data-bs-backdrop='static' aria-labelledby='updateTaskModalLabel{$task['id']}' aria-hidden='true'>";
    echo "<div class='modal-dialog modal-dialog-centered'>";
    echo "<div class='modal-content'>";
    echo "<div class='modal-header'>";
    echo "<h2 class='modal-title' id='updateTaskModalLabel{$task['id']}'>Update Task #{$task['id']}</h2>";
    echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
    echo "</div>";
    echo "<div class='modal-body'>";
    echo "<div class='mb-3'>";
    echo "<input type='hidden' name='task_id' value='{$task['id']}'>";
    echo "<label class='col-form-label fw-bold'>Task Name</label>";
    echo "<input type='text' class='form-control' name='task_name' value='{$task['name']}' required>";
    echo "</div>";
    echo "<div class='mb-3'>";
    echo "<label class='col-form-label fw-bold'>Description</label>";
    echo "<textarea type='text' class='form-control' name='task_description'>{$task['description']}</textarea>";
    echo "</div>";
    echo "</div>";
    echo "<div class='modal-footer'>";
    echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>";
    echo "<button type='submit' class='btn btn-primary' name='submitUpdateTaskBtn'>Submit</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</form>";
    echo "<h3>Task #{$task['id']}</h3>";
    echo "<p><strong>Name:</strong> {$task['name']}</p>";
    echo "<p><strong>Description:</strong> {$task['description']}</p>";
    echo "<p><strong>Updated At:</strong> {$task['updatedAt']}</p>";
    echo "<p><strong>Completed At:</strong> {$task['completedAt']}</p>";
    echo "<form method='POST' action='".$_SERVER['PHP_SELF']."'>";
    echo "<input type='hidden' name='task_id' value='{$task['id']}'>";
    echo "<button type='button' class='float-end cursor-pointer' data-bs-toggle='modal' data-bs-target='#deleteTaskModal{$task['id']}' style='background: none; border:none;'>";
    echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill float-end' viewBox='0 0 16 16'>
        <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/>
    </svg>";
    echo "</button>";
    echo "<div class='modal fade' id='deleteTaskModal{$task['id']}' tabindex='-1' data-bs-backdrop='static' aria-labelledby='deleteTaskModal{$task['id']}Label' aria-hidden='true'>";
    echo "<div class='modal-dialog modal-dialog-centered'>";
    echo "<div class='modal-content'>";
    echo "<div class='modal-header'>";
    echo "<h2 class='modal-title' id='deleteTaskModal{$task['id']}'>Confirm Delete</h2>";
    echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
    echo "</div>";
    echo "<div class='modal-body'>";
    echo "<p>Are you sure you want to delete this story?</p>";
    echo "</div>";
    echo "<div class='modal-footer'>";
    echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>No</button>";
    echo "<button type='submit' name='deleteTaskBtn' class='btn btn-danger'>Yes</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</form>";
    echo "</div>";
}
?>