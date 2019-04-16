@extends('layouts.master')

@section('content')
    <product-index></product-index>
@endsection

@section('js')
    <script src="{{ asset('/js/ProductIndex.js') }}"></script>
@endsection