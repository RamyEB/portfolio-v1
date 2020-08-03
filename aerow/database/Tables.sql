DROP TABLE IF EXISTS plane_info,company,airport,plane,flight,passenger,baggage,staff,admin;

/* PLANE_INFO */
CREATE TABLE plane_info (
id_plane_info SERIAL PRIMARY KEY,
brand_plane VARCHAR(250),
model_plane VARCHAR(250),
nb_place INT,
weight FLOAT,
speed FLOAT);

/* COMPANY */
CREATE TABLE company (
id_company SERIAL PRIMARY KEY,
name_company VARCHAR(250),
date_creation DATE);

/* AIRPORT */
CREATE TABLE airport (
id_airport SERIAL PRIMARY KEY,
city VARCHAR(250),
country VARCHAR(250),
UTC FLOAT);

/* PLANE */
CREATE TABLE plane (
id_plane SERIAL PRIMARY KEY,
id_plane_info INT,
id_company INT,
id_airport INT,
terminal_position VARCHAR(250),
train BOOLEAN,
etatUrgence BOOLEAN,
FOREIGN KEY (id_plane_info) REFERENCES plane_info (id_plane_info),
FOREIGN KEY (id_company) REFERENCES company (id_company),
FOREIGN KEY (id_airport) REFERENCES airport (id_airport));

/* FLIGHT */
CREATE TABLE flight (
id_flight SERIAL PRIMARY KEY,
id_plane INT,
id_company INT,
nb_passenger INT,


airport_departurs VARCHAR(250),
h_departurs FLOAT,
terminal_departurs VARCHAR(250),
gate_departurs INT,

h_arrival FLOAT,
airport_arrival VARCHAR(250),
terminal_arrival VARCHAR(250),
gate_arrival INT,

duration_flight FLOAT,
nb_eco INT,
nb_business INT,
nb_preminum INT,

FOREIGN KEY (id_plane) REFERENCES plane (id_plane),
FOREIGN KEY (id_company) REFERENCES company (id_company)
);


/* PASSENGER */
CREATE TABLE passenger (
id_passenger SERIAL PRIMARY KEY,
id_flight INT,
first_name VARCHAR(250),
last_name VARCHAR(250),
age INT,
class_seat VARCHAR(250),
num_seat INT,
nb_baggage INT,
FOREIGN KEY (id_flight) REFERENCES flight (id_flight)
);

/* BAGGAGE */
CREATE TABLE baggage (
id_baggage SERIAL PRIMARY KEY,
id_passenger INT,
weight FLOAT,
type VARCHAR(250),
FOREIGN KEY (id_passenger) REFERENCES passenger (id_passenger));

/* STAFF */
CREATE TABLE staff (
id_staff SERIAL PRIMARY KEY,
id_company INT,
id_passenger INT,
fonction VARCHAR(250),
FOREIGN KEY (id_company) REFERENCES company (id_company),
FOREIGN KEY (id_passenger) REFERENCES passenger (id_passenger)
);

/* ADMIN */
CREATE TABLE admin (
id_admin SERIAL PRIMARY KEY,
login VARCHAR(250),
password VARCHAR(250));




















-- /* AIRPORT */
-- CREATE TABLE airport (
-- id_airport SERIAL PRIMARY KEY UNIQUE,
-- city VARCHAR(250));


-- /* FLIGHT */
-- CREATE TABLE flight (
-- id_flight SERIAL UNIQUE,
-- airport_departurs INTEGER,
-- airport_arrival INTEGER,
-- PRIMARY KEY (id_flight, airport_arrival, airport_departurs));

-- CREATE TABLE rport (
--   id_airport_arr  INTEGER REFERENCES airport (id_airport) ON UPDATE CASCADE
-- );


-- INSERT INTO airport(city) VALUES ('Paris');
-- INSERT INTO airport(city) VALUES ('New York');

-- INSERT INTO flight(airport_departurs, airport_arrival) 
-- VALUES (1, 2);






-- select * from airport NATURAL JOIN flight NATURAL JOIN flight_airport where id_flight='1';
-- select * from flight_airport;

-- DROP TABLE IF EXISTS plane_info,company,airport,plane,flight,passenger,baggage,staff,flight_airport,admin;
