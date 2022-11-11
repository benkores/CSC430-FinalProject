CREATE TABLE IF NOT EXISTS USER_BOOKINGS (
account_id int REFERENCES Accounts(ID),
id int AUTO_INCREMENT PRIMARY KEY,
flight_id int,
seat_id int REFERENCES FLIGHT_SEATS(seat_id),
first_name varchar(255),
last_name varchar(255),
person_type varchar(255)
);