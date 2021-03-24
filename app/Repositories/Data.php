<?php

namespace App\Repositories;

class Data{
function HOTELS()
    {
        return [
            ['NumHotel' => 1, 'logoHotel' => 'ssss','NomHotel' => 'f1','NomGerant' => 'jake','PrenGerant' => 'dirin','emailHotel' => 'jake.f1@gmail.com','AdresseHotel'=>'16 Bd de valmy ','cpHotel' => '13005','villeHotel' => 'Marseille','classeHotel' => 2],    
            ['NumHotel' => 2, 'logoHotel' => 'ssss','NomHotel' => 'Renaissance','NomGerant' => 'Capera','PrenGerant' => 'Natalie','emailHotel' => 'Renaissance@gmail.com','AdresseHotel'=>'16 Bd de valmy ','cpHotel' => '13001','villeHotel' => 'Marseille','classeHotel' => 3],    
            ['NumHotel' => 3, 'logoHotel' => 'ssss1','NomHotel' => 'AC Hotel','NomGerant' => 'Smith','PrenGerant' => 'Kimberly','emailHotel' => 'AC.Hotel@gmail.com','cpHotel' => '13005','AdresseHotel'=>'16 Bd de valmy ','villeHotel' => 'Marseille','classeHotel' => 4],    
            ['NumHotel' => 4, 'logoHotel' => 'ssss1','NomHotel' => 'les Bords De Mer','NomGerant' => 'Taleb','PrenGerant' => 'Nassim','emailHotel' => 'Bords.De.Mer@gmail.com','AdresseHotel'=>'16 Bd de valmy ','cpHotel' => '13002','villeHotel' => 'Marseille','classeHotel' => 1],    
            ['NumHotel' => 5, 'logoHotel' => 'ssss','NomHotel' => 'Grand Hôtel','NomGerant' => 'Conan','PrenGerant' => 'Joliot','emailHotel' =>'Grand.Hotel@gmail.com','cpHotel' => '13001','AdresseHotel'=>'16 Bd de valmy ','villeHotel' => 'Paris','classeHotel' => 5],       
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
            ['idEquipement' => 1, 'wifi' => true,'parking' => true,'salleSport' => true,'animalFriendly' => true,'Fumeur' => true],    
            ['idEquipement' => 2, 'wifi' => false,'parking' => true,'salleSport' => true,'animalFriendly' => false,'Fumeur' => true],    
            ['idEquipement' => 3, 'wifi' => true,'parking' => false,'salleSport' => true,'animalFriendly' => true,'Fumeur' => true],    
            ['idEquipement' => 4, 'wifi' => true,'parking' => true,'salleSport' => true,'animalFriendly' => true,'Fumeur' => false],    
            ['idEquipement' => 5, 'wifi' => true,'parking' => true,'salleSport' => false,'animalFriendly' => true,'Fumeur' => true],    
            ['idEquipement' => 6, 'wifi' => false,'parking' => false,'salleSport' => true,'animalFriendly' => false,'Fumeur' => true],    
            ['idEquipement' => 7, 'wifi' => true,'parking' => false,'salleSport' => true,'animalFriendly' => true,'Fumeur' => false],    

        ];
    }

    function CHAMBRES()
    {

        return [
            ['idChambre'=>1,'NumChambre' => 1, 'NumHotel' => 1,'NbreLits'=>2,'Surface'=>20,'prix' =>33,'idEquipement'=>1 ],
            ['idChambre'=>2,'NumChambre' => 2, 'NumHotel' => 1,'NbreLits'=>1,'Surface'=>10,'prix' =>100,'idEquipement'=>3],
            ['idChambre'=>3,'NumChambre' => 3, 'NumHotel' => 2,'NbreLits'=>2,'Surface'=>20,'prix' =>33 ,'idEquipement'=>4],    
            ['idChambre'=>4,'NumChambre' => 4, 'NumHotel' => 3 ,'NbreLits'=>2,'Surface'=>20,'prix' =>33,'idEquipement'=>5],    
            ['idChambre'=>5,'NumChambre' => 5, 'NumHotel' => 5 ,'NbreLits'=>2,'Surface'=>20,'prix' =>33,'idEquipement'=>6],    
            ['idChambre'=>6,'NumChambre' => 6, 'NumHotel' => 5 ,'NbreLits'=>1,'Surface'=>10,'prix' =>17,'idEquipement'=>2]
        ];
    }     

   
    function RESERVATIONS()
    {
        return [
            ['NumReservation' => 1, 'DateArrive' => '2021-03-15 13:00:00','DateDepart' => '2021-03-05 13:00:00','NumClient' => '1'],    
            ['NumReservation' => 2, 'DateArrive' => '2021-03-15 13:00:00','DateDepart' => '2021-03-02 13:00:00','NumClient' => '1'],
            ['NumReservation' => 3, 'DateArrive' => '2021-03-15 13:00:00','DateDepart' => '2021-03-09 13:00:00','NumClient' => '1'],    
            ['NumReservation' => 4, 'DateArrive' => '2021-03-15 13:00:00','DateDepart' => '2021-03-12 13:00:00','NumClient' => '2'],    
            ['NumReservation' => 5, 'DateArrive' => '2021-03-15 13:00:00','DateDepart' => '2021-03-04 13:00:00','NumClient' => '3'],    
            ['NumReservation' => 6, 'DateArrive' => '2021-03-15 13:00:00','DateDepart' => '2021-03-02 13:00:00','NumClient' => '4'],    
            
        
        
        ];
    }
    
    function CONTENUE_RESERVATION()
    {
        return [
            //date de départ est présent 2 fois
            ['NumReservation' => 1, 'idChambre' => 1,'DateDepart' => '2021-03-07 13:00:00'],    
            ['NumReservation' => 2, 'idChambre' => 2,'DateDepart' => '2021-03-15 13:00:00'],    
            ['NumReservation' => 3, 'idChambre' => 3,'DateDepart' => '2021-03-18 13:00:00'],    
            ['NumReservation' => 4, 'idChambre' => 4,'DateDepart' => '2021-03-15 13:00:00'] ,
            // ['NumReservation' => 4, 'idChambre' => 5,'DateDepart' => '2021-03-12 13:00:00']  
            // ['NumReservation' => 5, 'NumChambre' => 5,'DateDepart' => '2021-03-04 13:00:00'],    
            // ['NumReservation' => 6, 'NumChambre' => 6,'DateDepart' => '2021-03-02 13:00:00'],    
     
        ];
    }

}