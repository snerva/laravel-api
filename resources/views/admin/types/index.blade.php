@extends('layouts.admin')

@section('content')
<div class="heading p-4">
    <h2>Types</h2>
</div>

@include('partials.message')

<div class="container-fluid">
    <div class="row">
        <div class="col pe-5">
            <form action="{{route('admin.types.store')}}" method="post"  enctype="multipart/form-data">
              @csrf
              <div class="input-group mb-3">
                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Types here" aria-label="Types name" aria-describedby="button-addon">
                <button class="btn btn-outline-light" type="button" id="button-addon">Add</button>
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
                        @forelse($types as $type)
                        <tr class="table-light">
                            <td scope="row">{{$type->id}}</td>
                            <td>
                                <form action="{{route('admin.types.update', $type->slug)}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" name="name" id="name" class="form-control" value="{{$type->name}}">
                                    <small>Press enter to update the type name</small>
                                </form>
                            </td>
                            <td>{{$type->slug}}</td>
                            <td><span class="badge bg-secondary">{{count($type->projects)}}</span></td>
                            <td>
                                <form action="{{route('admin.types.destroy', $type->slug)}}" method="post">
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