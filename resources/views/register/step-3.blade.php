@extends('layouts.app')

@section('title', 'Register Step Three')

@section('content')
    <h1>Register Step Three</h1>
    <hr>

    {{ Form::open(['route' => 'register.step-three.post']) }}
        @include('shared.form-group-input', ['name' => 'password', 'label' => 'Password'])
        @include('shared.form-group-input', ['name' => 'confirm_password', 'label' => 'Confirm Password'])
        @if (localization()->getCurrentLocale() == 'en')
            @include('shared.form-group-input', ['name' => 'vat_number', 'label' => 'VAT Number'])
        @endif
        <button type="submit" class="btn btn-info">
            {{ trans('form.buttons.next') }}
        </button>
    {{ Form::close() }}
@endsection