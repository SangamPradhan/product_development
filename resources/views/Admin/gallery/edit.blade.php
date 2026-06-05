@extends('Admin.templates.edit')

@section('form_content')
    @include('Admin.gallery.form', ['item' => $project])
@endsection
