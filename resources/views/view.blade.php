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
    <nav>
        <div class="nav-left">
            <p>Halo, {{$user->name}}</p>   
        </div>
        <div class="nav-right">
            <!-- Button trigger modal -->
            <button type="button" data-toggle="modal" data-target="#exampleModal" style="background-color: #1D2134; border: 0;">
            <img src="/img/gmail.png" alt="" width="25px" height="25px">
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Subscribe Newsletter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <input type="text" placeholder="Input your email" class="form-control">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>
            <a href="{{route('logout')}}">Logout</a>
        </div>
    </nav>
    <section class="view-page">
        <div class="view-border">
            <h1>{{$article->judul}}</h1>
            <p>Created By {{$article->nama}}</p>
            <div class="gambar">
                <img src="{{'/storage/images/' . $article->gambar}}" alt="" width="300px" height="300px">
            </div>
            <div class="description">
                <p>{{$article->description}}</p>
            </div>
            <div class="komentar">
                <h3>KOMENTAR ARTIKEL</h3>
                <div class="komentar-list">
                    <h5>Rizky S</h5>
                    <p>Ini artikel yang saya butuhkan, terimakasih infonya</p>
                </div>
                <div class="komentar-list">
                    <h5>Rudi Bell</h5>
                    <p>Saya suka tema dari artikel ini yang sangat mengedukasi</p>
                </div>
                <form action="">
                    <textarea name="" id="" cols="130" rows="5" placeholder="Tinggalkan komentar..." class="form-control"></textarea>
                </form>
            </div>
            <div class="button" style="margin-top: 1.5em;">
                <a href="/">Kembali</a>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>