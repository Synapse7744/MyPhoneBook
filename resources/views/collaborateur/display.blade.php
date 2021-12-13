@extends('layouts.layout')

@section('content')
<a class = "boutonDashboard" href = "/dashboard"><input type="button" value="Dashboard"></a>

<div class = center>

    <?php 
    foreach ($collaborator as $collab){?>
    <p class = para>Nom du collaborateur : {{$collab->nom}}</p>
    <p class = para>Prénom du collaborateur : {{$collab->prenom}}</p>
    <p class = para>Code postal du collaborateur : {{$collab->cPostal}}</p>
    <p class = para>Ville du collaborateur : {{$collab->ville}}</p>
    <p class = para>Numéro du collaborateur : {{$collab->tel}}</p>
    <p class = para>Email du collaborateur : {{$collab->email}}</p>
    <?php $comp = DB::table('company')->where('id', $collab->companyId)->pluck('nom')->first();?>
    <p class = para>Entreprise du collaborateur : {{$comp}}</p>
    <?php } ?>
</div>

@endsection