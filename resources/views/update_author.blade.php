<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Author</title>
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrab.min.css.map') }}"/>

</head>
<body>
<form method='POST' action="{{ route('author_update', $authors->id)}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Author Name</label>
        <input type="text" name="name" class="form-control" value="{{ $authors->name }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="img" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Facebook Link</label>
        <input type="text" name="facebook" class="form-control" value="{{ $authors->facebook }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
</body>
</html>
