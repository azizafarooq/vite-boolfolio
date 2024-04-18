@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
    <section>
        <div class="container my-4">
            <a href="{{ route('admin.projects.index') }}" class="mb-3 btn btn-primary"><i
                    class="fa-solid fa-list-check me-2"></i>See all Projects</a>
            <h1 class="mb-3">Edit <i>{{ $project['title'] }}</i></h1>
            <form action="{{ route('admin.projects.update', $project) }}" class="row g-3" method="POST">
                @method('PATCH')
                @csrf
                <div class="col-12">
                    <label class="form-label" for="img">Image</label>
                    <input class="form-control" type="img" id="img" name=""
                        value="{{ $project['path_img'] }}">
                </div>
                <div class="col-12">
                    <label class="form-label" for="title">Project Name</label>
                    <input class="form-control" type="text" id="title" name="title"
                        value="{{ $project['title'] }}">
                </div>
                <div class="col-12">
                    <label class="form-label" for="description">Description</label>
                    <textarea class="form-control" type="text" id="description" name="description">{{ $project['description'] }}"</textarea>
                </div>

                <div class="col-12">
                    <label class="form-label" for="type_id">Type</label>
                    <select class="form-select" name="type_id" id="type_id">
                        <option value="">Select Type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->label }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label" for="git-link">Git Link</label>
                    <input class="form-control" type="text" id="git-link" name="git-link" value="{{ $project['url'] }}">
                    </input>
                </div>

                <div class="col-12 my-4">
                    <button class="btn btn-success">
                        <i class="fa-solid fa-floppy-disk me-2"></i> Edit
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
