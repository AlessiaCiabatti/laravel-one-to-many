@extends('layouts.admin')

@section('content')
    <h1 class="mb-4">List technologies</h1>

    <table class="table crud-table">
        <thead>
            <tr>
                <th scope="col">Technology</th>
                <th class="second_th" scope="col">Projects</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
                <tr>
                    <td class="last_td w-25">
                        {{ $technology->name }}
                    </td>
                    <td>
                        <ul class="list-group">
                            @foreach ($technology->projects as $projects)
                            <li class="list-group-item">
                                <a href="{{ route('admin.projects.show', $projects) }}">
                                    {{ $projects->id }} - {{ $projects->title }}
                                </a>
                            </li>
                            @endforeach
                          </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
