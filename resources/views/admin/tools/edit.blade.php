@extends('sentinel.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Update Tool/Techniek
@stop

{{-- Content --}}
@section('content')

<div class="row">
    <div class="col-md-4 col-md-offset-4">
       
            {!!Form::open(['url'=>'/tools/'.$tool['id'], 'method'=>'PUT'])!!}

            <h2>Update Tool/Techniek</h2>

            <div class="form-group {{ ($errors->has('tool')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="Tool/Techniek" name="tool" type="text"  value="{{ ($errors->has('tool')) ? Input::old('tool') : $tool['name'] }}">
                {{ ($errors->has('tool') ? $errors->first('tool') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('version')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="Versie" name="version" type="text"  value="{{ ($errors->has('version')) ? Input::old('version') : $tool['version'] }}">
                {{ ($errors->has('version') ? $errors->first('version') : '') }}
            </div>


            
            <input class="btn btn-primary" value="Update" type="submit">
            {!!Form::Close()!!}
        
    </div>
</div>


@stop