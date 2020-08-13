<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <div class="container">
       <div class="header">
           <h1>Task manager</h1>
       </div>
        <table class="task_table">
            <tr>
                <td><input type="text" class="input_task" placeholder="Напишите задачу здесь"></td>
                <td><button class="push_btn">Добавить запись</button></td>
            </tr>
        </table>
        <hr>
        <br>
        <h3 class="task_text">Список возможных задач</h3>
        <div class="tasks">
            <ul class="task_list">
            </ul>
        </div>
        <hr>
        <br>
        <h3 class="task_text">Текущие задачи</h3>
        <br>
        <table class="task_table_list">
        </table>
    </div>
    <div class="footer">
        Copyright &copy  <?php echo date("Y") ?> Sergey Kurskiy
    </div>
    <script src=js/check_tasks.js></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/ajax_tasks.js"></script>
</body>

</html>
