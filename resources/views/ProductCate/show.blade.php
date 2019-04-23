@extends('layouts.master')

@section('content')
    <product-cate-show></product-cate-show>
@endsection

@section('js')
    <script src="{{ asset('/js/ProductCateShow.js') }}"></script>
@endsection