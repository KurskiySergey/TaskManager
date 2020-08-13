<?php 
    

    $DATABASE = 'taskmanager';
    
    function OpenDatabase() {
        global $DATABASE;
        return new mysqli("www.site.ru" , "root" , "" , $DATABASE);
    }

    function CloseDataBase($mysqli) {
        $mysqli->close();
    }

    # Добавляет новую запись в БД
    function InsertNewTask(){

        if ($_GET and intval($_GET['id'])>=0) {
            
            $ip = $_SERVER['REMOTE_ADDR'];
            $id = intval($_GET['id']) + 1;
            $info = $_GET['info'];
            $mysqli = OpenDatabase($DATABASE);
            
            $mysqli->query("INSERT INTO tasks( task_id, task_name, progress) VALUES
            ($id , '$info' , 'Executing...');");

            $mysqli->query("INSERT INTO logs(task_id, user_ip) VALUES
            ($id, '$ip');");

            CloseDatabase($mysqli);
            
        }
        
         
    }

    # Делает выборку данных из БД в соответствии с таблицей
    function SelectTaskList() {

            $mysqli = OpenDatabase();

            $list = $mysqli->query("SELECT tasks.task_id, task_name, created_at , user_ip, progress FROM tasks 
            LEFT JOIN logs on tasks.task_id = logs.task_id
            order by tasks.task_id desc;");

            CloseDatabase($mysqli);

            $array_list = array();

            while ($row = mysqli_fetch_assoc($list) ) {
                $array_list[] = $row;
            }

            return $array_list;

        }
        
    # Обновляет таблицу на главной странице
    function UpdateList($taskList) {
    
        echo '<tr>
                    <td>id задания</td>
                    <td>Задание</td>
                    <td>Дата</td>
                    <td>ip клиента</td>
                    <td>Ход выполнения</td>
                    <td></td>
                </tr>';
        
        for ($i = 0 ; $i < count($taskList) ; $i++) {
                 echo '<tr>
                        <td class = "id">'.$taskList[$i]['task_id'].'</td>
                        <td>'.$taskList[$i]['task_name'].'</td>
                        <td>'.$taskList[$i]['created_at'].'</td>
                        <td>'.$taskList[$i]['user_ip'].'</td>
                        <td>'.$taskList[$i]['progress'].'</td>
                        <td><button class="delete_btn" id="'.$taskList[$i]['task_id'].'" >Удалить запись</button></td>
                        </tr>';
        }
        
    }

    # Получает из БД информацию о разрешенных заданиях
    function WritePossibleTasks() {
        
        $mysqli = OpenDatabase();
        
        $tasks = $mysqli->query("SELECT possible_task_name FROM possibletasks");
        
        CloseDatabase($mysqli);
            
        while ($row = mysqli_fetch_assoc($tasks) ) {
            echo '<li class="task">'.$row['possible_task_name'].'</li>';
        }
        
        
    }

    # Удаляет задание из списка по его id в БД
    function DeleteTaskById($id) {
        
        $mysqli = OpenDatabase();
        
        $mysqli->query("DELETE FROM tasks WHERE task_id=$id");
        
        CloseDatabase($mysqli);
        
    }

    
?>
