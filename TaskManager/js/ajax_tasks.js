'use strict';

// При загрузке страницы добавляет event
window.addEventListener('load', function () {
    
    
    // Выполняет ajax - запрос на получение разрешенных задач из БД 
    $.ajax({
        url: 'functions/WritePossibleTasks.php',
        success: function (data) {
            $(".task_list").html(data);
            console.log('ajax done');
        }
    })

    // ajax - запрос на первоначальное заполнение таблицы
    $.ajax({
        url: 'functions/UpdateTaskList.php',
        success: function (data) {
            $(".task_table_list").html(data);
            console.log('ajax done');
        }
    })
    

    // Ставит click-event на элемент класса task_table
    $(".task_table").on('click', '.push_btn', function () {
        let task_info = document.querySelector(".input_task").value;
        let possible_tasks = document.querySelectorAll(".task_list .task");
        let id = document.querySelector(".id"); // Выбирает первый попавшийся элемент => полученный id - максимальный
        
        // Если задача разрешена то выполнить ajax-запрос
        if (chek_for_task(possible_tasks, task_info)) {
            
            id = (id == null) ? 0 : id.innerHTML; // проверка на существование элемента
            
            let base_url = 'functions/UpdateTaskList.php';
            let url_get = base_url + '?' + 'info=' + task_info + '&' + 'id=' + id;
            if (event.target) {
                $.ajax({
                    url: url_get,
                    success: function (data) {
                        $(".task_table_list").html(data);
                        console.log('ajax done');
                    }
                })
            }


        } else {
            alert("Неверная команда. Введите команду из списка.");
        }

    });
    
    // Ставит click-event на элемент класса task_table_list
    $(".task_table_list").on('click', '.delete_btn', function() {
        
        if ( confirm("Вы действительно хотите удалить запись?")) {
            
            let id = event.target['id'];
            console.log(id);
            
            let base_url = 'functions/DeleteTask.php';
            let url_get = base_url + '?' + 'id=' + id;
            
            $.ajax({
                url: url_get,
                
                success: function(data) {
                    $(".task_table_list").html(data);
                    console.log('ajax done');
                }
            })
            
        }
            
        
    });
    
});
