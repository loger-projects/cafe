@extends('layouts.master')

@section('content')
    <post-cate-show></post-cate-show>
@endsection

@section('js')
    <script src="{{ asset('/js/PostCateShow.js') }}"></script>
@endsection