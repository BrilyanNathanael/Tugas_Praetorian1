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
    @auth
    <nav>
        <div class="nav-left">
            <p>Halo, {{$user->name}}</p>   
        </div>
        <div class="nav-right">
            <a href="/mail">
                <img src="/img/gmail.png" alt="" width="25px" height="25px">
            </a>
            <!-- Button trigger modal -->
            <!-- <button type="button" data-toggle="modal" data-target="#exampleModal" style="background-color: #1D2134; border: 0;">
            <img src="/img/gmail.png" alt="" width="25px" height="25px">
            </button> -->

            <!-- Modal -->
            <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Subscribe Newsletter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/mail" method="POST">
                    <div class="modal-body">
                            @csrf
                            <input type="text" name="email" placeholder="Input your email" class="form-control">
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div> -->
            <a href="{{route('logout')}}">Logout</a>
        </div>
    </nav>
    @endauth
    @guest
        <nav>
            <div class="nav-left">
                <p>Halo, User</p>   
            </div>
            <div class="nav-right">
                <a href="{{route('login')}}">Login</a>
                <a href="{{route('register')}}">Register</a>
            </div>
        </nav>
    @endguest
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
                <form action="/comment/{{$article->id}}" method="POST">
                    @csrf
                    <textarea onclick="klik()" name="comment" id="" rows="3" placeholder="Tinggalkan komentar..." class="form-control"></textarea>
                    <div class="comment" id="button">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
                @foreach($article->commentUser as $comment)
                <div class="komentar-list">
                    <h5>{{$comment->name}}</h5>
                    <p>{{$comment->pivot->comment}}</p>
                    <div class="reply">
                        <p><span>BALAS</span></p>
                        @foreach($replied as $r)
                            @if($r->article_user_id === $comment->pivot->id)
                            <div class="reply-users">
                                <h6>{{$name = App\User::find($r->user_id)->name}}</h6>
                                <p>{{$r->reply}}</p>
                            </div>
                            @endif
                        @endforeach
                        <div class="reply-content">
                            <form action="/reply/{{$comment->pivot->id}}" method="POST">
                                @csrf
                                <textarea name="reply" id="" rows="3" class="form-control" placeholder="Balas Komentar..."></textarea>
                                <div class="replied">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="garis-putih"></div>
            </div>
            <div class="button" style="margin-top: 1.5em;">
                <a href="/">Kembali</a>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
</body>
</html>