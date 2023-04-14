/******************************************************************************

                        Online SQLite Query Runner.
                Code, Compile, Run and Debug SQLite query online.
Write your query in this editor and press "Run" button to execute it.

*******************************************************************************/


/* Enter your sql queries here */

CREATE TABLE data (
           id INTEGER PRIMARY KEY AUTOINCREMENT,
		   temp DOUBLE,
		   ORP DOUBLE,
		   pH DOUBLE,
		   dissolved_oxygen DOUBLE, 
		   "date" DATE, 
		   start_time TIME,
		   gps VARCHAR (255),
		   video VARCHAR (255) 
		   );


insert into data values 
(22, 24.4444, 143.3,5.43, 0.1, '04-13-23', '19:40', '10.123426 N 99.554321 W', '/usr/somewhere/video.idk');

insert into data values 
(23, 20.1234, -22.3,6.9, 4.3, '04-13-23', '19:41', '10.123426 S 99.554321 W', '/usr/somewhere/video1.idk');

insert into data values 
(24, 132.123, -0.2,33, 4, '04-23-23', '12:40', '10.123426 N 99.554321 E', '/usr/somewhere/video2.idk');

insert into data values 
(25, 43, -0.1234097,3.432123, 4.43123, '05-13-23', '19:40', '10.123426 S 99.554321 E', '/usr/somewhere/video3.idk');
