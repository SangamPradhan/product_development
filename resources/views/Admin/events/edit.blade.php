@extends('Admin.templates.edit')

@section('form_content')
    @include('Admin.events.form', ['event' => $project])
@endsection
