@extends('layouts.backend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        <h2>Edit Book</h2>
                    </div>
                    <div class="float-end">
                        <a class="btn btn-warning" href="{{ route('books.index') }}"> Back to List</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('books.update',$book->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-5 col-sm-5 col-md-5">
                                <div class="form-group">
                                    <label class="form-label"><strong>Title:</strong></label>
                                    <input type="text" name="title" class="form-control" value="{{ $book->title }}" placeholder="Title">
                                    @error('title')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label"><strong>Author:</strong></label>
                                    <input type="text" name="author" value="{{ $book->author }}"  class="form-control" placeholder="Author">
                                    @error('author')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><strong>Genre:</strong></label>
                                    <input type="text" name="genre" class="form-control" value="{{ $book->genre }}"  placeholder="Genre">
                                    @error('genre')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-5 col-sm-5 col-md-5">
                                <div class="form-group">
                                    <label class="form-label"><strong>ISBN:</strong></label>
                                    <input type="text" name="isbn" class="form-control" value="{{ $book->isbn }}"  placeholder="ISBN">
                                    @error('isbn')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label"><strong>Published On:</strong></label>
                                    <input type="date" name="published_on" class="form-control" value="{{ $book->published_on }}"  placeholder="Published On">
                                    @error('published_on')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><strong>Publisher:</strong></label>
                                    <input type="text" name="publisher" class="form-control" value="{{ $book->publisher }}"  placeholder="Publisher">
                                    @error('publisher')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><strong>Image:</strong></label>
                                    <input type="file" name="image" class="form-control"  placeholder="Upload Image" accept="image/*">
                                    <input type="hidden" name="old_image" value="{{$book->image}}">
                                    <img src="{{$book->image_url}}" width="80" height="80" class="my-2">
                                    @error('image')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9">
                                <div class="form-group">
                                    <label class="form-label"><strong>Description:<strong></label>
                                    <textarea name="description" class="form-control" placeholder="Description">{{ $book->description }}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

