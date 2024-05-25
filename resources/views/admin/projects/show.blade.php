@php
    use App\Function\Helper;
@endphp


@extends('layouts.admin')

@section('content')
    <h1>{{ $project->title }} - {{ Helper::formatDate($project->updated_at) }}</h1>

    <div class="mt-4">
        <p>Time reading: {{ $project->reading_time }} mins.</p>
        <img class="mt-3 mb-3 img-fluid" src="{{ asset('storage/'. $project->image) }}" alt="{{ $project->tutle }}"
        onerror="this.src = '/img/no-image.jpg'"
        >
        <p>{{ $project->image_original_name }}</p>
        <p>{{ $project->text }}</p>
    </div>
@endsection
