@extends('sentinel.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Update Bedrijf
@stop

{{-- Content --}}
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
<div class="row">
    <div class="col-md-4 col-md-offset-4">

            {!!Form::open(['url'=>'/bedrijven/'.$bedrijf[0]['id'], 'method'=>'PUT'])!!}

            <h2>Bedrijf</h2>

            <div class="form-group {{ ($errors->has('bedrijfsnaam')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="Tool/Techniek" name="bedrijfsnaam" type="text"  value="{{ ($errors->has('bedrijfsnaam')) ? Input::old('bedrijfsnaam') : $bedrijf[0]['name'] }}">
                {{ ($errors->has('bedrijfsnaam') ? $errors->first('bedrijfsnaam') : '') }}
            </div>

             <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="E-mail" name="email" type="text"  value="{{ ($errors->has('bedrijfsnaam')) ? Input::old('bedrijfsnaam') : $bedrijf[0]['email'] }}">
                {{ ($errors->has('email') ? $errors->first('email') : '') }}
            </div>
            <div class="form-group {{ ($errors->has('bedrijfsinfo')) ? 'has-error' : '' }}">
               <textarea name='bedrijfsinfo' placehoder='Bedrijfs Info'> {{$bedrijf[0]['disc']}} </textarea>
                {{ ($errors->has('bedrijfsinfo') ?  $errors->first('bedrijfsinfo') : '') }}
            </div>
            <div class="form-group {{ ($errors->has('tool')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="Tools/Technieken" name="tool"  type="text" id='tool' value="{{$tools}}">
                {{ ($errors->has('tool') ?  $errors->first('tool') : '') }}
            </div>
                <select multiple class="form-control" id='result'>

                </select>
            <div class="form-group">
            </div>

            
            <input class="btn btn-primary" value="Update" type="submit">
            {!!Form::Close()!!}
        
    </div>
</div>

<script src="/js/main.js"></script>
@stop