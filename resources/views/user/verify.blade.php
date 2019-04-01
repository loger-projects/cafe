@extends('layouts.master')

@section('content')
    <user-verify></user-verify>
@endsection

@section('js')
    <script src="{{ asset('/js/UserVerify.js') }}"></script>
@endsection