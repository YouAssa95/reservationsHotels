@extends('base')


@section('title')
    Matchs de l'équipe
@endsection

@section('content')

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>N°</th>
                <th>Équipe</th>
                <th>MJ</th>
                <th>G</th>
                <th>N</th>
                <th>P</th>
                <th>BP</th>
                <th>BC</th>
                <th>DB</th>
                <th>PTS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $classementTeam['rank'] }}</td>
                <td>{{$classementTeam['name']}}</td>
                <td>{{ $classementTeam['match_played_count'] }}</td>
                <td>{{ $classementTeam['won_match_count'] }}</td>
                <td>{{ $classementTeam['draw_match_count'] }}</td>
                <td>{{ $classementTeam['lost_match_count'] }}</td>
                <td>{{ $classementTeam['goal_for_count'] }}</td>
                <td>{{ $classementTeam['goal_against_count'] }}</td>
                <td>{{ $classementTeam['goal_difference'] }}</td>
                <td>{{ $classementTeam['points'] }}</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-striped">
        <thead class="thead-dark">

            @foreach ($matchesJoues as $row)
            <tr>
                <td>{{ $row['date']  }}</td>
                <td><a href="{{route('teams.show', ['teamId'=>$row['id']])}}">{{ $row['name0'] }} </a></td>
                <td>{{ $row['score0'] }} - {{ $row['score1'] }}  </td>
                <td><a href="{{route('teams.show', ['teamId'=>$row['id']])}}">{{ $row['name1'] }} </a></td>
            </tr>
            @endforeach
        </thead>
    </table>
@endsection