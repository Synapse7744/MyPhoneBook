@extends('layouts.layout')

@section('content')
<a class = "boutonDashboard" href = "/dashboard"><input type="button" value="Dashboard"></a>

<div class = padding-top>

<form action = '/collaborateur/updatechoice'>
    <label>Enter collaborateur ID to edit :</label>
    <input type="number" id="id" name="id">
</form>

</div>

@endsection