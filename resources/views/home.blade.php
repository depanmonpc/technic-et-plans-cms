@extends('layouts.app')

@section('content')

{{-- Header + contenu existant --}}
@include('partials.header')

{{-- Modules dynamiques récupérés depuis GuestLayoutManagment --}}
@if(!empty($contents))
    @foreach($contents as $content)
        {!! $content['content'] !!}
    @endforeach
@endif

{{-- Bloc derniers articles --}}
@include('partials.latest-articles', ['articles' => $articles])

{{-- Footer --}}
@include('partials.footer')

@endsection
