@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <div class="container py-2">
        <h3>Add a new Project</h3>
        @include('partials.errors')
        <form action="{{route('admin.projects.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title here" aria-describedby="titleHelpId" value="{{old('title')}}">
                <small id="titleHelpId" class="text-muted">Add project title here, max 100 characters.</small>
            </div>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="cover_image" class="form-label">Image</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror" placeholder="cover image here" aria-describedby="imageHelpId" value="{{old('cover_image')}}">
                <small id="imageHelpId" class="text-muted">Add project image here</small>
            </div>
            @error('cover_image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="type_id" class="form-label">Types</label>
                <select class="form-select w-25 @error('type_id') 'is-invalid' @enderror" name="type_id" id="type_id">
                    <option selected>Select one</option>

                    @foreach ($types as $type )
                    <option value="{{$type->id}}" {{ old('type_id') ? 'selected' : '' }}>{{$type->name}}</option>
                    @endforeach

                </select>
            </div>
            @error('type_id')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror

            <div class="mb-3">
                <label for="technologies" class="form-label">Technologies</label>
                <select name="technologies[]" id="technologies" class="form-select w-25" size="3" aria-describedby="technologiesHelpId">
                    <option value="" disabled>Select Technology</option>
                    @forelse($technologies as $technology)
                    @if($errors->any())
                    <option value="{{$technology->id}} {{in_array($technology->id, old('technologies', []))}}">{{$technology->name}}</option>                        
                    @else
                    <option value="{{$technology->id}}">{{$technology->name}}</option>
                    @endif
                    @empty
                    <option value="" disabled>No technologies</option>  
                    @endforelse
                </select>
                <small id="technologiesHelpId" class="text-muted">Press Ctrl+C for deselect.</small>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description here" aria-describedby="descriptionHelpId" value="{{old('description')}}">
                <small id="descriptionHelpId" class="text-muted">Add project description here, min 20 characters.</small>
            </div>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-outline-primary my-3"><i class="fas fa-plus    "></i></button>
        </form>
    </div>

</div>
@endsection