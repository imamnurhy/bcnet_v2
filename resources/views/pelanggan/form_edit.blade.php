<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Form</title>
</head>
<body>
    <div class="container">
<form method="POST" action="{{ route('pelanggan.update', $tmpelanggan->id )}}">
        @csrf
        <div class="form-group">
          <label>Nama Pelanggan</label>
        <input value="{{ $tmpelanggan->n_pelanggan }}" name="n_pelanggan" type="text" class="form-control" >
        </div>

        <div class="form-group">
          <label>Nomer Hp</label>
          <input value="{{ $tmpelanggan->no_hp }}" name="no_hp" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Tanggal Online</label>
            <input value="{{ $tmpelanggan->tgl_daftar }}" name="tgl_daftar" type="date" class="form-control">
          </div>

          <div class="form-group">
            <label >Paket Layanan</label>
            <select  name="tmlayanan_id" class="form-control" >
                @foreach ($tmlayanan as $item)
            <option value="{{$item->id}}"  @if ( $tmpelanggan->tmlayanan_id == $item->id) selected='selected' @endif>{{$item->n_layanan.' '.$item->bandwith.' mb'}}</option>
                @endforeach
            </select>
          </div>

        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>


</form>
    </div>
</body>
</html>
