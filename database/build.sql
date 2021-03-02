DROP TABLE IF EXISTS  CONTENUE_RESERVATION;
DROP TABLE IF EXISTS  CHAMBRES;
DROP TABLE IF EXISTS  RESERVATIONS;
DROP TABLE IF EXISTS  HOTELS;
DROP TABLE IF EXISTS  EQUIPEMENTS;
DROP TABLE IF EXISTS  CLIENTS;
DROP TABLE IF EXISTS  MOTDEPASSE;


CREATE TABLE CLIENTS (
    NumClient integer PRIMARY KEY AUTOINCREMENT,
    NomClient varchar(40),
    PrenClient varchar(40),
    MailClient varchar(40),
    TelClient varchar(40),
    DateNaiss DATE
);

CREATE TABLE EQUIPEMENTS (
    idEquipemet integer PRIMARY KEY AUTOINCREMENT,
    wifi boolean,
    parking boolean,
    salleSport boolean,
    animalFriendly boolean,
    Fumeur boolean
);

CREATE TABLE HOTELS(
    NumHotel  integer PRIMARY KEY AUTOINCREMENT,
    NumGerant integer,
    logoHotel VARCHAR,
    NomHotel VARCHAR(40),
    emailHotel VARCHAR(40),
    AdresseHotel VARCHAR(40),
    cpHotel integer,
    villeHotel VARCHAR(40),
    classeHotel integer
);

CREATE TABLE RESERVATIONS (
    NumReservation integer PRIMARY KEY AUTOINCREMENT,
    DateArrive DATETIME,
    DateDepart DATETIME,
    NumClient integer,
    FOREIGN KEY(NumClient) REFERENCES CLIENTS(NumClient)
);

CREATE TABLE CHAMBRES(
	NumChambre integer ,
	NumHotel integer,
	NbreLits integer,
	NumGerant integer,
	Surface integer,
	prix integer,
	idEquipement integer,
	PRIMARY KEY(NumChambre, NumHotel),
	FOREIGN KEY(NumHotel) REFERENCES HOTELS(NumHotel),
   	FOREIGN KEY(idEquipement) REFERENCES EQUIPEMENTS(idEquipemet)
);

CREATE TABLE CONTENUE_RESERVATION(
    NumReservation integer,
    NumChambre integer,
    NumHotel integer,
    DateDepart Datetime,
    FOREIGN KEY(NumReservation) REFERENCES RESERVATIONS (NumReservation),
    FOREIGN KEY(NumChambre) REFERENCES CHAMBRES(NumChambre),
    FOREIGN KEY(NumHotel) REFERENCES HOTELS(NumHotel),
    PRIMARY KEY ( NumReservation,NumChambre,NumHotel)
);

CREATE TABLE MOTDEPASSE (
	MtdPass varchar(40),
    Statut varchar(6),
    IdCompte integer
);
