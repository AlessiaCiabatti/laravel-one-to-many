@php
    use App\Function\Helper;
@endphp


@extends('layouts.admin')

@section('content')
    <h1>New Project</h1>

    <form class="w-50" action="{{ route('admin.projects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title (*)</label>
            <input class="form-control" id="title" type="text" placeholder="Title" name="title">
        </div>

        <div class="mb-3">
            <label for="reading_time" class="form-label">Reading time</label>
            <input class="form-control" id="reading_time" type="number" placeholder="Reading time" name="reading_time">
        </div>

        <div class="mb-3">
            <label for="reading_time" class="form-label">Description (*)</label>
            <textarea class="form-control me-2" name="text"></textarea>
        </div>

        <div class="mb-3">
            <button class="btn btn-outline-success" type="submit">Send</button>
            <button class="btn my_bgr">Reset</button>
        </div>
    </form>
@endsection
