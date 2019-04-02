@extends('layouts.master')

@section('content')
    <user-password-email></user-password-email>
@endsection

@section('js')
    <script src="{{ asset('/js/UserPasswordEmail.js') }}"></script>
@endsection