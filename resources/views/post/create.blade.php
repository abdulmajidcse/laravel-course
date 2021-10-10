<x-layout>

    <x-slot name="title">
        New Post
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h2>New Post <a href="{{ route('posts.index') }}"
                    class="btn btn-sm btn-flat btn-primary ms-2">Post List</a></h2>
        </div>

        <div class="card-body">

            @if (Session::has('success'))
                <div class="text-success">{{ Session::get('success') }}</div>
            @endif

            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control @error('category') is-invalid @enderror" name="category" id="category" required>
                        <option value="" selected disabled>Select a Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == old('category')) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea rows="3" class="form-control @error('body') is-invalid @enderror" name="body" id="body" required>{{ old('body') }}</textarea>
                    @error('body')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-flat btn-primary">Create</button>
            </form>

        </div>
    </div>


</x-layout>
