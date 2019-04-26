@extends('layouts.master')

@section('content')
    <site-page-cart></site-page-cart>
@endsection

@section('js')
    <script src="{{ asset('/js/SitePageCart.js') }}"></script>
@endsection