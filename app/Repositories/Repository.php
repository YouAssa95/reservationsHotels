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
    function insertClient(array $client, string $password): int
    {
        $id = DB::table('CLIENTS')->insertGetId($client);
        $this->insertPassword($id, 'client', $password);
        return $id;
    }

    function insertPassword(int $idCompte, string $statut, string $password): bool
    {
        $passwordHash =  Hash::make($password);

        try {
            return DB::table('MOTDEPASSE')->insertGetId(['idCompte' => $idCompte, 'Statut' => $statut, 'MtdPass' => $passwordHash]);
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

    function insertEquipement(array $Equipement): int
    {
        return DB::table('EQUIPEMENTS')->insertGetId($Equipement);
    }
    function insertReservation(array $reservation): int
    {
        return DB::table('RESERVATIONS')->insertGetId($reservation);
    }
    function insertContenuReservation($contenuReservation): int
    {
        return DB::table('CONTENUE_RESERVATION')->insertGetId($contenuReservation);
    }


    function fillDatabase(): void
    {
        $this->data = new Data();
        $hotels = $this->data->Hotels();
        $clients = $this->data->Clients();
        $chambres = $this->data->chambres();
        $reservations = $this->data->RESERVATIONS();
        $contenu_reservations = $this->data->CONTENUE_RESERVATION();




        foreach ($hotels as $hotel) {
            $this->insertHotel($hotel);
        }
        foreach ($clients as $client) {
            $this->insertClient($client, 'test');
        }
        foreach ($chambres as $chambre) {
            $this->insertChambre($chambre);
        }

        foreach ($reservations as $reservation) {
            $this->insertReservation($reservation);
        }

        foreach ($contenu_reservations as $contenu_reservation) {
            // var_export($contenu_reservation);
            $this->insertContenuReservation($contenu_reservation);
        }
    }


    /// Requettes de gestion 

    function checkPassword(String $password, string $passwordHash): bool
    {
        if (Hash::check($password, $passwordHash)) {
            return true;
        } else {
            throw new Exception('Mot de passe incorrect');
            return false;
        }
    }



    function infoComptClient($MailClient, string $password): array
    {
        try {
            $client = DB::table('CLIENTS')->where('MailClient', $MailClient)->get()->toArray();

            $row = DB::table('MOTDEPASSE')->where('IdCompte', $client[0]['NumClient'])->get()->toArray();

            if ($this->checkPassword($password, $row[0]['MtdPass'])) {
                return $client[0];
            }
        } catch (Exception $exception) {
            throw new Exception('Client inconnue');
        }
    }

    function infoComptHotel($emailHotel, string $password): array
    {
        try {
            $hotel = DB::table('HOTELS')->where('emailHotel', $emailHotel)->get()->toArray();

            $row = DB::table('MOTDEPASSE')->where('IdCompte', $hotel[0]['NumHotel'])->get()->toArray();
            if ($this->checkPassword($password, $row[0]['MtdPass'])) {
                return $hotel[0];
            }
        } catch (Exception $exception) {
            throw new Exception('Hotel inconnue');
        }
    }
    function infoComptAdmin($NumHotel): array
    {
        return [];
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



    /**##################" Trouver un Hotel  */

    public function hotelsVille($ville)
    {
        if ($ville) {
            return DB::table('HOTELS')->where('villeHotel', $ville)->get()->toArray();
        }
        return $this->hotels();
    }


    public function chambreDisponibles($NumHotel, $dateA)
    {


        // chambreReserves qui seront dispo a la date d'arrive du client
        $time = "13:00:00";
        $datetime = "$dateA $time";

        return  DB::table('CHAMBRES')
            ->select()
            ->where('NumHotel', $NumHotel)
            ->where('reserve', false)
            ->orwhereIn('idChambre', DB::table('CONTENUE_RESERVATION')->select('idChambre')->where('DateDepart', '<', $datetime)->get()->toArray())
            ->get()
            ->toArray();

        // VarDumper::dump($ChambreDisp);

        // ->whereNotIn('NumChambre', DB::table('CONTENUE_RESERVATION')->select('NumChambre')->get()->toArray())
    }
}
