<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/create.css">
    <title>Halaman Menambahkan</title>
</head>
<body>
    <nav>
        <div class="nav-left">
            <p>Halo, {{$user->name}}</p>   
        </div>
        <div class="nav-right">
            <a href="{{route('logout')}}">Logout</a>
        </div>
    </nav>
    <section class="create-page">
        <div class="create-border">
            <h1>Menambahkan</h1>
            <form action="/menambahkan" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Judul Artikel</label>
                    <input type="text" class="form-control" id="title" name="judul">
                </div>
                <div class="form-group">
                    <label for="name">Nama Penulis</label>
                    <input type="text" class="form-control" id="name" name="nama">
                </div>
                <div class="form-group">
                    <label for="description">Isi Artikel</label>
                    <textarea id="description" cols="30" rows="10" class="form-control" name="description"></textarea>
                </div>
                <img id="output" width="200px" height="200px"/><br>
                <input type="file" accept="image/*" onchange="loadFile(event)" name="gambar">
                <div class="link">
                    <a href="/" class="link-hlm">Click untuk ke halaman lain</a>
                </div>
                <div class="button">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </section>
    <script>
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
</body>
</html>