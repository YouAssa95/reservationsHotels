<?php

namespace App\Repositories;


class Data
{
    function HOTELS()
    {
        return [
            ['NumHotel' => 1, 'logoHotel' => 'ssss','NomHotel' => 'f1','NomGerant' => 'jake','PrenGerant' => 'dirin','DateNaissGerant' => '1983-08-03','emailHotel' => 'jake.f1@gmail.com','cpHotel' => '13005','villeHotel' => 'Marseille','classeHotel' => '2'],    
            ['NumHotel' => 2, 'logoHotel' => 'ssss','NomHotel' => 'Renaissance','NomGerant' => 'Capera','PrenGerant' => 'Natalie','DateNaissGerant' => '1996-04-02','emailHotel' => 'Renaissance@gmail.com','cpHotel' => '13001','villeHotel' => 'Marseille','classeHotel' => '3'],    
            ['NumHotel' => 3, 'logoHotel' => 'ssss','NomHotel' => 'AC Hotel','NomGerant' => 'Smith','PrenGerant' => 'Kimberly','DateNaissGerant' => '1979-10-03','emailHotel' => 'AC.Hotel@gmail.com','cpHotel' => '13005','villeHotel' => 'Marseille','classeHotel' => '4'],    
            ['NumHotel' => 4, 'logoHotel' => 'ssss','NomHotel' => 'les Bords De Mer','NomGerant' => 'Taleb','PrenGerant' => 'Nassim','DateNaissGerant' => '1977-08-12','emailHotel' => 'Bords.De.Mer@gmail.com','cpHotel' => '13002','villeHotel' => 'Marseille','classeHotel' => '1'],    
            ['NumHotel' => 5, 'logoHotel' => 'ssss','NomHotel' => 'Grand Hôtel','NomGerant' => 'Conan','PrenGerant' => 'Joliot','DateNaissGerant' => '1992-03-22','emailHotel' =>'Grand.Hotel@gmail.com','cpHotel' => '13001','villeHotel' => 'Marseille','classeHotel' => '5'],       
        ];
    }

    function CLIENTS()
    {
        return [
            ['NumClient' => 1, 'NomClient' => 'jean','PrenClient' => 'max','MailClient' => 'jean.max@gmail.com','TelClient' => '0987350142'],    
            ['NumClient' => 2, 'NomClient' => 'Robert','PrenClient' => 'Penn Warren','MailClient' => 'PennWarren@gmail.com','TelClient' => '0687444142'],
            ['NumClient' => 3, 'NomClient' => 'Tennessee','PrenClient' => 'Williams','MailClient' => 'Williams@hotmail.com','TelClient' => '0987350144'],    
            ['NumClient' => 4, 'NomClient' => 'Dubois','PrenClient' => 'Marc','MailClient' => 'Marc.Dubois@gmail.com','TelClient' => '0687990142'],    
            ['NumClient' => 5, 'NomClient' => 'Nadine','PrenClient' => 'Michel','MailClient' => 'Michel.Nadine@gmail.com','TelClient' => '0479350332'],    
            ['NumClient' => 6, 'NomClient' => 'Sautet','PrenClient' => 'Jean','MailClient' => 'jean.Sautet@outlook.fr','TelClient' => '0987453896'],    
        ];
    }

    function EQUIPEMENTS()
    {
        return [
            ['idEquipemet' => 1, 'wifi' => 'true','parking' => 'true','salleSport' => 'true','animalFriendly' => 'true','Fumeur' => 'true'],    
            ['idEquipemet' => 2, 'wifi' => 'false','parking' => 'true','salleSport' => 'true','animalFriendly' => 'false','Fumeur' => 'true'],    
            ['idEquipemet' => 3, 'wifi' => 'true','parking' => 'false','salleSport' => 'true','animalFriendly' => 'true','Fumeur' => 'true'],    
            ['idEquipemet' => 4, 'wifi' => 'true','parking' => 'true','salleSport' => 'true','animalFriendly' => 'true','Fumeur' => 'false'],    
            ['idEquipemet' => 5, 'wifi' => 'true','parking' => 'true','salleSport' => 'false','animalFriendly' => 'true','Fumeur' => 'true'],    
            ['idEquipemet' => 6, 'wifi' => 'false','parking' => 'false','salleSport' => 'true','animalFriendly' => 'false','Fumeur' => 'true'],    
            ['idEquipemet' => 7, 'wifi' => 'true','parking' => 'false','salleSport' => 'true','animalFriendly' => 'true','Fumeur' => 'false'],    

        ];
    }

