@extends('layouts.layout')

@section('content')
<a class = "boutonDashboard" href = "/dashboard"><input type="button" value="Dashboard"></a>

<div class = padding-top>
<form action = '/entreprise/updatechoice'>
    <label>Enter company ID to edit :</label>
    <input type="number" id="id" name="id">
</form>
</div>

@endsection