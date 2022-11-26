CREATE TABLE IF NOT EXISTS AIRPORTS (
ID varchar(255) PRIMARY KEY NOT NULL,
name varchar(255),
city varchar(255),
state varchar(255)
);

INSERT INTO AIRPORTS VALUES('ATL','Hartsfield-Jackson Atlanta International Airport','Atlanta','Georgia')
INSERT INTO AIRPORTS VALUES('LAX', 'Los Angeles International Airport', 'Los Angeles', 'California')
INSERT INTO AIRPORTS VALUES('DEN', 'Denver International Airport', 'Denver', 'Colorado')
INSERT INTO AIRPORTS VALUES('JFK', 'John F. Kennedy International Airport', 'New York', 'New York')
INSERT INTO AIRPORTS VALUES('EWR', 'Newark Liberty International Airport', 'Newark', 'New Jersey')
INSERT INTO AIRPORTS VALUES('FLL', 'Fort Lauderdale Hollywood International Airport', 'Broward County', 'Florida')
INSERT INTO AIRPORTS VALUES('MDW', 'Chicago Midway International Airport', 'Chicago', 'Illinois')
INSERT INTO AIRPORTS VALUES('BNA', 'Nashville International Airport', 'Nashville', 'Tennessee')
INSERT INTO AIRPORTS VALUES('SMF', 'Sacramento International Airport', 'Sacramento', 'California')
INSERT INTO AIRPORTS VALUES('MSP', 'Minneapolis-Saint Paul International Airport', 'Minneapolis', 'Minnesota')