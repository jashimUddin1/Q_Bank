@extends('layouts.app', ['title' => 'প্রশ্ন ব্যাংক ও মডেল টেস্ট সিস্টেম'])

@section('content')

@include('partials.header')

    <div id="app" class="grid lg:grid-cols-[1fr_2fr_2fr] min-h-screen">

        @include('partials.aside')

        @include('partials.sidebar-left')

        @include('partials.toolbar')

        @include('partials.right-sidebar')

        @include('partials.preview-modal')
    </div>

@endsection