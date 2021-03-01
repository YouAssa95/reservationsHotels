DROP TABLE CONTENUE_RESERVATION;
DROP TABLE CHAMBRES;
DROP TABLE RESERVATIONS;
DROP TABLE HOTELS;
DROP TABLE EQUIPEMENTS;
DROP TABLE CLIENTS;
DROP TABLE CLIENTS;
DROP TABLE MOTDEPASSE ;



CREATE TABLE CLIENTS (
    NumClient int PRIMARY KEY ,
    NomClient varchar(40),
    PrenClient varchar(40),
    MailClient varchar(40),
    TelClient varchar(40),
    DateNaiss DATE
);



CREATE TABLE EQUIPEMENTS (
    idEquipemet int PRIMARY KEY ,
    wifi boolean,
    parking boolean,
    salleSport boolean,
    animalFriendly boolean,
    Fumeur boolean
); 

CREATE TABLE HOTELS(
    NumHotel  int PRIMARY KEY,
    NumGerant int,
    logoHotel VARCHAR,
    NomGerant varchar(40),
    PrenGerant varchar(40),
    DateNaissGerant DATE,
    NomHotel VARCHAR(40),
    emailHotel VARCHAR(40),
    cpHotel integer,
    villeHotel VARCHAR(40),
    classeHotel int,
);


CREATE TABLE RESERVATIONS (
    NumReservation int PRIMARY KEY,
    DateArrive DATETIME,
    DateDepart DATETIME,
    NumClient int,
    CONSTRAINT FK_Reservation_ref_CLIENT FOREIGN KEY(NumClient), REFERENCES CLIENTS(NumClient)
);

CREATE TABLE CHAMBRES(
	NumChambre int,
	NumHotel int,
	NbreLits int,
	NumGerant int,
	Surface int,
	prix int,
	idEquipement int,
	CONSTRAINT  PRIMARY KEY(NumChambre, NumHotel),
	CONSTRAINT FK_Chambres_ref_Gerants  FOREIGN KEY(NumGerant)   REFERENCES GERANTS(NumGerant),
	CONSTRAINT FK_Chambres_ref_Hotels  FOREIGN KEY(NumHotel) REFERENCES HOTELS(NumHotel),
   	CONSTRAINT FK_Chambres_ref_Equipements   FOREIGN KEY(idEquipement) REFERENCES EQUIPEMENTS(idEquipemet)
);

CREATE TABLE CONTENUE_RESERVATION(
    NumReservation int ,
    NumChambre int,
    NumHotel int,
    DateDepart Datetime,
    CONSTRAINT FK_Reservation_ref_contenuR FOREIGN KEY(NumReservation) REFERENCES RESERVATIONS (NumReservation),
    CONSTRAINT FK_Chambres_ref_contenuR FOREIGN KEY(NumChambre) REFERENCES CHAMBRES(NumChambre),
    CONSTRAINT FK_Hotels_ref_contenuR FOREIGN KEY(NumHotel) REFERENCES HOTELS(NumHotel),
    CONSTRAINT  PRIMARY KEY ( NumReservation,NumChambre,NumHotel)
);

CREATE TABLE MOTDEPASSE (
	MtdPass varchar(40),
    Statut varchar(6),
    IdCompte int
);
