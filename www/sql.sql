/******************************************************************************

                        Online SQLite Query Runner.
                Code, Compile, Run and Debug SQLite query online.
Write your query in this editor and press "Run" button to execute it.

*******************************************************************************/


/* Enter your sql queries here */

CREATE TABLE data (
           id INTEGER PRIMARY KEY,
		   temp DOUBLE,
		   ORP DOUBLE,
		   pH DOUBLE,
		   DO DOUBLE, 
		   "date" DATE, 
		   start_time TIME,
		   gps VARCHAR (255),
		   video VARCHAR (255) 
		   );


INSERT INTO data VALUES
(1,1.0,2.0,3.0,4.0,'04-11-23','14:56',NULL,NULL);

INSERT INTO data VALUES
(2,1,2,3,4,'04-11-23','15:56:00','10.123426 E 99.554321 W','/usr/somewhere/video.idk');

insert into data values 
(22, 24.4444, 143.3,5.43, 0.1, '04-13-23', '19:40', '10.123426 N 99.554321 W', '/usr/somewhere/video.idk');

insert into data values 
(23, 20.1234, -22.3,6.9, 4.3, '04-13-23', '19:41', '10.123426 S 99.554321 W', '/usr/somewhere/video1.idk');

insert into data values 
(24, 132.123, -0.2,33, 4, '04-23-23', '12:40', '10.123426 N 99.554321 E', '/usr/somewhere/video2.idk');

insert into data values 
(25, 43, -0.1234097,3.432123, 4.43123, '05-13-23', '19:40', '10.123426 S 99.554321 E', '/usr/somewhere/video3.idk');

INSERT INTO data VALUES
(26,38.16,-877.799,13.9049,0.0,'02-28-23','03:33:33','22.222222 N 33.333333 E','/usr/somewhere/video5.idk');

insert into data (temp, pH, ORP, DO, gps, video) values 
(3,2,1,4, 'over there', NULL);