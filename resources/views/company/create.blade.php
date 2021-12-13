@extends('layouts.layout')

@section('content')
<a class = "boutonDashboard" href = "/dashboard"><input type="button" value="Dashboard"></a>

<div class = center>

<form action="/entreprise/store">

    @csrf
        <fieldset> <legend>ADD A COMPANY</legend><br>
    <p> 
        <label for="nom">Company name</label><br />
        <input type="text" id="nom"name="nom" size="20" maxlength="20" placeholder="Complete this field">
    </p><br>
    <p>
        <label for="rue">Rue</label><br />
        <input class="no_border" type="text" id="rue" name="rue" placeholder="Complete this field">
    </p><br>
    <p>
        <label for="cPostal">Code postal</label><br />
        <input class="no_border" type="text" id="cPostal" name="cPostal" placeholder="Complete this field">
    </p><br>
    <p>
        <label for="ville">Ville</label><br />
        <input class="no_border" type="text" id="ville" name="ville" placeholder="Complete this field">
    </p><br>
    <p>
        <label for="numero">Tel</label><br />
        <input class="no_border" type="text" id="numero" name="numero" placeholder="Complete this field">
    </p><br>
    <p>
        <label for="email">Email</label><br />
        <input class="no_border" type="text" id="email" name="email" placeholder="Complete this field">
    </p><br>
    <p>
        <input type="submit" name="envoyer" value="SEND">
    </p>
    </fieldset>   
</form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@endsection