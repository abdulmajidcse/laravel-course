<x-layout>

    <x-slot name="title">
        Post List
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h2>Post List <a href="{{ route('posts.create') }}" class="btn btn-sm btn-flat btn-primary ms-2">New</a></h2>
        </div>

        <div class="card-body">

            @if (Session::has('success'))
                <div class="text-success">{{ Session::get('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Category</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                @if (Storage::exists($post->image))
                                    <div class="p-2">
                                        <img class="img" style="width: 200px;" src="{{ Storage::url($post->image) }}" alt="Image">
                                    </div>
                                @endif
                            </td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-flat btn-success">View</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-flat btn-primary">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-flat btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</x-layout>
