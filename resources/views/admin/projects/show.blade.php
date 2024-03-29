@extends('layouts.app')
@section('content')
    <section class="container my-4">
        <h1 class="text-danger">{{ $project->title }}</h1>
        <div class="card w-50 bg-dark text-white border-white mt-5">
            <img src="{{asset('storage/' . $project->img) }}" class="card-img-top" alt="{{ $project->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $project->title }}</h5>
                <p class="card-text">{{ $project->body }}</p>

                <p>Project category : </p>
                <p class="text-danger">{{$project->category ? $project->category->name : 'Uncategorized'}}</p>
                

                <p>Project technologies : </p>
                @forelse($project->technologies as $technology)
                    <p>{{ $technology->name }} <i class="{{ $technology->icon }}"></i></p>
                    @empty
                    <p class="text-danger">No technologies</p>
                @endforelse

                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-danger">Edit</a>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-danger">Back</a>
            </div>
        </div>
    </section>
@endsection