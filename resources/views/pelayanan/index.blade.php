

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
                          <a href="{{ route('pelayanan.edit', $item->id )}}"><i class="icon icon-edit" ></i></a>

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
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h2><span class="badge badge-light">Tambah Data Pelayanan</span><hr></h2>
                <form method="POST" action="{{route('pelayanan.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Nama Layanan</label>
                        <input name="n_layanan" type="text" class="form-control" >
                      </div>

                    <div class="form-group">
                      <label>Bandwith</label>
                      <input name="bandwith" type="text" class="form-control">

                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input name="harga" type="text" class="form-control">
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
