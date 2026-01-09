@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Partners</h1>
        <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">Add Partner</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>Name</th>
                <th>Logo</th>
                <th>URL</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partners as $partner)
                <tr>
                    <td>{{ $partner->name }}</td>
                    <td>
                        @if($partner->logo)
                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo" class="h-10">
                        @endif
                    </td>
                    <td><a href="{{ $partner->url }}" target="_blank">{{ $partner->url }}</a></td>
                    <td>{{ $partner->description }}</td>
                    <td>
                        <a href="{{ route('admin.partners.edit', $partner) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
