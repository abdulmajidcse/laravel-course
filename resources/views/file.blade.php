<x-layout>

  <x-slot name="title">
    File Storage
  </x-slot>

  <h2>File Storage</h2>
  <form action="{{ url('file/store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="file" name="testFile" class="form-control" required>

    <button type="submit" class="btn btn-primary">Upload</button>

  </form>

  @if(Session::has('filePath'))
    <a href="{{ Storage::disk('public')->url(Session::get('filePath')) }}">File Link</a>
    {{-- <a href="{{ asset('uploads/' . Session::get('filePath')) }}">File Link</a> --}}
  @endif


</x-layout>