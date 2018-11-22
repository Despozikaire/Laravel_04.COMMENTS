@extends('layouts.app')

@section('content')
<div class="container">


    <div class="col-sm-8 col-sm-offset-2">
        @if(!isset($post))
            <h1>Création d'un post</h1>
        @else
        <h1>Modification de post</h1>
        @endif
    </div>
    <div class="col-sm-12">
        @include('admin.forms.post')
    </div>

</div>
@endsection
