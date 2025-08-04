<!-- Template -->
@extends('welcome')

<!-- Title -->
@section('title', 'SPP')
<!-- Konten -->
@section('konten')

  {{--Tombol Registrasi--}}
  <div class="d-flex justify-content-between align-items-center">
  <h1 class="h3 mb-4 text-gray-800">Laporan Prodi</h1>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
    Tambah data
  </button>
  </div>

  <table class="table table-striped table-hover table-bordered">
  <thead>
  <tr>
  <th scope="col">No</th>
  <th scope="col">Kode Prodi</th>
  <th scope="col">Nama Prodi</th>
  <th scope="col">Ketua Prodi</th>
  <th scope="col">Aksi</th>
  </tr>
  </thead>
  <tbody>
  @foreach ($prodi as $pd)
  <tr>
  <th scope="row">{{$pd['id']}}</th>
  <td>{{$pd['kode_prodi']}}</td>
  <td>{{$pd['nama_prodi']}}</td>
  <td>{{$pd['ketua_prodi']}}</td>
  <td>
  <div class="d-flex align-items-center mr-1">
  <a href="{{ route('prodi.destroy', $pd['id']) }}" class="btn btn-danger btn-sm mr-2"><i
  class="fas fa-trash"></i></a>

  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ubahModal{{$pd['id']}}">
  <i class="fas fa-edit"></i>
  </button>
  </div>
  </td>
  </tr>
  @endforeach
  </tbody>
  </table>

  {{--Table Registrasi--}}
  <!-- Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="{{ route('prodi.store') }}" method="POST">
        @csrf

        <label for="kode_prodi">Kode Prodi</label>
        <input type="text" name="kode_prodi" id="kode_prodi"
          class="form-control col-sm-15 @error('kode_prodi')is-invalid @enderror mb-2"
          placeholder="Kode Prodi">
        <div class="mb-2 invalid-feedback">
          @error('kode_prodi')
        {{$message}}
      @enderror
        </div>

        <label for="nama_prodi">Nama Prodi</label>
      <input type="text" name="nama_prodi" id="nama_prodi"
       class="form-control col-sm-15 @error('nama_prodi')is-invalid @enderror mb-2" placeholder="Nama Prodi">
      <div class="mb-2 invalid-feedback">
      @error('nama_prodi')
      {{$message}}
      @enderror
      </div>
      
        <label for="ketua_prodi">Ketua Prodi</label>
        <input type="text" name="ketua_prodi" id="ketua_prodi"
          class="form-control col-sm-15 @error('ketua_prodi')is-invalid @enderror mb-2" placeholder="Ketua Prodi">
        <div class="mb-2 invalid-feedback">
          @error('ketua_prodi')
        {{$message}}
        @enderror
        </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
        </form>
      
      </div>
    </div>
    </div>

  <!-- modal Registrasi -->
  @foreach ($prodi as $pi)
  <div class="modal fade" id="ubahModal{{ $pi->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Ubah Data Siswa</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>

  <div class="modal-body">
  <form action="{{ route('prodi.update', $pi->id) }}" method="POST">
  @csrf

  <label for="kode_prodi">Kode Program Studi</label>
  <input type="text" name="kode_prodi" id="kode_prodi"
  class="form-control col-sm-15 @error('kode_prodi')is-invalid @enderror mb-2" placeholder="Kode Program Studi"
  value="{{ $pi->kode_prodi }}">
  <div class="mb-2 invalid-feedback">
  @error('kode_prodi')
  {{$message}}
  @enderror
  </div>

  <label for="nama_prodi">Nama Program Studi</label>
  <input type="text" name="nama_prodi" id="nama_prodi"
  class="form-control col-sm-15 @error('nama_prodi')is-invalid @enderror mb-2" placeholder="Nama Program Studi"
  value="{{ $pi->nama_prodi }}">
  <div class="mb-2 invalid-feedback">
  @error('nama_prodi')
  {{$message}}
  @enderror
  </div>

  <label for="ketua_prodi">Ketua Program Studi</label>
  <input type="text" name="ketua_prodi" id="ketua_prodi"
  class="form-control col-sm-15 @error('ketua_prodi')is-invalid @enderror mb-2" placeholder="Ketua Program Studi"
  value="{{ $pi->ketua_prodi }}">
  <div class="mb-2 invalid-feedback">
  @error('ketua_prodi')
  {{$message}}
  @enderror
  </div>

  <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
  </div>

  </form>
  </div>
  </div>
  </div>
  </div>
@endforeach
@endsection