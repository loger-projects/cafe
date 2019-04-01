@extends('layouts.master')

@section('content')
    <user-home></user-home>
@endsection

@section('js')
    <script src="{{ asset('/js/UserHome.js') }}"></script>
@endsection