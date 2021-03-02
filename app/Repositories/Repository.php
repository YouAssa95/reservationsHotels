<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Repositories\Data;

class Repository
{
    function createDatabase(): void 
    {
        DB::unprepared(file_get_contents('database/build.sql'));
    }
<<<<<<< HEAD
    function insertClient(array $Clients): int
    {
        return DB::table('CLIENTS') -> insertGetId(['NumClient'=> $Clients['NumClient'],'NomClient' => $Clients['NomClient'],'PrenClient' => $Clients['PrenClient'],
                                                    'MailClient' => $Clients['MailClient'],'TelClient' => $Clients['TelClient'],'DateNaiss' => $Clients['DateNaiss']]);
=======
    
    function insertClient(array $Client): int
    {   
        return DB::table('CLIENTS') -> insertGetId($Client);
       
>>>>>>> 4b0611b57fc588777c0b001266c42202c92a7884
    }

    function insertHotel(array $Hotel): int
    {
<<<<<<< HEAD
        return DB::table('HOTELS') -> insertGetId(['NumHotel'=> $Hotel['NumHotel'],'logoHotel' => $Hotel['logoHotel'],'NomHotel' => $Hotel['NomHotel'],
                                                    'NomGerant' => $Hotel['NomGerant'],'PrenGerant' => $Hotel['PrenGerant'],'DateNaissGerant' => $Hotel['DateNaissGerant'],
                                                    'emailHotel' => $Hotel['emailHotel'],'AdresseHotel' => $Hotel['AdresseHotel'],'cpHotel' => $Hotel['cpHotel'],
                                                    'villeHotel' => $Hotel['villeHotel'],'classeHotel' => $Hotel['classeHotel']]);   
=======
        return DB::table('HOTELS') -> insertGetId($Hotel);   
>>>>>>> 4b0611b57fc588777c0b001266c42202c92a7884
    }
    
    function insertChambre(array $Chambre): int
    {
        return DB::table('HOTELS') -> insertGetId($Chambre);   
    }
    function hotels(): array
    {
        return DB::table('HOTELS')->orderBy('id', 'asc')->get()->toArray();
    }
   
    
    function fillDatabase(): void
    {
        $this->data = new Data();
        $hotels = $this->data->Hotels();
        $clients =$this->data->Clients();

        foreach ($hotels as $hotel) {
            $this->insertHotel($hotel);
        }
        foreach ($clients as $client) {
            $this->insertClient($client);
        }
    }
    function insertEquipement(array $Equipement): int
    {
        return DB::table('EQUIPEMENTS') -> insertGetId(['idEquipemet'=> $Equipement['idEquipemet'],'wifi' => $Equipement['wifi'],'parking' => $Equipement['parking'],
                                                    'salleSport' => $Equipement['salleSport'],'animalFriendly' => $Equipement['animalFriendly'],'Fumeur' => $Equipement['Fumeur']]);   
    }
    function insertReservation(array $Reservation): int
    {
        return DB::table('RESERVATIONS') -> insertGetId(['NumReservation'=> $Reservation['NumReservation'],'DateArrive' => $Reservation['DateArrive'],'DateDepart' => $Reservation['DateDepart'],
                                                    'NumClient' => $Reservation['NumClient']]);   
    }
    function insertContenuReservation(array $ContenuReservation): int
    {
        return DB::table('CONTENUE_RESERVATION') -> insertGetId(['NumReservation'=> $ContenuReservation['NumReservation'],'NumChambre' => $ContenuReservation['NumChambre'],'NumHotel' => $ContenuReservation['NumHotel'],
                                                    'DateDepart' => $ContenuReservation['DateDepart']]);   
    }

    /// Requettes de gestion 

    function infoComptClient ($NumClient): array
    {
        try{
        return DB::table('CLIENTS')
        ->where('NumClient', $NumClient)
        ->get()
        ->toArray(); 
        } catch (Exception $exception) {
            throw new Exception('Client inconnue');
        }
    }
    function infoComptHotel ($NumHotel): array
    {
        try{
        return DB::table('HOTELS')
        ->where('NumHotel', $NumHotel)
        ->get()
        ->toArray(); 

        } catch (Exception $exception) {
            throw new Exception('Hotel inconnue');
        }
    }

    function reservationEnCours ($NumClient): array
    {
        
        $ReservationEnCours= DB::table('RESERVATIONS')
        ->where('NumClient', $NumClient)
        ->where('DateDepart', '>' , date) // ????????????????? date de jour ?
        ->orderBy('DateDepart', 'asc')
        ->get()
        ->toArray(); 
       // if ($ReservationEnCours != NULL){}
        return $ReservationEnCours; 
    }
    function reservationHistorique ($NumClient): array
    {
        
        $ReservationEnCours= DB::table('RESERVATIONS')
        ->where('NumClient', $NumClient)
        ->where('DateDepart', '<' , date) // ????????????????? date de jour ?
        ->orderBy('DateDepart', 'asc')
        ->get()
        ->toArray(); 
       // if ($ReservationEnCours != NULL){}
        return $ReservationEnCours; 
    } 
    function chambreReservees ($NumClient): array
    {
        $reservationEnCours =$this->reservationEnCours($NumClient)
       

        return DB::table('CONTENUE_RESERVATION')
        ->where('NumClient', $NumClient)
        ->where('NumReservation', 'IN' , $reservationEnCours['NumReservation']) // ????????????????? date de jour ?
        //->orderBy('DateDepart', 'asc')
        ->get()
        ->toArray(); 
       // if ($ReservationEnCours != NULL){}
          
    }

}
