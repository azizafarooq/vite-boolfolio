@extends('layouts.app')

@section('title', 'Show Project')

@section('content')
    <section>
        <div class="container my-4">
            <a href="{{ route('admin.projects.index') }}" class="mb-3 btn btn-primary"><i
                    class="fa-solid fa-list-check me-2"></i>See all Projects</a>
            <div class="card my-3">
                <img src="{{ $project->path_img }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    @if (!empty($project->image))
                        <img src="{{ asset('storage/' . $project->image) }}" alt="">
                    @endif
                    <p class="card-text">{{ $project->description }}</p>
                    <!-- <p class="card-text"> $project->type->label }</p> -->
                    <p>Technologies:
                        @forelse ($project->technologies as $technology)
                            {{ $technology->label }} @unless ($loop->last)
                                ,
                            @else
                                .
                            @endunless
                        @empty
                            No technology associated
                        @endforelse
                    </p>

                    <a class="card-text"><small class="text-body-secondary">{{ $project->url }}</small></a>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
