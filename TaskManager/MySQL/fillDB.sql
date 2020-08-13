
use taskManager;

insert into Tasks( task_name , progress) values

( 'create' , 'Executing...'),
( 'create', 'Executing...'),
( 'update', 'Executing...'),
('delete' , 'Executing...');

insert into logs(task_id , user_ip) values

(1, '168.157.143.1'),
(2, '168.157.143.5'),
(3, '168.157.143.9'),
(4, '168.157.143.20');


insert into PossibleTasks(possible_task_name) values

('create'),
('read'),
('update'),
('delete');


