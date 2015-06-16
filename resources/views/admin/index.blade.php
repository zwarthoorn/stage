@extends('sentinel.layouts.default')
@section('title')
    @parent
   Bedrijven
@stop

{{-- Content --}}
@section('content')
    <div class="row">
        <div class='page-header'>
            <div class='btn-toolbar pull-right'>
                <div class='btn-group'>
                    <a class='btn btn-primary' href="{{ route('bedrijven.create') }}">New Bedrijf</a>
                </div>
            </div>
            <h1>Bedrijven</h1>
        </div>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <th>Bedrijfs naam</th>
                <th>Gemidelt Cijfer</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @foreach($bedrijven as $bedrijf)
                    <tr>
                        <td>{{$bedrijf['name']}}</td>
                        <td>N/A</td>
                        <td>
                            {!! Form::open(['url'=>'/bedrijven/'.$bedrijf['id'].'/edit','method'=>'GET']) !!}
                            <button class="btn btn-default">Edit</button>
                            {!! Form::close() !!}
                        </td>
                        <td>
                            {!! Form::open(['url'=>'/bedrijven/'.$bedrijf['id'],'method'=>"DELETE"]) !!}
                                <button class="btn btn-default action_confirm" href="" data-method="delete">Delete</button>
                            {!! Form::close() !!}
                            
                        </td>
                    </tr>
                    @endforeach
                
                </tbody>
            </table>
        </div>
    </div>
@stop
