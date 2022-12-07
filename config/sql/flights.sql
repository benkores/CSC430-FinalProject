CREATE TABLE IF NOT EXISTS FLIGHTS (
id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
departure_id varchar(255) REFERENCES AIRPORTS(id),
arrival_id varchar(255) REFERENCES AIRPORTS(id),
departure_date Date,
departure_time Time,
arrival_date Date,
arrival_time Time,
gate varchar(255),
terminal int,
boarding_begins Time,
boarding_ends Time,
number_of_first_class_seats int,
number_of_business_class_seats int,
number_of_economy_seats int,
first_cost double,
business_cost double,
economy_cost double
);

INSERT INTO FLIGHTS VALUES(1,'ATL', 'LAX', '2022-12-07', '09:00', '2022-12-07', '12:00', 'B9', 1, '08:15','08:45', 60, 60, 60, 1000, 500, 200);
INSERT INTO FLIGHTS VALUES(2,'LAX', 'ATL', '2022-12-09', '12:00', '2022-12-06', '15:00', 'C20', 3, '11:15', '11:45', 60, 60, 60, 1000, 500, 200);
INSERT INTO FLIGHTS VALUES(3,'DEN', 'JFK', '2022-12-02', '13:00', '2022-12-02', '15:00', 'A17', 4, '12:15', '12:45', 60, 60, 60, 1000, 500, 200);
INSERT INTO FLIGHTS VALUES(4,'JFK', 'DEN', '2022-12-09', '07:00', '2022-12-09', '09:00', 'D3', 2, '06:15', '06:45', 60, 60, 60, 1000, 500, 200);
INSERT INTO FLIGHTS VALUES(5,'EWR', 'FLL', '2022-12-03', '15:00', '2022-12-03', '18:00', 'F23', 5, '14:15', '14:45', 60, 60, 60, 1000, 500, 200);
INSERT INTO FLIGHTS VALUES(6,'FLL', 'EWR', '2022-12-08', '10:00', '2022-12-08', '13:00', 'E8', 1, '09:15', '09:45', 60, 60, 60, 1000, 500, 200);
INSERT INTO FLIGHTS VALUES(7,'MDW', 'MSP', '2022-12-06', '15:00', '2022-12-06', '18:00', 'B6', 5, '14:15', '14:45', 60, 60, 60, 1000, 500, 200);
INSERT INTO FLIGHTS VALUES(8,'MSP', 'MDW', '2022-12-08', '05:00', '2022-12-08', '08:00', 'D9', 2, '04:15', '04:45', 60, 60, 60, 1000, 500, 200);
INSERT INTO FLIGHTS VALUES(9,'SMF', 'JFK', '2022-12-05', '20:00', '2022-12-05', '23:00', 'A17', 1, '19:15', '19:45', 60, 60, 60, 1000, 500, 200);
INSERT INTO FLIGHTS VALUES(10,'JFK', 'SMF', '2022-12-07', '09:00', '2022-12-07', '12:00', 'C3', 4, '08:15', '08:45', 60, 60, 60, 1000, 500, 200);