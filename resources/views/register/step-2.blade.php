@extends('layouts.app')

@section('title', 'Register Step Two')

@section('content')
    <h1>Register Step Two</h1>
    <hr>

    {{ Form::open(['route' => 'register.step-two.post']) }}
        @include('shared.form-group-input', ['name' => 'address1', 'label' => 'Address 1'])
        @include('shared.form-group-input', ['name' => 'address2', 'label' => 'Address 2'])
        @include('shared.form-group-input', ['name' => 'address3', 'label' => 'Address 3'])
        @include('shared.form-group-input', ['name' => 'city', 'label' => 'City'])
        @include('shared.form-group-input', ['name' => 'region', 'label' => 'Region'])
        @include('shared.form-group-input', ['name' => 'postcode', 'label' => 'Postcode'])
        <button type="submit" class="btn btn-info">
            {{ trans('form.buttons.next') }}
        </button>
    {{ Form::close() }}
@endsection