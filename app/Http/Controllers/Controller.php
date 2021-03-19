<?php

namespace App\Http\Controllers;

use Exception;
use App\Repositories\Repository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\VarDumper\VarDumper;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function welcome()
    {
        
        return view('accueil');
    }
    public function entrerUnHotel()
    {
        
        return view('entrerUnHotel',['lol'=>'4']);
    }
    public function registerUnHotel(Request $request, Repository $repository){
        $rules = [

             'logoHotel' => ['required'],
            'NomHotel' => ['required', 'min:3', 'max:20'],
            'NomGerant' => ['required', 'min:3', 'max:20'],
            'PrenGerant' => ['required', 'min:3', 'max:20'],
            'DateNaissGerant' => ['required'],

            'AdresseHotel' => ['required'],
            'cpHotel' => ['required'],
            'villeHotel' => ['required'],
            'classeHotel' => ['required'],
            'emailHotel' => ['required', 'email'],
            'MtdPass' => ['required'],

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
            'Fumeur' => [''],

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
        $validatedData = $request->validate($rules, $messages);

        
        try {
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

                /*VarDumper::dump($parking);
                return;*/
        
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
                'ImagChambre' => $validatedData['ImagChambre'],
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
        return redirect()->route('entrerUneChambre');
        
    }
    public function entrerUneChambre(){
         
      
        return view('addChambre');

    }




    public function registerEquipements(Request $request, Repository $repository){
       /* $rules = [

             'parking' => ['required'],
            'wifi' => ['required'],
            'salleSport' => ['required'],
            'animalFriendly' => ['required'],
            'Fumeur' => ['required'],
        ];
        $messages = [
            'parking.required' => "Vous devez choisir un fichier valide",
            'nb_chambre.required' => 'Vous devez saisir nombre de chambre valide.',
            'NbreLits.required' => 'Vous devez saisir nombre de lits valide.',
            'Surface.required' => "Vous devez saisir un nombre valide.",
            'prix.required' => "Vous devez saisir un nombre valide."
        ]
        $validatedData = $request->validate($rules, $messages);
        */
    }
    
    public function trouverUnHotel()
    {
        
        return view('trouverUnHotel');
    }
    
    public function aboutUs()
    {
        return view('aboutUs');
    }
    public function hotels()
    {
      $hotels = $this->repository->hotels();  
      return view('hotels',['hotels' => $hotels]);
    }
    
    public function showLoginForm()
    {
      return view('login');
    }

    
    public function register(Request $request, Repository $repository)
    {
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required'],
            'lastname' => ['string'],
            'firstname' => ['string'],
            'firstname' => ['nullable'],
            'lastname' => ['nullable'],
            'statut' => ['required'],
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
        
        if ($validatedData['statut']==1) {
            $client = [
                'NomClient' => $validatedData['lastname'], 
                'PrenClient' => $validatedData['firstname'], 
                'MailClient' => $validatedData['email'],
                'TelClient' => $validatedData['tel'],
                'DateNaiss' => $validatedData['dateNaiss'],
            ];
        }

        try {
           $repository->insertClient($client, $validatedData['password']);
            return redirect()->route('accueil');
        } catch (Exception $e) {
            return view('register');
        }
    }
    
    public function login(Request $request, Repository $repository)
    {
    
        $rules = [
            'email' => ['required', 'email', 'exists:CLIENTS,MailClient'],
            'password' => ['required']
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
                $client=$repository->infoComptClient($validatedData['email'], $validatedData['password']);
                $request->session()->put('user', $client);
                return redirect()->route('accueil');
                
            } catch (Exception $e) {

                return  redirect()->route('login.post');
            }
        } catch (Exception $e) {
            return redirect()->back()->withInput()->withErrors("Impossible de vous authentifier.");
        }
        
    }
    
    public function showRegisterForm()
    {
      return view('register');
    }
    public function showContactForm()
    {
      return view('contact');
    }
    public function contact()
    {
        return redirect()->route('accueil');
    }


    public function showHotel(int $NumHotel)
    {
        $hotel=$this->repository->infoComptHotel($NumHotel);
        return view('hotel', ['hotel' => $hotel[0]]);
    }

   
}
