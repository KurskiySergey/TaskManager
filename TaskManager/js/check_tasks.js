'use strict';

// Проверка на существование введенной операции в списке разрешенных
function chek_for_task(tasks_node_list , input_task) {
    for ( let task of tasks_node_list.values()) {
        if (task.innerHTML == input_task) {
            return true;
        }
    }
    
    return false;
}

