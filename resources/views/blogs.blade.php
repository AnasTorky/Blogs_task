<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author</title>
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrab.min.css.map') }}"/>
</head>
<body>
<form method='POST' action="{{route('blog_data')}}" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Summary</label>
    <input type="text" name="summary" class="form-control">
  </div><div class="mb-3">
    <label class="form-label">Content</label>
    <input type="text" name="content" class="form-control">
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
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br><br><br><br>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">title</th>
            <th scope="col">summary</th>
            <th scope="col">author</th>
            <th scope="col">img</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->summary }}</td>
                    <td>{{ $blog->author_id }}</td>
                    <td><img src="{{ asset('app/public/blog'.$blog->image) }}"></td>
                    <td>
                        <form  method="GET" action="{{ route('blog_delete', $blog->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('blog_edit', $blog->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
             @endforeach
        </tbody>
    </table>
</body>
</html>
