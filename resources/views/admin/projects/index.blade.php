@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <section>
        <div class="container my-4">
            <a href="{{ route('admin.projects.create') }}" class="mb-3 btn btn-primary"><i
                    class="fa-solid fa-plus me-1"></i>Add Project</a>
            <h1 class="mb-3">My Projects</h1>
            <table class="table table-spacing">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Technologies</th>
                        <th>Git Link</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td>{{ $project->path_img }}</td>
                            <td>{{ $project->title }}</td>
                            <td class="text-truncate" style="max-width: 200px;">{{ $project->description }}</td>
                            <td>
                                @if ($project->type)
                                    {{ $project->type->label }}
                                @else
                                    No Type Assigned
                                @endif
                            </td>
                            <td>
                                @forelse($project->technologies as $technology)
                                    {{ $technology->label }} @unless ($loop->last)
                                        ,
                                    @else
                                        .
                                    @endunless
                                @empty
                                    -
                                @endforelse
                            </td>
                            <td class="text-truncate" style="max-width: 150px;">{{ $project->url }}</td>
                            <td>
                                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary py-1">
                                    <i class="fa-solid fa-eye me-1 fa-xs"> </i> </a>

                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-success py-1">
                                    <i class="fa-solid fa-pencil me-1 fa-xs"> </i> </a>

                                <a class="btn btn-danger py-1" data-bs-toggle="modal"
                                    data-bs-target="#delete-post-{{ $project->id }}-modal">
                                    <i class="fa-solid fa-trash me-1 fa-xs"> </i> </a>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%">
                                <i>You have zero projects</i>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $projects->links('pagination::bootstrap-5') }}

        </div>
    </section>
@endsection


@section('modal')
    @foreach ($projects as $project)
        <div class="modal fade" id="delete-post-{{ $project->id }}-modal" tabindex="-1"
            aria-labelledby="delete-post-{{ $project->id }}-modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="delete-post-{{ $project->id }}-modal">Delete Confirmation</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        If you delete this project you won't be able to recover it. Are you sure to delete
                        <strong>{{ $project->title }} </strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
