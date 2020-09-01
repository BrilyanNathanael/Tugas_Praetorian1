<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <section class="dashboard-page">
        <h1>Dashboard</h1>
        <a href="/menambahkan">Menambahkan Artikel</a>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Artikel</th>
                    <th scope="col">Isi Artikel</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($article as $a)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$a->judul}}</td>
                    <?php $description = substr($a->description,0,60); ?>
                    <td>{{$description}}...</td>
                    <td class="action">
                        <a href="/view/{{$a->id}}" class="view">
                            <img src="img/eye.png" alt="" widht="25px" height="25px">
                        </a>
                        <a href="">
                            <img src="img/edit.png" alt="" width="25px" height="25px">
                        </a>
                        <form action="">
                            <button>
                                <img src="img/trash.png" alt="" width="25px" height="25px">
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>