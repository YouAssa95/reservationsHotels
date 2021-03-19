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

       
        //// Liste des equipements cherchees 
       $equipements =[
        'wifi'=> isset($validatedData['wifi']) ? $validatedData['wifi']:null,
        'parking'=>isset($validatedData['parking'])?$validatedData['parking'] :null,
        'fumeur'=>isset($validatedData['fumeur'])?$validatedData['fumeur']:null,
        'salleSport'=>isset($validatedData['salleSport'])?$validatedData['salleSport']:null,
        'animalFriendly'=>isset($validatedData['animalFriendly'])?$validatedData['animalFriendly']:null
        ];

        $hotels=$this->repository->hotelsVille($validatedData['destination']); //// Critere destination

        

        
        $chambresProposes =[];
        foreach($hotels as $hotel){
            $chambresProposes =array_merge($chambresProposes,$this->repository->chambreDisponibles($hotel['NumHotel'],$validatedData['dateA'])); /// critere disponibilité
            
        }    
        // VarDumper::dump($hotels);
        // return;
        /// faut ajouter critere du prix  et des equipements 
        // VarDumper::dump($chambresProposes);
        // return;
        $request->session()->put('chambresProposes',$chambresProposes);
        return  view('trouverUnHotel');
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
    public function login(Request $request, Repository $repository)
    {
    
        $rules = [
            'email' => ['required', 'email', 'exists:CLIENTS,MailClient'],
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
                    $user=$repository->infoComptClient($validatedData['email'], $validatedData['password']);
                } 
                if(isset($validatedData['manager'])){
                    $user=$repository->infoComptHotel($validatedData['email'], $validatedData['password']);
                }
                $request->session()->put('user', $user);
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
    


    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect()->route('accueil');
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
