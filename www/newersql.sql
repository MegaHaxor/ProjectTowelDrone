create table data (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
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
        gps VARCHAR(255),
        video VARCHAR(255)              -- file path i guess
);

insert into data (temp, ORP, pH, dissolved_oxygen)
    values (1,2,3,4);
    
select * from data;
select * from site_info;
    
