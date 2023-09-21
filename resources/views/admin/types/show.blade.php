@extends('layouts.app')

@section('page-title', $type->title)

@section('main-content')
<div class="container">

    <div class="row py-5">
        <div class="col-12 bg-light">
            <h1>
                {{ $type->title }}
            </h1>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">
                    {{ $type->id }}
                </th>
                <td>
                    {{ $type->title }}
                </td>
                <td>
                    {{ $type->slug }}
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
        </tbody>
      </table>
</div>
@endsection