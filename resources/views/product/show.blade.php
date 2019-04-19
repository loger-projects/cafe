@extends('layouts.master')

@section('content')
    <product-show></product-show>
@endsection

@section('js')
    <script src="{{ asset('/js/ProductShow.js') }}"></script>
@endsection