<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/create.css">
    <title>Halaman Mengubahkan</title>
</head>
<body>
    <section class="create-page">
        <div class="create-border">
            <h1>Mengubahkan</h1>
            <form action="/mengubah/{{$article->id}}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="title">Judul Artikel</label>
                    <input type="text" class="form-control" id="title" name="judul" value="{{$article->judul}}">
                </div>
                <div class="form-group">
                    <label for="name">Nama Penulis</label>
                    <input type="text" class="form-control" id="name" name="nama" value="{{$article->nama}}">
                </div>
                <div class="form-group">
                    <label for="description">Isi Artikel</label>
                    <textarea id="description" cols="30" rows="10" class="form-control" name="description">{{$article->description}}</textarea>
                </div>
                <img src="{{'/storage/images/' . $article->gambar}}" alt="" width="200px" height="200px"><br>
                <input type="file" name="gambar">
                <div class="link">
                    <a href="/" class="link-hlm">Click untuk ke halaman lain</a>
                </div>
                <div class="button">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>