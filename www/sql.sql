create table data (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      temp DOUBLE,
      ORP DOUBLE,
      pH DOUBLE,
      dissolved_oxygen DOUBLE,
      "date" DATE,
      start_time TIME,
    );

create table time_location (
	"date" DATE,
	start_time TIME,
	gps VARCHAR(255),
	primary key ("date", start_time)
);

create table time_video (
	start_time TIME,
	"date" DATE,
	video VARCHAR(255)		-- file path i guess
);

insert into data (temp, ORP, pH, dissolved_oxygen) 
    values (1,2,3,4);
