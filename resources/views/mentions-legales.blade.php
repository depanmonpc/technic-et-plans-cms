@extends('layouts.app')

@section('title', 'Mentions légales - Technic & Plans')
@section('meta_description', "Page de test pour vérifier le chargement du CSS sur la page Mentions légales.")

@section('content')
    <div class="mentions-legales" style="padding: 30px; text-align: center;">
        <h1>TEST CSS MENTIONS LÉGALES</h1>
        <p>
            Si le CSS est bien chargé, ce texte devrait être **rouge**.
        </p>
        <div class="test-css">Ceci est un test de style.</div>
    </div>
@endsection

@push('styles')
    <style>
        .test-css {
            color: red;
            font-size: 24px;
            font-weight: bold;
            padding: 15px;
            border: 2px solid red;
        }
    </style>
@endpush
