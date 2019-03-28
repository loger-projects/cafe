@extends('layouts.master')

@section('content')
    <post-index></post-index>
@endsection

@section('js')
    <script src="{{ asset('/js/PostIndex.js') }}"></script>
@endsection