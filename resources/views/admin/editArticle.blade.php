<!-- editArticle.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Edit Article</h1>
    <form action="{{ route('kelolaArticle.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $article->title }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="category">Category</label>
            <input type="text" name="category" class="form-control" value="{{ $article->category }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $article->content }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
            @if($article->image)
                <img src="{{ Storage::url('photos/' . $article->image) }}" alt="{{ $article->title }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
</body>
</html>
