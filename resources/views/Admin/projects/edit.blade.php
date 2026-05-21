@extends('Admin.templates.edit', ['item' => $project])

@section('form_content')
    @include('Admin.projects.form', ['item' => $project])
@endsection
