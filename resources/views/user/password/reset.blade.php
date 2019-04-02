@extends('layouts.master')

@section('content')
    <user-password-reset></user-password-reset>
@endsection

@section('js')
    <script>
        var token = "{!! $token !!}"
    </script>
    <script src="{{ asset('/js/UserPasswordReset.js') }}"></script>
@endsection