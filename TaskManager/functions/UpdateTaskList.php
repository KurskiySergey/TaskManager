<?php

require_once ('TaskOperations.php');

InsertNewTask();
$result = SelectTaskList();
UpdateList($result);

    
    
?>
