<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{ asset('PicsArt_09-06-11.01.39.png')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Data Pelayanan</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">BCNETWORK</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                Dropdown
              </a>
              <div class="dropdown-menu btn btn-danger" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    <a class="btn btn-outline-success" style="margin-left: 10px; margin-top:20px;" href="{{ route('pelayanan.create')}}">Tambah Data</a>
<div class="container">
<table class="table table-hover " style="margin-top: 20px;">
    <thead>
      <tr class="table-warning">
        <th scope="col">No</th>
        <th scope="col">Nama Layanan</th>
        <th scope="col">Bandwith</th>
        <th scope="col">Harga</th>
        <th scope="col">Aksi</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($tmlayanan as $key => $item)
        <tr>
            <th scope="row">{{ ++$key }}</th>
            <td>{{ $item->n_layanan }}</td>
            <td>{{ $item->bandwith }}</td>
            <td>{{ $item->harga }}</td>
            <td >
            <a href="{{ route('pelayanan.edit', $item->id )}}"><i class="fa fa-pencil" style="margin-right: 20px;"></i></a>

        <form action="{{ route('pelayanan.destroy', $item->id )}}" method="POST">
            <input name="_method" type="hidden" value="DELETE">
            @csrf
            <button type="submit" class="btn btn-primary" style="margin-left: 40px;">DELETE</button>
        </form>
            </td>

          </tr>
        @endforeach
    </tbody>
  </table>
</div>
</body>
</html>
