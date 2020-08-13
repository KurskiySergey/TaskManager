<?php 
    
    require_once('TaskOperations.php');

    DeleteTaskById(intval($_GET['id']));
    $result = SelectTaskList();
    UpdateList($result);
    
?>