    function CHAMBRES()
    {
        return [
            ['NumChambre' => 1, 'NumHotel' => '1','NbreLits' => '2','Surface' => '20','prix' => '120','idEquipement' => '1'],    
            ['NumChambre' => 2, 'NumHotel' => '1','NbreLits' => '2','Surface' => '30','prix' => '150','idEquipement' => '1'],    
            ['NumChambre' => 3, 'NumHotel' => '2','NbreLits' => '1','Surface' => '10','prix' => '70','idEquipement' => '2'],    
            ['NumChambre' => 4, 'NumHotel' => '3','NbreLits' => '3','Surface' => '40','prix' => '120','idEquipement' => '3'],    
            ['NumChambre' => 5, 'NumHotel' => '4','NbreLits' => '2','Surface' => '20','prix' => '110','idEquipement' => '4'],    
            ['NumChambre' => 6, 'NumHotel' => '5','NbreLits' => '1','Surface' => '10','prix' => '80','idEquipement' => '5'],    
            ['NumChambre' => 7, 'NumHotel' => '6','NbreLits' => '4','Surface' => '60','prix' => '200','idEquipement' => '6'],    
            ['NumChambre' => 8, 'NumHotel' => '8','NbreLits' => '3','Surface' => '30','prix' => '140','idEquipement' => '7'],    
        ];
    }     

    
    function RESERVATIONS()
    {
        return [
            ['NumReservation' => 1, 'DateArrive' => '2021-03-04 13:00:00','DateDepart' => '2021-03-05 13:00:00','NumClient' => '1'],    
            ['NumReservation' => 2, 'DateArrive' => '2021-03-01 13:00:00','DateDepart' => '2021-03-02 13:00:00','NumClient' => '1'],
            ['NumReservation' => 3, 'DateArrive' => '2021-03-01 13:00:00','DateDepart' => '2021-03-09 13:00:00','NumClient' => '1'],    
            ['NumReservation' => 4, 'DateArrive' => '2021-03-04 13:00:00','DateDepart' => '2021-03-12 13:00:00','NumClient' => '2'],    
            ['NumReservation' => 5, 'DateArrive' => '2021-03-01 13:00:00','DateDepart' => '2021-03-04 13:00:00','NumClient' => '3'],    
            ['NumReservation' => 6, 'DateArrive' => '2021-03-01 13:00:00','DateDepart' => '2021-03-02 13:00:00','NumClient' => '4'],    
            
        
        
        ];
    }
    
    function CONTENUE_RESERVATION()
    {
        return [
            //date de départ est présent 2 fois
            ['NumReservation' => 1, 'NumChambre' => '1','NumHotel' => '1','DateDepart' => '2021-03-05 13:00:00'],    
            ['NumReservation' => 2, 'NumChambre' => '2','NumHotel' => '1','DateDepart' => '2021-03-02 13:00:00'],    
            ['NumReservation' => 3, 'NumChambre' => '3','NumHotel' => '2','DateDepart' => '2021-03-09 13:00:00'],    
            ['NumReservation' => 4, 'NumChambre' => '4','NumHotel' => '3','DateDepart' => '2021-03-12 13:00:00'],    
            ['NumReservation' => 5, 'NumChambre' => '5','NumHotel' => '4','DateDepart' => '2021-03-04 13:00:00'],    
            ['NumReservation' => 6, 'NumChambre' => '6','NumHotel' => '5','DateDepart' => '2021-03-02 13:00:00'],    
     
        ];
    }

}
