<?php

namespace App\Http\Controllers;

use Exception;
use App\Repositories\Repository;
use Facade\FlareClient\Http\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Mockery\Undefined;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Contracts\Service\Attribute\Required;
use DateTime;
// use PDF;
use Barryvdh\DomPDF\Facade as PDF;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
/* ----------------------------------------------------------------------------------------------------- */
    public function welcome(Request $request)
    {
        $request->session()->forget('HotelId');
        
        return view('accueil');
    }
/* ----------------------------------------------------------------------------------------------------- */
    public function entrerUnHotel()
    {   
        return view('entrerUnHotel',['lol'=>'4']);
    }
/* ----------------------------------------------------------------------------------------------------- */
    public function registerUnHotel(Request $request, Repository $repository){
        $rules = [

            //  'logoHotel' => ['required'],
            // 'NomHotel' => ['required', 'min:3', 'max:20'],
            // 'NomGerant' => ['required', 'min:3', 'max:20'],
            // 'PrenGerant' => ['required', 'min:3', 'max:20'],
            // 'DateNaissGerant' => ['required'],

            // 'AdresseHotel' => ['required'],
            // 'cpHotel' => ['required'],
            // 'villeHotel' => ['required'],
            // 'classeHotel' => ['required'],
            // 'emailHotel' => ['required', 'email'],
            // 'MtdPass' => ['required'],

            //  /* ********************************** chambre ********************* */   
            // 'ImagChambre' => ['required'],
            // 'nb_chambre' => ['required'],
            // 'NbreLits' => ['required'],
            // 'Surface' => ['required'],
            // 'prix' => ['required'],
            // /* ********************************** équipement ********************* */ 
            // 'parking' => [''],
            // 'wifi' => [''],
            // 'salleSport' => [''],
            // 'animalFriendly' => [''],
            // 'Fumeur' => [''],
            'logoHotel' => ['nullable'],
            'NomHotel' => ['required'],
            'NomGerant' => ['nullable'],
            'PrenGerant' => ['nullable'],
            'DateNaissGerant' => ['nullable'],

            'AdresseHotel' => ['nullable'],
            'cpHotel' => ['nullable'],
            'villeHotel' => ['nullable'],
            'classeHotel' => ['nullable'],
            'emailHotel' => ['required', 'email'],
            'MtdPass' => ['required'],

             /* ********************************** chambre ********************* */   
            'ImagChambre' => ['nullable'],
            'nb_chambre' => ['required'],
            'NbreLits' => ['nullable'],
            'Surface' => ['nullable'],
            'prix' => ['nullable'],
            /* ********************************** équipement ********************* */ 
            'parking' => [''],
            'wifi' => [''],
            'salleSport' => [''],
            'animalFriendly' => [''],
            'Fumeur' => ['']

        ];
        $messages = [
             'logoHotel.required' => "Vous devez choisir un fichier valide",
            
            'NomHotel.required' => "Vous devez saisir un nom valide",
            'NomHotel.min' => "Le nom doit contenir au moins :min caractères.",
            'NomHotel.max' => "Le nom doit contenir au plus :max caractères.",
            
            'NomGerant.required' => "Vous devez saisir un nom valide",
            'NomGerant.min' => "Le nom doit contenir au moins :min caractères.",
            'NomGerant.max' => "Le nom doit contenir au plus :max caractères.",

            'PrenGerant.required' => "Vous devez saisir un prénom valide",
            'PrenGerant.min' => "Le nom doit contenir au moins :min caractères.",
            'PrenGerant.max' => "Le nom doit contenir au plus :max caractères.",

            
            'DateNaissGerant.required' => "Vous devez saisir une date valide",
            'AdresseHotel.required' => "Vous devez saisir une adresse valide",
            'cpHotel.required' => "Vous devez saisir un code postal valide",
            'villeHotel.required' => "Vous devez saisir un nom de ville valide",
            'classeHotel.required' => "Vous devez choisir une classe Hotel valide",
            
            'emailHotel.required' => 'Vous devez saisir un e-mail.',
            'emailHotel.email' => 'Vous devez saisir un e-mail valide.',
            'MtdPass.required' => "Vous devez saisir un mot de passe.",
            /* ********************************** chambre ********************* */    
            'ImagChambre.required' => "Vous devez choisir un fichier valide",
            'nb_chambre.required' => 'Vous devez saisir nombre de chambre valide.',
            'NbreLits.required' => 'Vous devez saisir nombre de lits valide.',
            'Surface.required' => "Vous devez saisir un nombre valide.",
            'prix.required' => "Vous devez saisir un nombre valide."

            /* ********************************** équipement ********************* */
        ];

        try {
        $validatedData = $request->validate($rules, $messages);
        // add Hotel :    
        $hotelId = $this->repository->insertHotel([
                'NomGerant' => $validatedData['NomGerant'],
                'PrenGerant' => $validatedData['PrenGerant'],
                'DateNaissGerant' => $validatedData['DateNaissGerant'],
                'logoHotel' => $validatedData['logoHotel'],
                'NomHotel' => $validatedData['NomHotel'],
                'emailHotel' => $validatedData['emailHotel'],
                'AdresseHotel' => $validatedData['AdresseHotel'],
                'cpHotel' => $validatedData['cpHotel'],
                'villeHotel' => $validatedData['villeHotel'],
                'classeHotel' => $validatedData['classeHotel']
                ]);
        $motdepassId = $this->repository->insertPassword(
            $hotelId,
            "manager",
            $validatedData['MtdPass']
        );

              
        
        // add Equipement :      
        $EquipementId = $this->repository->insertEquipement([ 
            'parking' =>(isset($validatedData['parking'])) ? $validatedData['parking'] : NULL,
            'wifi' =>(isset($validatedData['wifi'])) ? $validatedData['wifi'] : NULL,
            'salleSport' => (isset($validatedData['salleSport'])) ? $validatedData['salleSport'] : NULL,
            'animalFriendly' => (isset($validatedData['animalFriendly'])) ? $validatedData['animalFriendly'] : NULL,
            'Fumeur' => (isset($validatedData['Fumeur'])) ? $validatedData['Fumeur'] : NULL 
        ]);
        


        // add Chambres :
        for ($num=1;$num<= $validatedData['nb_chambre'];$num++){
            $ChambreId = $this->repository->insertChambre([
                'NumChambre'=> $num,
                'imageCh' => $validatedData['ImagChambre'],
                'NumHotel' => $hotelId,
                'NbreLits' => $validatedData['NbreLits'],
                'Surface' => $validatedData['Surface'],
                'prix' => $validatedData['prix'],
                'idEquipement'=>$EquipementId
                ]);
            }       
     
        } catch (Exception $exception) {
           
            return redirect()->route('entrerUnHotel')->withInput()->withErrors("L'hôtel n'a pas pu être ajoutée.");
        }
        $request->session()->put('hotelId',$hotelId);
        return redirect()->route('entrerUneChambre');
        
    }
