/******************************************************************************

                        Online SQLite Query Runner.
                Code, Compile, Run and Debug SQLite query online.
Write your query in this editor and press "Run" button to execute it.

*******************************************************************************/


/* Enter your sql queries here */

CREATE TABLE data (
           data_id INTEGER PRIMARY KEY,
		   temp DOUBLE,
		   ORP DOUBLE,
		   pH DOUBLE,
		   DO DOUBLE, 
		   conductivity DOUBLE,
		   latitude DOUBLE,
		   longitude DOUBLE,
		   altitude DOUBLE,
		   video_path VARCHAR (255) 
		   );
.schema

insert into
    data (temp, pH, DO, conductivity, latitude, longitude, altitude)
    values (1, 3, 4, 5, 6, 7, 8);
    
select * from data;

.exit
