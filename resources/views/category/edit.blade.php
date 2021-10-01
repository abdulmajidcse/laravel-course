<x-layout>

    <x-slot name="title">
        Edit Category
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h2>Edit Category <a href="{{ route('categories.index') }}"
                    class="btn btn-sm btn-flat btn-primary ms-2">Category List</a></h2>
        </div>

        <div class="card-body">

            @if (Session::has('success'))
                <div class="text-success">{{ Session::get('success') }}</div>
            @endif

            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('put')
                
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $category->name) }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-flat btn-primary">Save</button>
            </form>

        </div>
    </div>


</x-layout>
