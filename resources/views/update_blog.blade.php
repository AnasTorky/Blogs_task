<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Blog</title>
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrab.min.css.map') }}"/>
</head>
<body>
<form method='POST' action="{{ route('blog_update', $blogs->id)}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $blogs->title }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Summary</label>
        <input type="text" name="summary" class="form-control" value="{{ $blogs->summary }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Content</label>
        <input type="text" name="content" class="form-control" value="{{ $blogs->content }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Select Author</label>
      <select class="form-select" name='author_id'>
            @foreach($authors as $author)
                <option value="{{ $author->id }}">{{$author->name}}</option>
            @endforeach 
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
</body>
</html>
