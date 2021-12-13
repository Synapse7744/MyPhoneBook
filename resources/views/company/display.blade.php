@extends('layouts.layout')

@section('content')
<a class = "boutonDashboard" href = "/dashboard"><input type="button" value="Dashboard"></a>

<div class = center>
<?php 
foreach ($company as $comp){?>
<p>Nom de l'entreprise : {{$comp->nom}}</p><br>
<p>Adresse de l'entreprise : {{$comp->rue}}</p><br>
<p>Code postal de l'entreprise : {{$comp->cPostal}}</p><br>
<p>Ville de l'entreprise : {{$comp->ville}}</p><br>
<p>Numéro de télephone de l'entreprise : {{$comp->tel}}</p><br>
<p>Email de l'entreprise : {{$comp->email}}</p><br>
<?php }?>
</div>

@endsection