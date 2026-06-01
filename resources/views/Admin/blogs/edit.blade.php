@extends('Admin.templates.edit')

@section('form_content')
    @include('Admin.blogs.form', ['blog' => $project])
@endsection
