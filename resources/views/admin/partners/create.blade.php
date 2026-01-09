@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Add Partner</h1>
    <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block">Name</label>
            <input type="text" name="name" class="form-input w-full" value="{{ old('name') }}" required>
            @error('name')<div class="text-red-500">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block">Logo</label>
            <input type="file" name="logo" class="form-input w-full">
            @error('logo')<div class="text-red-500">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block">URL</label>
            <input type="url" name="url" class="form-input w-full" value="{{ old('url') }}">
            @error('url')<div class="text-red-500">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block">Description</label>
            <textarea name="description" class="form-input w-full">{{ old('description') }}</textarea>
            @error('description')<div class="text-red-500">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Partner</button>
        <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
