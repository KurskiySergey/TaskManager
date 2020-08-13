drop database if exists taskManager;
create database taskManager;
use taskManager;


drop table if exists Tasks;
drop table if exists logs;
drop table if exists PossibleTasks;


create table logs(
	log_id SERIAL primary key,
	task_id bigint unsigned not null,
	created_at timestamp default now(),
	user_ip varchar(15),
	
	foreign key (task_id) references logs(log_id) on delete cascade
	

);

create table Tasks(
	task_id SERIAL primary key,
	log_id bigint unsigned not null,
	task_name varchar(15),
	progress varchar(30),
	
	foreign key (log_id) references logs(log_id) on delete cascade
	 
);


create table PossibleTasks(
	id SERIAL primary key,
	possible_task_name varchar(30)
);





