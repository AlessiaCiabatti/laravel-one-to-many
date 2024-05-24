@extends('layouts.admin')

@section('content')
    <h1>There are {{ $count_project }} projects</h1>

    <div class="mt-4">
        <h2>{{ $last_project->title }}</h2>
        <p>{{ $last_project->text }}</p>
    </div>
@endsection
