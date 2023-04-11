CREATE TABLE data (
           id INTEGER PRIMARY KEY AUTOINCREMENT
		   temp DOUBLE,
		   ORP DOUBLE,
		   pH DOUBLE,
		   dissolved_oxygen DOUBLE, 
		   "date" DATE, 
		   start_time TIME
		   );

create table site_info (
            "date" DATE,
			start_time TIME,
			gps VARCHAR (255),
			video VARCHAR (255) -- file path i guess
);


insert into data (temp, ORP, pH, dissolved_oxygen, date, start_time)
values (1, 2, 3, 4, '04-11-23', '14:56');


insert into data values (9, 2, 3, 5, '04-11-23', '14:56');
insert into data values (1, 2, 3, 4, '04-11-23', '13:56');
insert into data values (1, 2, 3, 4, '04-11-23', '15:56:00');

select * from data;
select "right";

insert into site_info (date, start_time, gps, video)
  values ('04-11-23', '15:56:00', '10.123426 E 99.554321 W',
	  '/usr/somewhere/video.idk');
     insert into site_info values ('04-11-23', '13:56',
				   '10.123436 E 99.254321 W',
				   '/usr/somewhere/video.idk');
     insert into site_info values ('04-11-23', '14:56',
				   '10.123446 E 99.154321 W',
				   '/usr/somewhere/video.idk');
     insert into site_info values ('04-12-23', '14:56',
				   '10.123446 E 99.154321 W',
				   '/usr/somewhere/video.idk');
     select * from site_info;
select 'yo';

     select * from data
       left outer join site_info on data.start_time = site_info.start_time;

select 'ok';
     select data.date, data.start_time, data.pH, site_info.date,
       site_info.start_time, site_info.gps 
       from data 
       left join site_info 
       on data.date = site_info.date and 1;
