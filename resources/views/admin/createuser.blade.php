@extends('sentinel.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
New Bedrijf
@stop

{{-- Content --}}
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <form method="POST" action="/bedrijven" accept-charset="UTF-8">

            <h2>Create New User</h2>

            <div class="form-group {{ ($errors->has('bedrijfsnaam')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="Bedrijfs Naam" name="bedrijfsnaam" type="text"  value="{{ Input::old('bedrijfsnaam') }}">
                {{ ($errors->has('bedrijfsnaam') ? $errors->first('bedrijfsnaam') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="E-mail" name="email" type="text"  value="{{ Input::old('email') }}">
                {{ ($errors->has('email') ? $errors->first('email') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('bedrijfsinfo')) ? 'has-error' : '' }}">
               <textarea name='bedrijfsinfo' placehoder='Bedrijfs Info'></textarea>
                {{ ($errors->has('bedrijfsinfo') ?  $errors->first('bedrijfsinfo') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('tool')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="Tools/Technieken" name="tool"  type="text" id='tool'>
                {{ ($errors->has('tool') ?  $errors->first('tool') : '') }}
            </div>
                <select multiple class="form-control" id='result'>

                </select>
            <div class="form-group">
            </div>

            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input class="btn btn-primary" value="Create" type="submit">

        </form>
    </div>
</div>
<script src="/js/main.js"></script>


@stop