/* ----------------------------------------------------------------------------------------------------- */
    public function entrerUneChambre(){
         
        return view('addChambre');

    }
/* ----------------------------------------------------------------------------------------------------- */
    public function registerUneChambre(Request $request, Repository $repository){
            $rules = [

                   /* ********************************** chambre ********************* */   
                   'ImagChambre' => ['required'],
                   'nb_chambre' => ['required'],
                   'NbreLits' => ['required'],
                   'Surface' => ['required'],
                   'prix' => ['required'],
                   /* ********************************** équipement ********************* */ 
                   'parking' => [''],
                   'wifi' => [''],
                   'salleSport' => [''],
                   'animalFriendly' => [''],
                   'Fumeur' => ['']
            ];
            $messages = [
                
              /* ********************************** chambre ********************* */    
            'ImagChambre.required' => "Vous devez choisir un fichier valide",
            'nb_chambre.required' => 'Vous devez saisir nombre de chambre valide.',
            'NbreLits.required' => 'Vous devez saisir nombre de lits valide.',
            'Surface.required' => "Vous devez saisir un nombre valide.",
            'prix.required' => "Vous devez saisir un nombre valide."

            ];
        try{
            $validatedData = $request->validate($rules, $messages);
            // add Equipement :      
            $EquipementId = $this->repository->insertEquipement([ 
                'parking' =>(isset($validatedData['parking'])) ? $validatedData['parking'] : NULL,
                'wifi' =>(isset($validatedData['wifi'])) ? $validatedData['wifi'] : NULL,
                'salleSport' => (isset($validatedData['salleSport'])) ? $validatedData['salleSport'] : NULL,
                'animalFriendly' => (isset($validatedData['animalFriendly'])) ? $validatedData['animalFriendly'] : NULL,
                'Fumeur' => (isset($validatedData['Fumeur'])) ? $validatedData['Fumeur'] : NULL 
            ]);
            $hotelId= $request->session()->get('hotelId');
            // add Chambres :


// effacer session probleme unique  
            for ($num=1;$num<= $validatedData['nb_chambre'];$num++){
                $ChambreId = $this->repository->insertChambre([
                    'NumChambre'=> $num,
                    'imageCh' => $validatedData['ImagChambre'],
                    'NumHotel' => $hotelId,
                    'NbreLits' => $validatedData['NbreLits'],
                    'Surface' => $validatedData['Surface'],
                    'prix' => $validatedData['prix'],
                    'idEquipement'=>$EquipementId
                    ]);
                }    
        
        } catch (Exception $exception) {
            
            return redirect()->route('entrerUneChambre')->withInput()->withErrors("La chambre n'a pas pu être ajoutée.");
        }
        return redirect()->route('accueil');
    }
