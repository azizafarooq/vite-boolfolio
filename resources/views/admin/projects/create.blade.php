@extends('layouts.app')

@section('title', 'Create Project')

@section('content')
    <section>
        <div class="container my-4">
            <a href="{{ route('admin.projects.index') }}" class="mb-3 btn btn-primary"><i
                    class="fa-solid fa-list-check me-2"></i>See all Projects</a>
            <h1 class="mb-3">Create Project</h1>
            <form action="{{ route('admin.projects.store') }}" class="row g-3" method="project">
                @csrf
                <div class="col-12">
                    <label class="form-label" for="image">Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <div class="col-12">
                    <label class="form-label" for="title">Project Name</label>
                    <input class="form-control" type="text" id="title" name="title">
                </div>
                <div class="col-12">
                    <label class="form-label" for="description">Description</label>
                    <textarea class="form-control" type="text" id="description" name="description"> </textarea>
                </div>

                <div class="col-12">
                    <label class="form-label" for="type_id">Type</label>
                    <select class="form-select" name="type_id" id="type_id">
                        <option value="">Select Type</option>
                        <!-- UNDEFINED TYPES
                                    foreach ($types as $type)
                                        <option value="{ $type->id }">{ $type->label }</option>
                                    endforeach -->
                    </select>
                </div>

                <label class="form-label">Technologies</label>

                <div class="form-check @error('technologies') is-invalid @enderror p-0">
                    @foreach ($technologies as $technology)
                        <input type="checkbox" id="technology-{{ $technology->id }}" value="{{ $technology->id }}"
                            name="technologies[]" class="form-check-control"
                            @if (in_array($technology->id, old('technologies', $project_technologies ?? []))) checked @endif>
                        <label for="technology-{{ $technology->id }}">
                            {{ $technology->label }}
                        </label>
                        <br>
                    @endforeach
                </div>



                <div class="col-12">
                    <label class="form-label" for="git-link">Git Link</label>
                    <input class="form-control" type="text" id="git-link" name="git-link"> </input>
                </div>

                <div class="col-12 my-4">
                    <button class="btn btn-success">
                        <i class="fa-solid fa-floppy-disk me-2"></i> Save
                    </button>
                </div>

            </form>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
