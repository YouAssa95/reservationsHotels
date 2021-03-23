<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\VarDumper;
use Carbon\Carbon;

use App\Repositories\Data;
use App\Post;
use PDF;
use DateTime;

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

    function insertChambre(array $Chambre)
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
        $equipements = $this->data->EQUIPEMENTS();


        foreach ($clients as $client) {
            $this->insertClient($client, 'test');
        }

        foreach ($equipements as $equipement) {
            $this->insertEquipement($equipement);
        }

        foreach ($hotels as $hotel) {
            $this->insertHotel($hotel);
        }

        foreach ($reservations as $reservation) {
            $this->insertReservation($reservation);
        }

        foreach ($chambres as $chambre) {
            $this->insertChambre($chambre);
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
            throw new Exception('Utilisateur inconnu');
            return false;
        }
    }

    

    function infoComptClient($MailClient,string $password) :array
    {        
        try {
            $client= DB::table('CLIENTS')->where('MailClient', $MailClient)->get()->toArray();
            
           $row = DB::table('MOTDEPASSE')->where('Statut','client')->where('IdCompte', $client[0]['NumClient'])->get()->toArray();
            
            if ($this->checkPassword($password, $row[0]['MtdPass'])) {
                    return $client[0];
            }          
        } catch (Exception $exception) {
            throw new Exception('Client inconnue');
        }
    }
    function infoComptHotel($Mailgerant,string $password): array
    {
        try {
            //statu n'est pas présent peux confondre avec idH=idC
            $gerant= DB::table('HOTELS')->where('emailHotel', $Mailgerant)->get()->toArray();
            
            $row = DB::table('MOTDEPASSE')->where('Statut','manager')->where('IdCompte', $gerant[0]['NumHotel'])->get()->toArray();
             
            if ($this->checkPassword($password, $row[0]['MtdPass'])) {
                     return $gerant[0];
            }

        } catch (Exception $exception) {
            throw new Exception('Hotel inconnue');
        }
    }

    function reservationEnCours($NumClient): array
    {

        //$today = Carbon::today();//
        $ReservationEnCours = DB::table('RESERVATIONS')
            ->where('NumClient', $NumClient)
            ->where('DateDepart', '>', new DateTime('now')) // ????????????????? date de jour ?
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
            ->where('DateDepart', '<', new DateTime('now')) // ????????????????? date de jour ?
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

    public  function getChambre(int $idChambre) : array
    {
        return DB::table('CHAMBRES')
            ->join('HOTELS', 'HOTELS.NumHotel', '=', 'CHAMBRES.NumHotel')
            ->join('EQUIPEMENTS','EQUIPEMENTS.idEquipement','=','CHAMBRES.idEquipement' )
            ->where('idChambre', $idChambre)
            ->get()
            ->toArray();
    }
    public function getHotel(int $NumHotel) : array
    {
        return DB::table('HOTELS')->where('NumHotel',$NumHotel)->get()->toArray();
    }
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
        
        $time = "00:00:00";
        if (!$dateA) {
            $dateA = date('Y-m-d');
        }
        $datetime = "$dateA $time";

        /// chambres non reservees
        $chambresNonReservees = DB::table('CHAMBRES')
            ->join('HOTELS', 'HOTELS.NumHotel', '=', 'CHAMBRES.NumHotel')
            ->select()
            ->where('HOTELS.NumHotel', $NumHotel)
            ->whereNotIn('idChambre', DB::table('CONTENUE_RESERVATION')->select('idChambre')->get()->toArray())
            ->get()
            ->toArray();

        /// chambres reservees qui seront ibéres avant la date d'arrivée du client
        $chambresReservees = DB::table('CHAMBRES')
            ->join('HOTELS', 'HOTELS.NumHotel', '=', 'CHAMBRES.NumHotel')
            ->where('HOTELS.NumHotel', $NumHotel)
            ->whereIn('idChambre', DB::table('CONTENUE_RESERVATION')->select('idChambre')->where('DateDepart', '<', $datetime)->get()->toArray())
            ->get()
            ->toArray();
        
        //// fonction pour verifier le prix 

        return  array_merge($chambresNonReservees, $chambresReservees);
            
    }

    public function priceCheck(int $prixMin,int $prixMax,$chambres) : array
    {
        $result =[];
       
        
        foreach($chambres as $chambre){
            if (($chambre['prix'] >=  $prixMin) && ($chambre['prix'] <= $prixMax ) ) {
                $result[]=$chambre;
            }
        }   
       return $result;
    }

    /// equipements pour une chambre donnée

    public function equipements(int $idEquipement) 
    {
        
       return DB::table('EQUIPEMENTS')
        ->where('idEquipement', $idEquipement)
        ->get()
        ->toArray();
    }
    public function criteresEquipements($chambre,$critere) 
    {
            if ($this->equipements($chambre['idEquipement'])[0][$critere] ) {
                return true;
            }
            return false;
    }
    
    /// check if chambre appartient déjà aux résultats retournés ou non
    /// Pour ne pas afficher les chambres avec les mêmes caractéristiques

    public function appartenance($chambre,$res)  : bool
    {
        foreach ($res as $ch) {
         
            if (array_slice($ch,2) == array_slice($chambre,2)) {
                return true;
            }       
        }
        return false;
    }

    public function chambresAvecEquipements($chambres,$equipements,$nbreLits) 
    {
        $res = [];
      
        foreach ($chambres as $chambre) {
            

            if ((count($res) >0) && $this->appartenance($chambre,$res)) {
                continue;
            }
            if ($equipements['parking'] && !$this->criteresEquipements($chambre,'parking') ) {
                continue;
            }
            
            if ($equipements['wifi'] && !$this->criteresEquipements($chambre,'wifi') ) {
                continue;
            }
            if ($equipements['salleSport'] && !$this->criteresEquipements($chambre,'salleSport') ) {
                continue;
            }
            if ($equipements['animalFriendly'] && !$this->criteresEquipements($chambre,'animalFriendly') ) {
                continue;
            }
            if ($equipements['fumeur'] && !$this->criteresEquipements($chambre,'Fumeur') ) {
                continue;
            }
            if ($nbreLits && !($chambre['NbreLits'] == $nbreLits ) ) {
                continue;
            }
            $chambre['equipement'] = $this->equipements($chambre['idEquipement'])[0];
            $chambre['logoHotel'] =$this->getHotel($chambre['NumHotel'])[0]['logoHotel'];
            
            $res[] = $chambre;

        }
        return $res;
    }

}
                                                                                       