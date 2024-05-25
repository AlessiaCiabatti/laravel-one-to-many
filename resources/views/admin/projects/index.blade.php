@php
    use App\Function\Helper;
@endphp


@extends('layouts.admin')

@section('content')
    <h1 class="my-4">Projects List</h1>

    @if (session('delete'))
        <div class="w-50 alert alert-success" role="alert">
            {{ session('delete') }}
        </div>
    @endif

    <table class="table crud-table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
                <th scope="col">Image</th>
                <th class="second_th-pro" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <td class="project">{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ Helper::formatDate($project->updated_at) }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $project->image) }}" class="thumb-index"
                            onerror="this.src='/img/no-image.jpg'">
                    </td>
                    <td>
                        <div class="d-flex mx-4">
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn my_bgy me-2"><i
                                    class="fa-solid fa-glasses"></i></a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn my_bgy me-2"><i
                                    class="fa-solid fa-pencil"></i></a>
                            @include('admin.partials.delete-form', [
                                'route' => route('admin.projects.destroy', $project->id),
                                'message' => 'Are you sure to delete this project?',
                            ])
                        </div>
                    </td>
                </tr>

            @empty
            @endforelse

        </tbody>
    </table>

    {{ $projects->links('pagination::bootstrap-5') }}
@endsection
