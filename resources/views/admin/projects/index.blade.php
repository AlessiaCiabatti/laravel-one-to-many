@php
    use App\Function\Helper;
@endphp


@extends('layouts.admin')

@section('content')
    <h1>Projects List</h1>

    <table class="table crud-table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
                <th class="second_th" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <td class="project">{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ Helper::formatDate($project->updated_at) }}</td>
                    <td class="last_td">BOTTONI</td>
                </tr>

            @empty
            @endforelse

        </tbody>
    </table>

{{ $projects->links('pagination::bootstrap-5') }}
@endsection
