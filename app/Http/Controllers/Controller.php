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
        
        return view('entrerUnHotel');
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
    public function login(Request $request, Repository $repository)
    {
    
        $rules = [
            'email' => ['required', 'email', 'exists:CLIENTS,MailClient'],
            'password' => ['required'],
            'statut' => ['required']
        ];
        $messages = [
            'email.required' => 'Vous devez saisir un e-mail.',
            'email.email' => 'Vous devez saisir un e-mail valide.',
            'email.exists' => "Cet utilisateur n'existe pas.",
            'password.required' => "Vous devez saisir un mot de passe.",
        ];
       
        $validatedData = $request->validate($rules, $messages);
        // VarDumper::dump($validatedData);
        // return;
        try {
            try {
                if ($validatedData['statut']==1) {
                    $user=$repository->infoComptClient($validatedData['email'], $validatedData['password']);
                } else if($validatedData['statut']==2){
                    $user=$repository->infoComptHotel($validatedData['email'], $validatedData['password']);
                }else if($validatedData['statut']==3){
                    $user=$repository->infoComptAdmin($validatedData['email'], $validatedData['password']);   
                }
                $request->session()->put('user', $user);
                // VarDumper::dump($request->session());
                // return;
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

    public function register(Request $request, Repository $repository)
    {
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required'],
            'lastname' => ['string'],
            'lastname' => ['nullable'],
            'firstname' => ['string'],
            'firstname' => ['nullable'],
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