/* ----------------------------------------------------------------------------------------------------- */
    public function chambresDisponibles( $ville,$dateA) : array
    {
        $hotels=$this->repository->hotelsVille($ville); //// Critere destination

        $chambresDisponibles =[];
        foreach($hotels as $hotel){
            $chambresDisponibles =array_merge($chambresDisponibles,$this->repository->chambreDisponibles($hotel['NumHotel'],$dateA)); /// critere disponibilité
        }
        return $chambresDisponibles; 
    }

    /* ----------------------------------------------------------------------------------------------------- */

    /// display  search form 
    public function trouverUnHotel()
    {
        $chambresProposes = [];
        $chambres = $this->chambresDisponibles(null,date('Y-m-d'));
        // eviter les repetitions
        foreach ($chambres as $chambre) {
            
            $chambre['equipement'] = $this->repository->equipements($chambre['idEquipement'])[0];
            $chambre['logoHotel'] =$this->repository->getHotel($chambre['NumHotel'])[0]['logoHotel'];

            if ((count($chambresProposes) >0) && $this->repository->appartenance($chambre,$chambresProposes)) {
                continue;
            }
            $chambresProposes[]=$chambre;
        }
        // return;
        return  view('trouverUnHotel',['chambresProposes'=>$chambresProposes]);
    }
    /* ----------------------------------------------------------------------------------------------------- */

    public function trouverUnHotelResults(Request $request)
    {
        
        $rules = [
            'destination' => ['nullable'],
            'dateA' => ['nullable'],
            'dateD' => ['nullable'],
            'nbreLits' => ['nullable'],
            'Prixmin' => ['nullable'],
            'Prixmax' => 'nullable',
            'wifi'=> 'nullable',
            'parking'=> 'nullable',
            'fumeur'=> 'nullable',
            'salleSport'=> 'nullable',
            'animalFriendly'=> 'nullable',
        ];

        // $messages = ['destination.required' => 'Entrer une destination'];
        
        $validatedData = $request->validate($rules);
       
        //// Liste des equipements recherchees 
       $equipements = [
        'wifi'=> isset($validatedData['wifi']) ? $validatedData['wifi']:null,
        'parking'=>isset($validatedData['parking'])?$validatedData['parking'] :null,
        'fumeur'=>isset($validatedData['fumeur'])?$validatedData['fumeur']:null,
        'salleSport'=>isset($validatedData['salleSport'])?$validatedData['salleSport']:null,
        'animalFriendly'=>isset($validatedData['animalFriendly'])?$validatedData['animalFriendly']:null
        ];
        /// disponibilité et destination
        $chambresDisponibles = $this->chambresDisponibles($validatedData['destination'],$validatedData['dateA']);
        // prix max et min
        $chambresAvecPrix=$this->repository->priceCheck($validatedData['Prixmin'] ? $validatedData['Prixmin'] : 0,$validatedData['Prixmax']? $validatedData['Prixmax']:1000,$chambresDisponibles);
       
        /// equipemnts et Nbre de Lits
        $nbreLits =  isset($validatedData['nbreLits']) ? $validatedData['nbreLits']:null;
        $chambresProposes =  $this->repository->chambresAvecEquipements($chambresAvecPrix,$equipements, $nbreLits) ;
      
        session()->flashInput($request->input());
        return  view('trouverUnHotel',['chambresProposes'=>$chambresProposes]);
    }
