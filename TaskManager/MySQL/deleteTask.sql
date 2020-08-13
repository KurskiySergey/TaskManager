use taskManager;

select tasks.task_id, task_name, created_at , user_ip, progress from Tasks 
left join logs on logs.task_id = tasks.task_id
order by tasks.task_id desc;