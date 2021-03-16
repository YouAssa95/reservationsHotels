<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\VarDumper;

use App\Repositories\Data;

class Repository
{
    function createDatabase(): void
    {
        DB::unprepared(file_get_contents('database/build.sql'));
    }
    function insertClient(array $client,string $password):int
    {
        $id= DB::table('CLIENTS')->insertGetId($client);        
        $this->insertPassword($id,'client',$password);
        return $id;
    }

    function insertPassword(int $idCompte,string $statut,string $password): bool
    {
        $passwordHash =  Hash::make($password);

        try {
            return DB::table('MOTDEPASSE')->insertGetId(['idCompte'=>$idCompte,'Statut' => $statut, 'MtdPass' => $passwordHash]);
        } catch (Exception $exception) {
            throw new Exception('utilisateur existe  existe déjà');
        }
    }

    function insertHotel(array $Hotel): int
    {
        return DB::table('HOTELS')->insertGetId($Hotel);
    }

    function insertChambre(array $Chambre): int
    {
        return DB::table('CHAMBRES')->insertGetId($Chambre);
    }
    function hotels(): array
    {
        return DB::table('HOTELS')->orderBy('id', 'asc')->get()->toArray();
    }


    function fillDatabase(): void
    {
        $this->data = new Data();
        $hotels = $this->data->Hotels();
        $clients = $this->data->Clients();

        foreach ($hotels as $hotel) {
            $this->insertHotel($hotel);
        }
        foreach ($clients as $client) {
            $this->insertClient($client,'test');
        }

        // ////Ajout d'un utilisateur de statut client  Juste pour tester
        // $mdp =['MtdPass'=>  Hash::make('test'),'Statut'=>'client','IdCompte'=>1];
        // DB::table('MOTDEPASSE')->insertGetId($mdp);
    }
    function insertEquipement(array $Equipement): int
    {
        return DB::table('EQUIPEMENTS')->insertGetId($Equipement);
    }
    function insertReservation(array $Reservation): int
    {
        return DB::table('RESERVATIONS')->insertGetId($Reservation);
    }
    function insertContenuReservation(array $ContenuReservation): int
    {
        return DB::table('CONTENUE_RESERVATION')->insertGetId($ContenuReservation);
    }

    /// Requettes de gestion 

    function checkPassword(String $password, string $passwordHash): bool
    {
        if (Hash::check($password, $passwordHash)) {
            return true;
        } else {
            throw new Exception('Utilisateur inconnu');
            return false;
        }
    }

    

    function infoComptClient($MailClient,string $password) :array
    {        
        try {
            $client= DB::table('CLIENTS')->where('MailClient', $MailClient)->get()->toArray();
            
           $row = DB::table('MOTDEPASSE')->where('IdCompte', $client[0]['NumClient'])->get()->toArray();
            
            if ($this->checkPassword($password, $row[0]['MtdPass'])) {
                    return $client[0];
            }          
        } catch (Exception $exception) {
            throw new Exception('Client inconnue');
        }
    }

    function infoComptHotel($NumHotel): array
    {
        try {
            return DB::table('HOTELS')
                ->where('NumHotel', $NumHotel)
                ->get()
                ->toArray();
        } catch (Exception $exception) {
            throw new Exception('Hotel inconnue');
        }
    }

    function reservationEnCours($NumClient): array
    {

        $ReservationEnCours = DB::table('RESERVATIONS')
            ->where('NumClient', $NumClient)
            ->where('DateDepart', '>', $date) // ????????????????? date de jour ?
            ->orderBy('DateDepart', 'asc')
            ->get()
            ->toArray();
        // if ($ReservationEnCours != NULL){}
        return $ReservationEnCours;
    }
    function reservationHistorique($NumClient): array
    {

        $ReservationEnCours = DB::table('RESERVATIONS')
            ->where('NumClient', $NumClient)
            ->where('DateDepart', '<', $date) // ????????????????? date de jour ?
            ->orderBy('DateDepart', 'asc')
            ->get()
            ->toArray();
        // if ($ReservationEnCours != NULL){}
        return $ReservationEnCours;
    }

    function chambreReservees($NumClient): array
    {
        $reservationEnCours = $this->reservationEnCours($NumClient);

        return DB::table('CONTENUE_RESERVATION')
            ->where('NumClient', $NumClient)
            ->where('NumReservation', 'IN', $reservationEnCours['NumReservation']) // ????????????????? date de jour ?
            //->orderBy('DateDepart', 'asc')
            ->get()
            ->toArray();
        // if ($ReservationEnCours != NULL){}

    }
}
