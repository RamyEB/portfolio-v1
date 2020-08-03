










INSERT INTO admin(login,password) VALUES ('root', 'root');

INSERT INTO plane_info(brand_plane,model_plane,nb_place,weight,speed) VALUES ('Airbus','A-380', 516, 50, 2000.0);
INSERT INTO plane_info(brand_plane,model_plane,nb_place,weight,speed) VALUES ('Airbus','A-330', 375, 20, 3000.0);
INSERT INTO plane_info(brand_plane,model_plane,nb_place,weight,speed) VALUES ('Boeing','B 777', 400, 20, 3500.0);

INSERT INTO company(name_company,date_creation) VALUES ('AirFrance', '07-10-1933');
INSERT INTO company(name_company,date_creation) VALUES ('EgyptAir', '07-06-1932');

INSERT INTO airport(city,country,UTC) VALUES ('Paris', 'France', 1.0);
INSERT INTO airport(city,country,UTC) VALUES ('New York', 'USA', 5.0);

/* A380 - AIRFRANCE - PARIS - */ 
INSERT INTO plane(id_plane_info,id_company,id_airport,terminal_position,train, etatUrgence) VALUES (1, 1, 1, 'F', false, false);
/* A330 - AIRFRANCE - PARIS - */ 
INSERT INTO plane(id_plane_info,id_company,id_airport,terminal_position,train, etatUrgence) VALUES (2, 1, 1, 'C', true, false);
/* A330 - EgyptAIR - New York - */ 
INSERT INTO plane(id_plane_info,id_company,id_airport,terminal_position,train, etatUrgence) VALUES (2, 2, 2, 'C', false, true);
/* Boeing - EgyptAIR - New York - */ 
INSERT INTO plane(id_plane_info,id_company,id_airport,terminal_position,train, etatUrgence) VALUES (3, 2, 2, 'C', false, false);


INSERT INTO flight(id_plane , id_company, nb_passenger, airport_departurs, h_departurs, terminal_departurs, gate_departurs, h_arrival , airport_arrival, terminal_arrival , gate_arrival , duration_flight , nb_eco , nb_preminum , nb_business)
VALUES (1, 1, 350, 'Paris', 17.5, 'F', 2, 12.0, 'New york', 'C', 2, 10.0, 120, 20, 5);

INSERT INTO passenger(id_flight , first_name , last_name , age , class_seat , num_seat , nb_baggage) 
VALUES (1, 'Alex', 'Dupont', 14, 'éco', 20, 2);

INSERT INTO passenger(id_flight , first_name , last_name , age , class_seat , num_seat , nb_baggage) 
VALUES (1, 'Samy', 'Mater', 26, 'staff', 0, 1);

INSERT INTO baggage(id_passenger , weight , type) 
VALUES (1, 8, 'Bagage à main');
INSERT INTO baggage(id_passenger , weight , type) 
VALUES (1, 22, 'Soute');
INSERT INTO baggage(id_passenger , weight , type) 
VALUES (2, 5, 'Bagage à main');

INSERT INTO staff(id_company , id_passenger , fonction) 
VALUES (1, 2, 'Pilote');