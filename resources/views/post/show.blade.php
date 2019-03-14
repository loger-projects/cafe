@extends('layouts.master')

@section('content')
    <post-show post="{{ $post }}"></post-show>
@endsection

@section('js')
    <script src="{{ asset('/js/PostShow.js') }}"></script>
@endsection