/* ----------------------------------------------------------------------------------------------------- */
    public function aboutUs()
    {
        return view('aboutUs');
    }
/* ----------------------------------------------------------------------------------------------------- */
    public function hotels()
    {
      $hotels = $this->repository->hotels();  
      return view('hotels',['hotels' => $hotels]);
    }
/* ----------------------------------------------------------------------------------------------------- */
    public function showLoginForm()
    {
      return view('login');
    }
/* ----------------------------------------------------------------------------------------------------- */
    public function login(Request $request, Repository $repository)
    {
    
        $rules = [
            'email' => ['required', 'email'],
            // 'email' => ['required', 'email', 'exists:CLIENTS,MailClient'],
            'password' => ['required'],
            'manager' => 'nullable',
            'client' => 'nullable'
        ];
        $messages = [
            'email.required' => 'Vous devez saisir un e-mail.',
            'email.email' => 'Vous devez saisir un e-mail valide.',
            'email.exists' => "Cet utilisateur n'existe pas.",
            'password.required' => "Vous devez saisir un mot de passe.",
        ];

        
       
        $validatedData = $request->validate($rules, $messages);
       

        
        try {
            try {
                if (isset($validatedData['client'])) {
                    $client=$repository->infoComptClient($validatedData['email'], $validatedData['password']);
                    
                    $user = ['firstName'=>$client['PrenClient'],
                    'lastName' => $client['NomClient'],
                    'email'=>$client['MailClient'],
                    'statut'=>'client',
                    'NumClient' =>$client['NumClient']
                ];
                    $request->session()->put(['user'=>$user]);
                } 
                if(isset($validatedData['manager'])){
                    
                    $manager=$repository->infoComptHotel($validatedData['email'], $validatedData['password']);
                    $user = ['firstName'=>$manager['PrenGerant'],
                    'lastName' => $manager['NomGerant'],
                    'email'=>$manager['emailHotel'],
                    'statut'=>'manager'
                  ];

                  $request->session()->put(['user'=>$user]);
                    
                }

                if ($request->session()->has('redirectedReservation')) {
                    $ch =$request->session()->get('chambre');
                    $user = $request->session()->get('user');
                    // VarDumper::dump($user);
                    // return;

                    return redirect()->route('reservationShowForm',['idChambre'=>$ch['idChambre'],'user'=>$user, 'chambre'=>$ch]);
                }
                
                return redirect()->route('accueil');
                
            } catch (Exception $e) {

                return  redirect()->route('login.post');
            }
        } catch (Exception $e) {
            return redirect()->back()->withInput()->withErrors("Impossible de vous authentifier.");
        }
        
    }
/* ----------------------------------------------------------------------------------------------------- */
    public function showRegisterForm()
    {
      return view('register');
    }
/* ----------------------------------------------------------------------------------------------------- */
    public function registerClient(Request $request, Repository $repository)
    {
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required'],
            'lastname' => ['string'],
            'lastname' => ['nullable'],
            'firstname' => ['string'],
            'firstname' => ['nullable'],
            'dateNaiss' => ['required'],
            'tel' => ['required'],
        ];

        $messages = [
            'email.required' => 'Vous devez saisir un e-mail.',
            'email.email' => 'Vous devez saisir un e-mail valide.',
            'password.required' => "Vous devez saisir un mot de passe.",

            'lastname.string' => "Vous devez saisir un nom valide",
            'firstname.string' => "Vous devez saisir un prénom valide",
        ];
        
        $validatedData = $request->validate($rules, $messages);
        
            $client = [
                'NomClient' => $validatedData['lastname'], 
                'PrenClient' => $validatedData['firstname'], 
                'MailClient' => $validatedData['email'],
                'TelClient' => $validatedData['tel'],
                'DateNaiss' => $validatedData['dateNaiss'],
            ];
     

        try {
           $repository->insertClient($client, $validatedData['password']);
            
           $request->session()->put(['redirectFromRegister' => true, 'redirectEmail' => $validatedData['email'], 'redirectPassword' => $validatedData['password']]);
           return redirect()->route('login');
            // return redirect()->route('accueil');
        } catch (Exception $e) {
            return view('register');
        }
    }
