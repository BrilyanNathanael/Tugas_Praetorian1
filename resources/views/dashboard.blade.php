<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    @auth
        <nav>
            <div class="nav-left">
                <p>Halo, {{$user->name}}</p>   
            </div>
            <div class="nav-right">
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
    <section class="dashboard-page">
        <h1>Dashboard</h1>
        <a href="/menambahkan">Menambahkan Artikel</a>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar Artikel</th>
                    <th scope="col">Judul Artikel</th>
                    <th scope="col">Isi Artikel</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($article as $a)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td><img src="{{'/storage/images/' . $a->gambar}}" width="100px" height="100px" alt=""></td>
                    <?php $judulCount = strlen($a->judul); ?>
                    @if($judulCount > 30)
                        <?php $judul = substr($a->judul,0,30); ?>
                        <td>{{$judul}}...</td>
                    @else
                        <td>{{$a->judul}}</td>
                    @endif

                    <?php $descCount = strlen($a->description); ?>
                    @if($descCount > 60)
                        <?php $description = substr($a->description,0,60); ?>
                        <td>{{$description}}...</td>
                    @else
                        <td>{{$a->description}}</td>
                    @endif
                    <td class="action">
                        @auth
                        @if($user->isAdmin == 0 && $user->id == $a->user_id)
                            <a href="/view/{{$a->id}}" class="view">
                                <img src="img/eye.png" alt="" widht="25px" height="25px">
                            </a>
                            <a href="/mengubah/{{$a->id}}">
                                <img src="img/edit.png" alt="" width="25px" height="25px">
                            </a>
                            <form action="/menghapus/{{$a->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button>
                                    <img src="img/trash.png" alt="" width="25px" height="25px">
                                </button>
                            </form>
                        @elseif($user->isAdmin == 1)
                            <a href="/view/{{$a->id}}" class="view">
                                <img src="img/eye.png" alt="" widht="25px" height="25px">
                            </a>
                            @if($user->id == $a->user_id)
                                <a href="/mengubah/{{$a->id}}">
                                    <img src="img/edit.png" alt="" width="25px" height="25px">
                                </a>
                            @endif
                            <form action="/menghapus/{{$a->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button>
                                    <img src="img/trash.png" alt="" width="25px" height="25px">
                                </button>
                            </form>
                        @else
                        <a href="/view/{{$a->id}}" class="view">
                            <img src="img/eye.png" alt="" widht="25px" height="25px">
                        </a>
                        @endif
                        @endauth

                        @guest
                        <a href="/view/{{$a->id}}" class="view">
                            <img src="img/eye.png" alt="" widht="25px" height="25px">
                        </a>
                        @endguest
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>