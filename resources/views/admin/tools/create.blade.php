@extends('sentinel.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
New Tool/Techniek
@stop

{{-- Content --}}
@section('content')

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <form method="POST" action="/tools" accept-charset="UTF-8">

            <h2>Create New User</h2>

            <div class="form-group {{ ($errors->has('tool')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="Tool/Techniek" name="tool" type="text"  value="{{ Input::old('tool') }}">
                {{ ($errors->has('tool') ? $errors->first('tool') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('version')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="Versie" name="version" type="text"  value="{{ Input::old('version') }}">
                {{ ($errors->has('version') ? $errors->first('version') : '') }}
            </div>


            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input class="btn btn-primary" value="Create" type="submit">

        </form>
    </div>
</div>


@stop