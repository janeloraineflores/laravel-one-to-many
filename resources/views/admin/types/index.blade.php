@extends('layouts.app')

@section('page-title', 'All Types')

@section('main-content')
    <div class="row">
        <div class="col">

            <a href="{{ route('admin.types.create') }}" class="btn btn-success w-100 mb-5 ">
                + Add
            </a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                        <th scope="col">Actions</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <th scope="row">
                                {{ $type->id }}
                            </th>
                            <td>
                                {{ $type->title }}
                            </td>
                            <td>
                                {{ $type->Slug }}
                            </td>
                            <td>
                                <a href="{{ route('admin.types.show', ['type' => $type->id]) }}" class="btn btn-primary">
                                    See
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.types.edit', ['type' => $type->id]) }}" class="btn btn-danger">
                                    Update
                                </a>
                            </td>
                            <td>
                                <form
                                    action="{{ route('admin.types.destroy', ['type' => $type->id]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn btn-warning">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection