@extends('layouts.master')

@section('content')
    <user-register></user-register>
@endsection

@section('js')
    <script src="{{ asset('/js/UserRegister.js') }}"></script>
@endsection