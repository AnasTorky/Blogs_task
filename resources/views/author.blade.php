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
<form method='POST' action="{{route('author_data')}}" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label class="form-label">Author name</label>
    <input type="text" name="name" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name='img' class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">facebook_link</label>
    <input type="text" name="facebook" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br><br><br><br>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">img</th>
            <th scope="col">facebook</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $author->name }}</td>
                    <td><img src="{{ asset('app/public/author'.$author->image) }}"></td>
                    <td>{{ $author->facebook }}</td>
                    <td>
                        <form  method="GET" action="{{ route('author_delete', $author->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('author_edit', $author->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
             @endforeach
        </tbody>
    </table>
</body>
</html>
