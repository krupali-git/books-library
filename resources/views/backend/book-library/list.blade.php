@extends('layouts.backend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        <h2>Books Library Backend</h2>
                    </div>
                    <div class="float-end">
                        <a class="btn btn-success" href="{{ route('books.create') }}"> Create Book</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th class="text-center">Image</th>
                                <th>Title</th>
                                <th>ISBN</th>
                                <th>Author</th>
                                <th>Published On</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $key=>$book)
                                <tr>
                                    <td>{{ $key + $books->firstItem() }}</td>
                                    <td class="text-center"><img src="{{$book->image_url}}" width="50" height="50"></td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->isbn }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->published_on }}</td>
                                    <td>
                                        <form action="{{ route('books.destroy',$book->id) }}" method="Post">
                                            <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    {!! $books->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
