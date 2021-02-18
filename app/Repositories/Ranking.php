<?php


namespace App\Repositories;
class Ranking 
{ 
    function goalDifference(int $goalFor, int $goalAgainst): int 
    {
       return $goalFor - $goalAgainst;
    }

    function points(int $wonMatchCount, int $drawMatchCount): int
    {
            return 3*$wonMatchCount+$drawMatchCount;
    }

    function teamWinsMatch(int $teamId, array $match): bool
    {   if ($match['team0']==$teamId) {
                return ($match['score0']>$match['score1']);
        }
        else if($match['team1']==$teamId) {
                return  ($match['score1']>$match['score0']);
        }else {
            return 0;
        }
        // return ($match['team0']==$teamId) ? ($match['score0']>$match['score1']) :   ($match['score1']>$match['score0']);
    }

    function teamLosesMatch(int $teamId, array $match): bool
    {
        return ($match['team0']==$teamId) ? ($match['score0']<$match['score1']) :   ($match['score1']<$match['score0']);
    }

    function teamMakesADraw(int $teamId, array $match): bool
    {   
        
        return ($match['team0']==$teamId || $match['team1']==$teamId ) ? ($match['score0']==$match['score1']) :   false;
    }

    function goalForCountDuringAMatch(int $teamId, array $match): int 
    {
        
        return ($match['team0']==$teamId) ? ($match['score0']) : (($match['team1']==$teamId) ? $match['score1'] :  0) ;
        
    }

    function goalAgainstCountDuringAMatch(int $teamId, array $match): int 
    {
        
        return ($match['team0']==$teamId) ? ($match['score1']) : (($match['team1']==$teamId) ? $match['score0'] :  0) ;
        
    }
  

    function goalForCount(int $teamId, array $matches): int
    {
        $sum = 0;
        foreach( $matches as $match){
            $sum+= $this->goalForCountDuringAMatch($teamId, $match);   
        }
        return $sum;
    }

    
    function goalAgainstCount(int $teamId, array $matches): int
    {
        $sum = 0;
        foreach ($matches as $mach) {
          $sum += $this->goalAgainstCountDuringAMatch( $teamId, $mach);     
        }
        return $sum;
    }
    
    
    function wonMatchCount(int $teamId, array $matches): int
    {
        $NbreMachsGagnes = 0;
        foreach ($matches as $mach) {
            $NbreMachsGagnes = ($this->goalForCountDuringAMatch( $teamId, $mach)-$this->goalAgainstCountDuringAMatch( $teamId, $mach)>0) ? ($NbreMachsGagnes+=1) : $NbreMachsGagnes;     
        }
        return $NbreMachsGagnes;   
    }

    function lostMatchCount(int $teamId, array $matches): int
    {
        $NbreMachsPerdus = 0;
        foreach ($matches as $mach) {
            $NbreMachsPerdus = ($this->goalForCountDuringAMatch( $teamId, $mach)-$this->goalAgainstCountDuringAMatch( $teamId, $mach)<0) ? ($NbreMachsPerdus+=1) : $NbreMachsPerdus;     
        }
        return $NbreMachsPerdus;  
    }

    function drawMatchCount(int $teamId, array $matches): int
    {
        $nbre = 0;
        foreach ($matches as $mach) {
            $nbre = (($mach['team0']==$teamId || $mach['team1']==$teamId ) && ($this->goalForCountDuringAMatch( $teamId, $mach)==$this->goalAgainstCountDuringAMatch( $teamId, $mach))) ? ($nbre+=1) : $nbre;     
        }
        return $nbre;  
    }

    /////// Creation des tableaux

    function rankingRow(int $teamId, array $matches): array
    {

        return [
            'team_id'            => $teamId,
            'match_played_count' =>$this->wonMatchCount($teamId,$matches) + $this->lostMatchCount($teamId,$matches) + $this->drawMatchCount($teamId,$matches),
            'won_match_count'    => $this->wonMatchCount($teamId,$matches),
            'lost_match_count'   => $this->lostMatchCount($teamId,$matches),
            'draw_match_count'   => $this->drawMatchCount($teamId,$matches),
            'goal_for_count'     => $this->goalForCount($teamId,$matches),
            'goal_against_count' => $this->goalAgainstCount($teamId,$matches),
            'goal_difference'    => $this->goalDifference($this->goalForCount($teamId,$matches),$this->goalAgainstCount($teamId,$matches)),
            'points'             => $this->points( $this->wonMatchCount($teamId,$matches),$this->drawMatchCount($teamId,$matches))
        ];
    }

    function unsortedRanking(array $teams, array $matches): array
    {
        $result=[];

        foreach( $teams as $team){
            $result[] = $this->rankingRow($team['id'],$matches);
        }
        return $result;
    }

    static function compareRankingRow(array $row1, array $row2): int
    {
        
        return ( $row1['points']>$row2['points'] ) ? -1 : ( ($row1['points']<$row2['points'] ) ? 1 :
         (( $row1['goal_difference'] > $row2['goal_difference']) ? -1 :
             (( $row1['goal_difference'] < $row2['goal_difference']) ? 1 : 
                ( $row1['goal_for_count'] > $row2['goal_for_count'] ? -1 :
                     (( $row1['goal_for_count'] < $row2['goal_for_count'] )? 1 :0)) ) ) ) ;
        
    }

    function sortedRanking(array $teams, array $matches): array
    {
        $result = $this->unsortedRanking($teams, $matches);
        usort($result, ['App\Repositories\Ranking', 'compareRankingRow']);

        for ($rank = 1; $rank <= count($teams); $rank++) {
            $result[$rank - 1]['rank']=$rank ;
        }
        return $result;
    }

}