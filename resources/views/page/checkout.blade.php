@extends('layouts.master')

@section('content')
    <site-page-checkout></site-page-checkout>
@endsection

@section('js')
    <script src="{{ asset('/js/SitePageCheckout.js') }}"></script>
@endsection