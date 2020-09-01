<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/view.css">
    <title>Halaman Artikel</title>
</head>
<body>
    <section class="view-page">
        <div class="view-border">
            <h1>{{$article->judul}}</h1>
            <p>Created By {{$article->nama}}</p>
            <div class="gambar">
                <img src="" alt="">
            </div>
            <div class="description">
                <p>{{$article->description}}</p>
            </div>
            <div class="button">
                <a href="/">Kembali</a>
            </div>
        </div>
    </section>
</body>
</html>