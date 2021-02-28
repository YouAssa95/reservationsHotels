<?php

namespace App\Http\Controllers;

use Exception;
use App\Repositories\Repository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

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
      return view('hotels');
    }
    
    public function showLoginForm()
    {
      return view('login');
    }

    public function login($request)
    {
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
    

   
}
