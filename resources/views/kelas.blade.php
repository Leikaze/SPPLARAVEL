<!-- Template -->
@extends('welcome')

<!-- Title -->
@section('title', 'SPP')
<!-- Konten -->
@section('konten')

  {{--Tombol Registrasi--}}
  <div class="d-flex justify-content-between align-items-center">
  <h1 class="h3 mb-4 text-gray-800">Laporan Kelas</h1>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
    Tambah data
  </button>
  </div>

  <table class="table table-striped table-hover table-bordered">
  <thead>
  <tr>
  <th scope="col">No</th>
  <th scope="col">Kode Kelas</th>
  <th scope="col">Nama Kelas</th>
  <th scope="col">Tempat</th>
  <th scope="col">Aksi</th>
  </tr>
  </thead>
  <tbody>
  @foreach ($kelas as $kl)
  <tr>
  <th scope="row">{{$kl['id']}}</th>
  <td>{{$kl['kode_kelas']}}</td>
  <td>{{$kl['nama_kelas']}}</td>
  <td>{{$kl['tempat']}}</td>
  <td>
  <div class="d-flex align-items-center mr-1">
  <a href="{{ route('kelas.destroy', $kl['id']) }}" class="btn btn-danger btn-sm mr-2"><i
  class="fas fa-trash"></i></a>

  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ubahModal{{$kl['id']}}">
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
        <form action="{{ route('kelas.store') }}" method="POST">
        @csrf

        <label for="kode_kelas">Kode Kelas</label>
        <input type="text" name="kode_kelas" id="kode_kelas"
          class="form-control col-sm-15 @error('kode_kelas')is-invalid @enderror mb-2"
          placeholder="Kode Kelas">
        <div class="mb-2 invalid-feedback">
          @error('kode_kelas')
        {{$message}}
      @enderror
        </div>

        <label for="nama_kelas">Nama Kelas</label>
      <input type="text" name="nama_kelas" id="nama_kelas"
       class="form-control col-sm-15 @error('nama_kelas')is-invalid @enderror mb-2" placeholder="Nama Kelas">
      <div class="mb-2 invalid-feedback">
      @error('nama_kelas')
      {{$message}}
      @enderror
      </div>
      
        <label for="tempat">Tempat</label>
        <input type="text" name="tempat" id="tempat"
          class="form-control col-sm-15 @error('tempat')is-invalid @enderror mb-2" placeholder="Tempat">
        <div class="mb-2 invalid-feedback">
          @error('tempat')
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
  @foreach ($kelas as $kls)
<div class="modal fade" id="ubahModal{{ $kls->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
  <form action="{{ route('kelas.update', $kls->id) }}" method="POST">
  @csrf

  <label for="kode_kelas">Kode Kelas</label>
  <input type="text" name="kode_kelas" id="kode_kelas"
  class="form-control col-sm-15 @error('kode_kelas')is-invalid @enderror mb-2" placeholder="Kode Kelas"
  value="{{ $kls->kode_kelas }}">
  <div class="mb-2 invalid-feedback">
  @error('kode_kelas')
  {{$message}}
  @enderror
  </div>

  <label for="nama_kelas">Nama Kelas</label>
  <input type="text" name="nama_kelas" id="nama_kelas"
  class="form-control col-sm-15 @error('nama_kelas')is-invalid @enderror mb-2" placeholder="Nama Kelas"
  value="{{ $kls->nama_kelas }}">
  <div class="mb-2 invalid-feedback">
  @error('nama_kelas')
  {{$message}}
  @enderror
  </div>

  <label for="tempat">Tempat</label>
  <input type="text" name="tempat" id="tempat"
  class="form-control col-sm-15 @error('tempat')is-invalid @enderror mb-2" placeholder="Tempat"
  value="{{ $kls->tempat }}">
  <div class="mb-2 invalid-feedback">
  @error('tempat')
  {{$message}}
  @enderror
  </div>

  <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
  </div>

  </form>

  @if (session('success'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <span>{{session('success')}}</span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>

  @endif

  @if (session('gagal'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <span>{{session('gagal')}}</span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  @endif

  </div>
  </div>
  </div>
  </div>
  @endforeach
@endsection