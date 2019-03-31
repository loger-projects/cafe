@extends('layouts.master')

@section('content')
    <user-login></user-login>
@endsection

@section('js')
    <script src="{{ asset('/js/UserLogin.js') }}"></script>
@endsection