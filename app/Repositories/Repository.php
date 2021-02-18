<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Repositories\Data;
use App\Repositories\Ranking;

class Repository
{
    function createDatabase(): void 
    {
        DB::unprepared(file_get_contents('database/build.sql'));
    }
    function insertTeam(array $team): int
    {
        
        return DB::table('teams') -> insertGetId(['id'=> $team['id'],'name' => $team['name']]);
       
       
    }

    function insertMatch(array $match): int
    {
        return DB::table('matches')-> insertGetId(['id'=>$match['id'] ,'team0' => $match['team0'],
        'team1' => $match['team1'],'score0' => $match['score0'],'score1'=> $match['score1'],
        'date'=> $match['date']]);
    }

    function teams(): array
    {
        return DB::table('teams')->orderBy('id', 'asc')->get()->toArray();
    }

    function matches(): array
    {
    
        return DB::table('matches')->orderBy('id', 'asc')->get()->toArray();
    }

    function fillDatabase(): void 
    {
        $this->data = new Data();
        $teams = $this->data->teams();
        $matches = $this->data->matches();

        foreach ($matches as $match) {
            $this->insertMatch($match);
        }
        foreach ($teams as $team) {
            $this-> insertTeam($team);
        }
    }

    function team($teamId) : array 
    {
        try {
            
            $row = DB::table('teams')->where('id', $teamId)->get()->toArray();
            return ['id'=> $row[0]['id'],'name' => $row[0]['name']]; 
            
          } catch (Exception $exception) {
            throw new Exception('Équipe inconnue');
          }
       
    }


    

    function updateRanking(): void 
    {
        DB::table('ranking')->delete();
        $ranking = new Ranking();
        $sortedRanking = $ranking -> sortedRanking( $this->teams() , $this->matches());
       
        foreach ($sortedRanking as $row) {
            DB::table('ranking')-> insert($row);
        }

    }

    function sortedRanking(): array 
    {
        return DB::table('ranking')
        ->join('teams', 'ranking.team_id', '=', 'teams.id')
        ->orderBy('rank')
        ->get(['ranking.*','teams.name'])
        ->toArray(); 
    }

    function teamMatches($teamId) : array
    {
        $rows = DB::table('matches as m')
        ->join('teams as t0', 'm.team0', '=', 't0.id')
        ->join('teams as t1', 'm.team1', '=', 't1.id')
        ->where('m.team0',$teamId)
        ->orwhere('m.team1',$teamId)
        ->orderBy('date')
        ->get(['m.*','t0.name as name0','t1.name as name1'])
        ->toArray(); 
        return $rows;
    }

    function rankingRow($teamId) : array 
    {
        try {
            
                $row= DB::table('ranking')
            ->join('teams', 'ranking.team_id', '=', 'teams.id')
            ->where('ranking.team_id',$teamId)     
            ->get(['ranking.rank','teams.name','ranking.team_id','ranking.match_played_count','ranking.won_match_count','ranking.lost_match_count',
            'ranking.draw_match_count','ranking.goal_for_count','ranking.goal_against_count','ranking.goal_difference','ranking.points'])
            ->toArray(); 
            return $row[0];

          } catch (Exception $exception) {
            throw new Exception('Équipe inconnue');
          }

        
    }

}
