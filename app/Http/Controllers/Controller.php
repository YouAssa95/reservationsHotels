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

    public function showRanking()
    {
        $ranking = $this->repository->sortedRanking();

        return view('ranking', ['ranking' => $ranking]);
    }

    public function showTeam(int $teamId)
    {
        $matchesJoues =  $this->repository->teamMatches($teamId);
        $classementTeam = $this->repository->rankingRow($teamId);
        return view('team', ['matchesJoues' => $matchesJoues, 'classementTeam' => $classementTeam]);
    }

    public function createTeam()
    {
        return view('team_create');
    }

    public function storeTeam(Request $request)
    {
        $messages = [
            'team_name.required' => "Vous devez saisir un nom dequipe.",
            'team_name.min' => "Le nom doit contenir au moins :min caracteres.",
            'team_name.max' => "Le nom doit contenir au plus :max caracteres.",
            'team_name.unique' => "Le nom dequipe existe deja."
        ];

        $rules = ['team_name' => ['required', 'min:3', 'max:20', 'unique:teams,name']];
        $validatedData = $request->validate($rules, $messages);
        $name = $validatedData['team_name'];

        try {
            $teamId = count($this->repository->teams()) + 1;
            $this->repository->insertTeam(['id' => $teamId, 'name' => $name]);
            $this->repository->updateRanking();
        } catch (Exception $exception) {
            return redirect()->route('teams.create')->withErrors("Impossible de créer l'équipe.");
        }

        return redirect()->route('teams.show', ['teamId' => $teamId]);
    }

    public function createMatch()
    {
      
        $teams = $this->repository->teams();
        return view('match_create',['teams'=>$teams]);
    }

    public function storeMatch(Request $request)
    {
        
        $rules = [
            'team0' => ['required', 'exists:teams,id'],
            'team1' => ['required', 'exists:teams,id'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
            'score0' => ['required', 'integer', 'between:0,50'],
            'score1' => ['required', 'integer', 'between:0,50']
        ];

        $messages = [
            'team0.required' => 'Vous devez choisir une équipe.',
            'team0.exists' => 'Vous devez choisir une équipe qui existe.',
            'team1.required' => 'Vous devez choisir une équipe.',
            'team1.exists' => 'Vous devez choisir une équipe qui existe.',
            'date.required' => 'Vous devez choisir une date.',
            'date.date' => 'Vous devez choisir une date valide.',
            'time.required' => 'Vous devez choisir une heure.',
            'time.date_format' => 'Vous devez choisir une heure valide.',
            'score0.required' => 'Vous devez choisir un nombre de buts.',
            'score0.integer' => 'Vous devez choisir un nombre de buts entier.',
            'score0.between' => 'Vous devez choisir un nombre de buts entre 0 et 50.',
            'score1.required' => 'Vous devez choisir un nombre de buts.',
            'score1.integer' => 'Vous devez choisir un nombre de buts entier.',
            'score1.between' => 'Vous devez choisir un nombre de buts entre 0 et 50.',
        ];
        $validatedData = $request->validate($rules, $messages);

        $date = $validatedData['date'];
        $time = $validatedData['time'];
        $datetime = "$date $time";

       
        try {
            $teamId = count($this->repository->matches()) + 1;
            $match =['id' => $teamId, 'team0' => $validatedData['team0'], 'team1' =>$validatedData['team1'], 
            'score0' => $validatedData['score0'], 'score1' =>$validatedData['score1'], 'date' => $datetime];
            $this->repository->insertMatch( $match);
        } catch (Exception $exception) {
            return redirect()->route('matches.create')->withErrors("Impossible de créer l'équipe.");
        }
        return redirect()->route('ranking.show');
    
    }
}
