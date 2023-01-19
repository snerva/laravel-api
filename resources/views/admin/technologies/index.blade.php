@extends('layouts.admin')

@section('content')
<div class="heading p-4">
    <h2>Technologies</h2>
</div>

@include('partials.message')

<div class="container-fluid">
    <div class="row">
        <div class="col pe-5">
            <form action="{{route('admin.technologies.store')}}" method="post"  enctype="multipart/form-data">
              @csrf
              <div class="input-group mb-3">
                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Techs here" aria-label="Techs name" aria-describedby="button-addon">
                <button class="btn btn-outline-primary" type="button" id="button-addon">Add</button>
              </div>
            </form>
            
        </div>

        <div class="col">
            <div class="table-responsive-md ">
                <table class="table table-striped table-primary align-middle table-hover table-borderless">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse($technologies as $technology)
                        <tr class="table-light">
                            <td scope="row">{{$technology->id}}</td>
                            <td>
                                <form action="{{route('admin.technologies.update', $technology->slug)}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" name="name" id="name" class="form-control" value="{{$technology->name}}">
                                    <small>Press enter to update the technology name</small>
                                </form>
                            </td>
                            <td>{{$technology->slug}}</td>
                            <td><span class="badge bg-secondary">{{count($technology->projects)}}</span></td>
                            <td>
                                <form action="{{route('admin.technologies.destroy', $technology->slug)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash fa-sm fa-fw"></i></button>
                                </form>
                            </td>
                           
                        </tr>
                        @empty
                        <tr class="table-primary">
                            <td scope="row">No types to show yet</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection