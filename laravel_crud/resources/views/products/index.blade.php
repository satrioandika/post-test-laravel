@extends('layout.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

<style>
  body {
    background-color: #f8f9fa;
  }
  h1 {
    margin: 0;
    padding: 20px 0;
    font-family: 'Montserrat', 'Poppins', sans-serif;
    font-weight: bold;
    text-align: center;
    color: #343a40;
  }

  .table-wrapper {
    background-color: #fff;
    padding: 20px;
    padding-bottom: 100px; 
    border-radius: 5px;
    box-shadow: 0 0 1px rgba(0, 0, 0, 0.1);
  }

  .table {
    margin: 0 auto;
    width: 100%;
  }

  .search-container {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 10px;
  }

  .search-input {
    width: 250px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
</style>
<br><br>
<div class="container">
  <h1>Data Produk</h1>
    <div class="table-wrapper">
    <div class="row mb-3">
    <div class="col-md-6 d-flex align-items-center">
        <a href="{{ route('products.create') }}">
            <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>
        </a>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
        <input type="text" class="form-control search-input" placeholder="Search by name or code" style="width: 50%;">
    </div>
</div>


    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <div class="table-responsive">
      <table class="table table-hover table-bordered table-striped">
        <thead class="thead-dark text-center">
          <tr>
            <th>ID</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th style="width: 30%;">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-center">
          @forelse ($product as $product)
          <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->kode }}</td>
            <td>{{ $product->name }}</td>
            <td>Rp. {{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td style="text-align: center;">
              <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
              <a href="#" class="btn btn-sm btn-danger" onclick="
              event.preventDefault();
              if(confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                document.getElementById('delete-row-{{ $product->id }}').submit();
              }"><i class="fa fa-trash"></i> Hapus</a>
              <form method="POST" id="delete-row-{{ $product->id }}" action="{{ route('products.destroy', ['id' => $product->id]) }}" style="display: none;">
                @method('DELETE')
                @csrf
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6">Tidak ada data ditemukan!</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

@endsection
