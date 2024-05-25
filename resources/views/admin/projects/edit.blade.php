@php
    use App\Function\Helper;
@endphp


@extends('layouts.admin')

@section('content')
    <h1 class="my-4">Edit of {{ $project->title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="w-50" action="{{ route('admin.projects.update', $project) }}" method="POST"
    enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title (*)</label>
            <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" placeholder="Title" name="title" value="{{ old('title', $project->title) }}">
            @error('title')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="reading_time" class="form-label">Reading time</label>
            <input class="form-control" id="reading_time" type="number" placeholder="Reading time" name="reading_time" value="{{ old('reading_time', $project->reading_time) }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" id="image" type="file" name="image"
            onchange="showImage(event)">
            <img src="{{ asset('storage/' . $project->image) }}" class="thumb" onerror="this.src='/img/no-image.jpg'">
            <p>{{ $project->image_original_name }}</p>
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Description (*)</label>
            <textarea class="form-control me-2 @error('text') is-invalid @enderror" name="text"> {{  old('text', $project->text) }}</textarea>
            @error('text')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <button class="btn btn-outline-success" type="submit">Send</button>
            <button class="btn my_bgr">Reset</button>
        </div>
    </form>

    <script>
        function showImage(event){
            const thumb = document.getElementById('thumb');
            console.log(thumb);
            thumb.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
