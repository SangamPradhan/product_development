@extends('Admin.templates.edit')

@section('form_content')
    @include('Admin.services.form', ['service' => $project])
@endsection
