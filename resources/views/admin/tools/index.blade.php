@extends('sentinel.layouts.default')
@section('title')
    @parent
   Tools/Technieken
@stop

{{-- Content --}}
@section('content')
    <link rel="stylesheet" href="{{ asset('css/killbutton.css') }}">
    <div class="row">
        <div class='page-header'>
            <div class='btn-toolbar pull-right'>
                <div class='btn-group'>
                    <a class='btn btn-primary' href="{{ route('tools.create') }}">New Tool/Techniek</a>
                </div>
            </div>
            <h1> Tools/Technieken</h1>
        </div>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <th>Tools/Technieken</th>
                <th>Versie</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>
                <tbody>
                    @foreach($tools as $tool)
                    <tr>
                        <td>{{$tool['name']}}</td>
                        <td>{{$tool['version']}}</td>
                        <td>
                            {!! Form::open(['url'=>'/tools/'.$tool['id'].'/edit']) !!}
                            <button class="btn btn-default">Edit</button>
                            {!! Form::close() !!}
                        </td>
                        <td>
                            {!! Form::open(['url'=>'/tools/'.$tool['id'],'method'=>"DELETE"]) !!}
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
