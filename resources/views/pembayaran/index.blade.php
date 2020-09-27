@extends('layout.index')

@section('content')
<div class="has-sidebar-left has-sidebar-tabs">
    <div class="row row-eq-height my-3">
        <div class="col-md-6">



<div class="card no-b">

<div class="card-header center">
<strong>Data Pembayaran Hari ini</strong>
</div>
<div class="card-body">
    <table class="table table-hover earning-box"
    data-options='{"searching":false}'>
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Pelanggan</th>
          <th scope="col">Nominal</th>
          <th scope="col">Tanggal Pembayaran</th>


        </tr>
      </thead>
      {{-- <tbody>
          @foreach ($tmpelanggan as $key => $item)
          <tr>
              <th scope="row">{{ ++$key }}</th>
              <td>{{ $item->n_pelanggan }}</td>
              <td>{{ $item->no_hp }}</td>
              <td>{{ $item->tgl_daftar }}</td>
              <td>{{ $item->tmLayanan->n_layanan }}</td>
              <td>{{ $item->tmLayanan->harga }}</td>
            </tr>
          @endforeach
      </tbody> --}}
  </table>
</div>
</div>
</div>


<script>
    /*
     *  Add sidebar classes (sidebar-mini sidebar-collapse sidebar-expanded-on-hover) in body tag
     *  you can remove this script tag and add classes directly to body
     *  this is only for demo
     */
    document.body.className += ' theme-dark';
</script>
@endsection
