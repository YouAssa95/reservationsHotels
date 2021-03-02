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
    
    function insertClient(array $Client): int
    {   
        return DB::table('CLIENTS') -> insertGetId($Client);
       
    }

    function insertHotel(array $Hotel): int
    {
        return DB::table('HOTELS') -> insertGetId($Hotel);   
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
        ->where('DateDepart', '<' , date)
        ->orderBy('DateDepart', 'asc')
        ->get()
        ->toArray(); 
       // if ($ReservationEnCours != NULL){}
        return $ReservationEnCours; 
    }


}
