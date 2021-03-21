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
    DateNaiss DATE,
    UNIQUE(MailClient)
);

CREATE TABLE EQUIPEMENTS (
    idEquipement integer PRIMARY KEY AUTOINCREMENT,
    wifi varchar(40),
    parking varchar(40),
    salleSport varchar(40),
    animalFriendly varchar(40),
    Fumeur varchar(40)
);

CREATE TABLE HOTELS(
    NumHotel  integer PRIMARY KEY AUTOINCREMENT,
    NomGerant VARCHAR(40),
    PrenGerant VARCHAR(40), 
    DateNaissGerant DATE,
    logoHotel VARCHAR(40),
    NomHotel VARCHAR(40),
    emailHotel VARCHAR(40),
    AdresseHotel VARCHAR(40),
    cpHotel VARCHAR(40),
    villeHotel VARCHAR(40),
    classeHotel integer,
    UNIQUE(emailHotel)
);


CREATE TABLE RESERVATIONS (
    NumReservation integer PRIMARY KEY AUTOINCREMENT,
    DateArrive DATETIME,
    DateDepart DATETIME,
    NumClient integer,
    FOREIGN KEY(NumClient) REFERENCES CLIENTS(NumClient)
);


CREATE TABLE CHAMBRES(
	idChambre integer PRIMARY KEY AUTOINCREMENT,
	NumChambre integer ,
	NumHotel integer,
	NbreLits integer,
	Surface integer,
	prix integer,
	idEquipement integer,
    imageCh varchar(40),
	-- UNIQUE(NumChambre, NumHotel),
	FOREIGN KEY(NumHotel) REFERENCES HOTELS(NumHotel)
   	FOREIGN KEY(idEquipement) REFERENCES EQUIPEMENTS(idEquipement)
);

CREATE TABLE CONTENUE_RESERVATION(
    NumReservation integer,
    idChambre integer,
    DateDepart DATETIME,
    PRIMARY KEY ( NumReservation,idChambre),
    FOREIGN KEY(NumReservation) REFERENCES RESERVATIONS (NumReservation),
    FOREIGN KEY(idChambre) REFERENCES CHAMBRES(idChambre)
);

CREATE TABLE MOTDEPASSE (
	MtdPass varchar(40),
    Statut varchar(6),
    IdCompte integer, 
    PRIMARY KEY ( MtdPass,Statut,IdCompte)
);



