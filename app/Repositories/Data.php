<?php

namespace App\Repositories;


class Data
{
    function Clients()
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

    function Hotels()
    {
        return [
            ['NumHotel' => 1, 'logoHotel' => 'jean','NomHotel' => 'max','MailClient' => 'jean.max@gmail.com','TelClient' => '0987350142'],    
            

            
        ];
    }

}
