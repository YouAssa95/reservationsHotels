@extends('base')
@section('head')
<link href="{{assert('css/style1.css')}}" rel="stylesheet" type="text/css" />
<link href="{{assert('css/style2.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('title')
    Classement
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
                @foreach ($ranking as $row)
                <tr>
                    <td>{{ $row['rank'] }}</td>
                    <td><a href="{{route('teams.show', ['teamId'=>$row['team_id']])}}">{{ $row['name']}}</a></td>
                    <td>{{ $row['match_played_count'] }}</td>
                    <td>{{ $row['won_match_count'] }}</td>
                    <td>{{ $row['draw_match_count'] }}</td>
                    <td>{{ $row['lost_match_count'] }}</td>
                    <td>{{ $row['goal_for_count'] }}</td>
                    <td>{{ $row['goal_against_count'] }}</td>
                    <td>{{ $row['goal_difference'] }}</td>
                    <td>{{ $row['points'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection