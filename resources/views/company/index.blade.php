@extends('layouts.layout')

@section('content')
<a class = "boutonDashboard" href = "/dashboard"><input type="button" value="Dashboard"></a>

<h1 class = center>INDEX DES ENTREPRISES</h1><br>
<form action="{{ route('compseek') }}">
<div class = center>
<label for="findNom">Recherche par nom : </label><br>
<input type="text" id="findNom" name="findNom"size="10"><br><br>

<label for="findEmail">Recherche par email : </label><br>
<input type="text" id="findEmail" name="findEmail"size="10"><br><br>

<label for="findAdresse">Recherche par ville : </label><br>
<input type="text" id="findAdresse" name="findAdresse"size="10"><br><br>

<input type="submit" value="Rechercher">
</div>
</form><br>
<?php
$min = ($index - 1) * 10;
$max = $index * 10;
foreach ($company as $comp)
{
    if ($comp->id < $min + 1) {continue;}
    if ($comp->id > $max) {break;}
?><div class = tableCenter>
    <table>
    <thead>
        <tr>
            <th>COMPANY {{$comp->id}}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nom : </td>
            <td>{{$comp->nom}}</td>
        </tr>
        <tr>
            <td>Telephone : </td>
            <td>{{$comp->tel}}</td>
        </tr>
        <tr>
            <td>Email : </td>
            <td>{{$comp->email}}</td>
        </tr>
        <tr>
            <td>Code postal : </td>
            <td>{{$comp->cPostal}}</td>
        </tr>
    </tbody>
</table></div><br><br><br>
<?php
}
$index++;
?>

<a class = linkEnd href="<?php echo "/entreprise/index/$index";?>">==> NEXT PAGE</a>

@endsection