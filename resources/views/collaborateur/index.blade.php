@extends('layouts.layout')

@section('content')

<a class = "boutonDashboard" href = "/dashboard"><input type="button" value="Dashboard"></a>

<h1 class = center>RECHERCHE DE COLLABORATEUR</h1><br>
<form action="{{ route('collseek') }}">
<div class = center>
<label for="findNom">Par nom : </label><br>
<input type="text" id="findNom" name="findNom"size="10"><br><br>

<label for="findNom">Par prénom : </label><br>
<input type="text" id="findPrenom" name="findPrenom"size="10"><br><br>

<label for="findPhone">Par numéro de téléphone : </label><br>
<input type="text" id="findPhone" name="findPhone"size="10"><br><br>

<label for="findEmail">Par email : </label><br>
<input type="text" id="findEmail" name="findEmail"size="10"><br><br>

<label for="findCompany">Par nom de l'entreprise : </label><br>
<input type="text" id="findCompany" name="findCompany"size="10"><br><br>

<label for="findCompanyID">Par ID de l'entreprise : </label><br>
<input type="text" id="findCompanyID" name="findCompanyID"size="10"><br><br>

<input type="submit" value="Rechercher">
</div>
</form><br>

<?php
$min = ($index - 1) * 10;
$max = $index * 10;
foreach ($collaborator as $col)
{
    if ($col->id < $min + 1) {continue;}
    if ($col->id > $max) {break;}
?><div class = tableCenter>
    <table>
    <thead>
        <tr>
            <th>COLLABORATEUR {{$col->id}}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nom : </td>
            <td>{{$col->nom}}</td>
        </tr>
        <tr>
            <td>Prenom : </td>
            <td>{{$col->prenom}}</td>
        </tr>
        <tr>
            <td>Telephone : </td>
            <td>{{$col->tel}}</td>
        </tr>
        <tr>
            <td>Email : </td>
            <td>{{$col->email}}</td>
        </tr>
        <tr>
            <td>Nom Entreprise : </td>
            <td>{{DB::table('company')->select('nom')->where('id', $col->companyId)->value('nom')}}</td>
        </tr>
        <tr>
            <td>ID Entreprise : </td>
            <td>{{$col->companyId}}</td>
        </tr>
    </tbody>
</table></div><br><br><br>
<?php
}
$index++;
?>
<a class = linkEnd class = lienNext href="<?php echo "/collaborateur/index/$index";?>">==> NEXT PAGE</a>
</button>
</div>

@endsection