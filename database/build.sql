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
    idEquipemet integer PRIMARY KEY AUTOINCREMENT,
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
	NumChambre integer,
    ImagChambre VARCHAR(40),
	NumHotel integer,
	NbreLits integer,
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
    IdCompte integer, 
    PRIMARY KEY ( MtdPass,Statut,IdCompte)
);



