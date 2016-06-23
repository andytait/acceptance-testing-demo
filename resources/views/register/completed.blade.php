@extends('layouts.app')

@section('title', 'Registration Complete')

@section('content')
    <h1>{{ trans('form.completed.title') }}</h1>
    <hr>

    <p class="lead">
        {{ trans('form.completed.confirmation') }}
    </p>
@endsection