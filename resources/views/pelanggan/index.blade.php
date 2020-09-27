

@extends('layout.index')

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-box"></i>
                        Dashboard
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1">
                            <i class="icon icon-account_box"></i>Data Pelanggan</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href=""><i class="icon icon-assignment"></i>Data Pelayanan</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3"><i class="icon icon-calendar"></i>By Date</a>
                    </li>
                </ul>

            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
    <div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover data-tables"
                data-options='{"searching":false}'>
                <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Pelanggan</th>
                      <th scope="col">Nomor Telphone</th>
                      <th scope="col">Tanggan Online</th>
                      <th scope="col">Paket Layanan</th>
                      <th scope="col">Detail</th>

                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($tmpelanggan as $key => $item)
                      <tr>
                          <th scope="row">{{ ++$key }}</th>
                          <td>{{ $item->n_pelanggan }}</td>
                          <td>{{ $item->no_hp }}</td>
                          <td>{{ $item->tgl_daftar }}</td>
                          <td>{{ $item->tmLayanan->bandwith }}</td>
                          <td >
                          <a href="{{ route('pelanggan.edit', $item->id )}}"><i class="icon icon-edit" ></i></a>

                      <form action="{{ route('pelanggan.destroy', $item->id )}}" method="POST">
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
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h2><span class="badge badge-light">Tambah Data Pelanggan</span><hr></h2>
                <form method="POST" action="{{route('pelanggan.store')}}">
                    @csrf
                    <div class="form-group">
                      <label>Nama Pelanggan</label>
                      <input name="n_pelanggan" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label>Nomer Hp</label>
                      <input name="no_hp" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Online</label>
                        <input name="tgl_daftar" type="datetime-local" class="form-control">
                      </div>

                      <div class="form-group">
                        <label >Paket Layanan</label>
                        <select name="tmlayanan_id" class="form-control">
                            @foreach ($tmlayanan as $item)
                        <option value="{{$item->id}}">{{$item->n_layanan.' '.$item->bandwith.' mb'}}</option>
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
        </div>
    </div>

    </div>


    </div>
</div>
@endsection
