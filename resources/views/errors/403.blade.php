@extends('master')

@section('content')

    <h1>Na úkon nie ste autorizovaný</h1>
    <p>Chyba 403 {{ $exception->getMessage() }} </p>

    @endsection