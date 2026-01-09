@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Partner</h1>
    <form action="{{ route('admin.partners.update', $partner) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block">Name</label>
            <input type="text" name="name" class="form-input w-full" value="{{ old('name', $partner->name) }}" required>
            @error('name')<div class="text-red-500">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block">Logo</label>
            @if($partner->logo)
                <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo" class="h-10 mb-2">
            @endif
            <input type="file" name="logo" class="form-input w-full">
            @error('logo')<div class="text-red-500">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block">URL</label>
            <input type="url" name="url" class="form-input w-full" value="{{ old('url', $partner->url) }}">
            @error('url')<div class="text-red-500">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block">Description</label>
            <textarea name="description" class="form-input w-full">{{ old('description', $partner->description) }}</textarea>
            @error('description')<div class="text-red-500">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Partner</button>
        <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
