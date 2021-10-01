<x-layout>

    <x-slot name="title">
        Category List
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h2>Category List <a href="{{ route('categories.create') }}" class="btn btn-sm btn-flat btn-primary ms-2">New</a></h2>
        </div>

        <div class="card-body">

            @if (Session::has('success'))
                <div class="text-success">{{ Session::get('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-flat btn-primary">Edit</a>
                                {{-- <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-sm btn-flat btn-danger">Delete</a> --}}
                                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
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
