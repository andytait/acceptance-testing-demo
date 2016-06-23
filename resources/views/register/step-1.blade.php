@extends('layouts.app')

@section('title', 'Register Step One')

@section('content')
    <h1>Register Step One</h1>
    <hr>

    {{ Form::open(['route' => 'register.step-one.post']) }}
        @include('shared.form-group-select', ['name' => 'title', 'label' => 'Title', 'list' => ['Mr', 'Mrs', 'Miss', 'Ms']])
        @include('shared.form-group-input', ['name' => 'first_name', 'label' => 'First Name'])
        @include('shared.form-group-input', ['name' => 'last_name', 'label' => 'Last Name'])
        @include('shared.form-group-input', ['name' => 'email', 'label' => 'Email Address'])
        <button type="submit" class="btn btn-info">
            {{ trans('form.buttons.next') }}
        </button>
    {{ Form::close() }}
@endsection