/* ----------------------------------------------------------------------------------------------------- */
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect()->route('accueil');
    }
/* ----------------------------------------------------------------------------------------------------- */
    public function showContactForm()
    {
      return view('contact');
    }
/* ----------------------------------------------------------------------------------------------------- */
    public function contact()
    {
        return redirect()->route('accueil');
    }
/* ----------------------------------------------------------------------------------------------------- */
    public function showHotel(int $NumHotel)
    {
        $hotel=$this->repository->getHotel($NumHotel);
        return view('hotel', ['hotel' => $hotel[0]]);
    }

    //// Reservation
    public function showReservation(int $idChambre)
    {
        
        $chambre = $this->repository->getChambre($idChambre);
        
       return view('reservation', ['chambre' => $chambre[0]]);
    }

    public function reservationShowForm(Request $request,int $idChambre)
    {
        $chambre = $this->repository->getChambre($idChambre);
        if (!$request->session()->has('user')) {
            $request->session()->put(['redirectedReservation'=>true,'chambre'=>$chambre[0]]);
            return redirect()->route('login');
        }
        return view('reservationForm');
    }
    
    public function storeReservation(Request $request)
    {
        $rules = [
            'email' => ['required', 'email'],
            // 'email' => ['required', 'email', 'exists:CLIENTS,MailClient'],
            'password' => ['required'],
            'manager' => 'nullable',
            'client' => 'nullable'
        ];
        $messages = [
            'email.required' => 'Vous devez saisir un e-mail.',
            'email.email' => 'Vous devez saisir un e-mail valide.',
            'email.exists' => "Cet utilisateur n'existe pas.",
            'password.required' => "Vous devez saisir un mot de passe.",
        ];
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required'],
            'lastname' => ['string'],
            'lastname' => ['nullable'],
            'firstname' => ['string'],
            'firstname' => ['nullable'],
            'dateNaiss' => ['required'],
            'tel' => ['required'],
        ];
        
       
        $validatedData = $request->validate($rules);
    }


    ///// Compte Hotel et client 
    public function showProfil(Request $request)
    {
        $user = $request->session()->get('user');
        if ($user['statut']=='client') {
            return view('compteClient',['user'=>$user]);
        }
        return view('compteHotel',['user'=>$user]);        
    }


    /* ----------------------------------------------------------------------------------------------------- */

    // Utilisation pdf 

    public function getPostPdf (Request $request)
    {
        // ajouter la réservation à la base de données 
        $chambre = $request ->session()->get('chambre');
        // VarDumper::dump($chambre);
        // return;
        $reservation =['DateArrive'=> $request -> input('dateA'),'DateDepart'=> $request -> input('dateD'),'NumClient'=>$request->session()->get('user')['NumClient']];
        $NumReservation=$this->repository->insertReservation($reservation);

        $dateDepart = $request -> input('dateD');

        $time = "23:59:00";
        $datetime = "$dateDepart $time";
        $contenuReservation = ['NumReservation'=>$NumReservation];//,'idChambre'=>$chambre['idChambre'],'DateDepart'=> $datetime];
        $this->repository->insertContenuReservation($contenuReservation);
        // VarDumper::dump($chambre);
        // return;

        $obj =  (object) [
                'nom' => $request -> input('lastName'),
                'prenom' => $request -> input('firstName'),
                'mail' => $request -> input('email'),
                'tel' => $request -> input('phone'),
                //------------------------- trouver hotel
                
                'Hotel' => $chambre['NomHotel'],
                'adresse' => $chambre['AdresseHotel'],
                'cpHotel'=> $chambre['cpHotel'],
                'destination' => $chambre['villeHotel'],
                'arrive' => $request -> input('dateA'),
                'depart' => $request -> input('dateD'),
                'NumChambre'=> $chambre['NumChambre'],
                'prix'=> $chambre['prix'],
                'lit' => $request -> session()->get('chambre')['NbreLits'],
        ];

        // VarDumper::dump($obj);
        // return;
        // L'instance PDF avec une vue : resources/views/posts/show.blade.php
        $pdf = PDF::loadView('testpdf', compact('obj'));
        
        // Lancement du téléchargement du fichier PDF
        return $pdf->download("ma_reservation.pdf");
        
    }
    
}
