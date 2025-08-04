<!-- Template -->
@extends('welcome')

<!-- Title -->
@section('title', 'SPP')
<!-- Konten -->
@section('konten')
  <!-- Isi Konten -->

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


  {{--Tombol Registrasi--}}
  <div class="d-flex justify-content-between align-items-center">
  <h1 class="h3 mb-4 text-gray-800">Laporan Data SPP</h1>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
    Tambah data
  </button>
  </div>

  <table class="table table-striped table-hover table-bordered">
  <thead>
  <tr>
  <th scope="col">No</th>
  <th scope="col">Kode Pembayaran</th>
  <th scope="col">Tanggal Pembayaran</th>
  <th scope="col">Nomor Induk Siswa</th>
  <th scope="col">Kode Program Studi</th>
  <th scope="col">Kode Kelas</th>
  <th scope="col">Semester</th>
  <th scope="col">Jenis Pembayaran</th>
  <th scope="col">Status Pembayaran</th>
  <th scope="col">Aksi</th>
  </tr>
  </thead>
  <tbody>
  @foreach ($spp_siswa as $sp)
  <tr>
  <th scope="row">{{$sp['id']}}</th>
  <td>{{$sp['kode_pembayaran']}}</td>
  <td>{{$sp['tanggal_pembayaran']}}</td>
  <td>{{$sp['nis']}}</td>
  <td>{{$sp['kode_prodi']}}</td>
  <td>{{$sp['kode_kelas']}}</td>
  <td>{{$sp['semester']}}</td>
  <td>{{$sp['jenis_pembayaran']}}</td>
  <td>{{$sp['status_pembayaran']}}</td>
  <td>
  <div class="d-flex align-items-center mr-1">
  <a href="{{ route('sppsiswa.destroy', $sp['id']) }}" class="btn btn-danger btn-sm mr-2"><i
  class="fas fa-trash"></i></a>

  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ubahModal{{$sp['id']}}">
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
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data Pembayaran SPP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('sppsiswa.store') }}" method="POST">
        @csrf
        <label for="kode_pembayaran">Kode Pembayaran</label>
        <input type="text" name="kode_pembayaran" id="kode_pembayaran"
          class="form-control col-sm-15 @error('kode_pembayaran')is-invalid @enderror mb-2"
          placeholder="Kode Pembayaran">
        <div class="mb-2 invalid-feedback">
          @error('kode_pembayaran')
        {{$message}}
      @enderror
        </div>
        <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
        <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran"
          class="form-control col-sm-15 @error('tanggal_pembayaran')is-invalid @enderror mb-2"
          placeholder="Tanggal Pembayaran">
        <div class="mb-2 invalid-feedback">
          @error('tanggal_pembayaran')
        {{$message}}
      @enderror
        </div>

        <label for="nis">Nomor Induk Siswa</label>
        <input type="text" name="nis" id="nis"
          class="form-control col-sm-15 @error('nis')is-invalid @enderror mb-2" placeholder="Nomor Induk Siswa">
        <div class="mb-2 invalid-feedback">
          @error('nis')
        {{$message}}
      @enderror
        </div>

        <label for="kode_prodi">Kode Program Studi</label>
        <input type="text" name="kode_prodi" id="kode_prodi"
          class="form-control col-sm-15 @error('kode_prodi')is-invalid @enderror mb-2"
          placeholder="Kode Prodi">
        <div class="mb-2 invalid-feedback">
          @error('kode_prodi')
        {{$message}}
      @enderror
        </div>

        <label for="kode_kelas">Kode Kelas</label>
        <input type="text" name="kode_kelas" id="kode_kelas"
          class="form-control col-sm-15 @error('kode_kelas')is-invalid @enderror mb-2"
          placeholder="Kode Kelas">
        <div class="mb-2 invalid-feedback">
          @error('kode_kelas')
        {{$message}}
      @enderror
        </div>

        <label for="semester">Semester</label>
        <input type="text" name="semester" id="semester"
          class="form-control col-sm-15 @error('semester')is-invalid @enderror mb-2"
          placeholder="Semester">
        <div class="mb-2 invalid-feedback">
          @error('semester')
        {{$message}}
      @enderror
        </div>

        <div class="mb-3">
          <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran</label>
          <select class="form-select" name="jenis_pembayaran" required>
          <option value="">-- Pilih Jenis Pembayaran --</option>
          <option value="Tunai Lunas">Tunai Lunas</option>
          <option value="Tunai Cicilan">Tunai Cicilan</option>
          <option value="Transfer Lunas">Transfer Lunas</option>
          <option value="Transfer Cicilan">Transfer Cicilan</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
          <select class="form-select" name="status_pembayaran" required>
          <option value="">-- Pilih Status --</option>
          <option value="Belum Selesai">Belum Selesai</option>
          <option value="Pending">Pending</option>
          <option value="Selesai">Selesai</option>
          </select>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan data</button>
        </div>
        </form>
      </div>
      </div>
    </div>
    </div>

  <!-- modal Update -->
  @foreach ($spp_siswa as $sw)
  <div class="modal fade" id="ubahModal{{ $sw->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Ubah Data Pembayaran</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>

  <div class="modal-body">
  <form action="{{ route('sppsiswa.update', $sw->id) }}" method="POST">
  @csrf
  <label for="kode_pembayaran">Kode Pembayaran</label>
  <input type="text" name="kode_pembayaran" id="kode_pembayaran"
  class="form-control col-sm-15 @error('kode_pembayaran')is-invalid @enderror mb-2" placeholder="Kode Pembayaran"
  value="{{ $sw->kode_pembayaran }}">
  <div class="mb-2 invalid-feedback">
  @error('kode_pembayaran')
  {{$message}}
  @enderror
  </div>
  <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
  <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran"
  class="form-control col-sm-15 @error('tanggal_pembayaran')is-invalid @enderror mb-2" placeholder="Tanggal Pembayaran"
  value="{{ $sw->tanggal_pembayaran }}">
  <div class="mb-2 invalid-feedback">
  @error('tanggal_pembayaran')
  {{$message}}
  @enderror
  </div>

  <label for="nis">Nomor Induk Siswa</label>
  <input type="text" name="nis" id="nis"
  class="form-control col-sm-15 @error('nis')is-invalid @enderror mb-2" placeholder="Nomor Induk Siswa"
  value="{{ $sw->nis }}">
  <div class="mb-2 invalid-feedback">
  @error('nis')
  {{$message}}
  @enderror
  </div>

  <label for="kode_prodi">Kode Program Studi</label>
  <input type="text" name="kode_prodi" id="kode_prodi"
  class="form-control col-sm-15 @error('kode_prodi')is-invalid @enderror mb-2" placeholder="Kode Program Studi"
  value="{{ $sw->kode_prodi }}">
  <div class="mb-2 invalid-feedback">
  @error('kode_prodi')
  {{$message}}
  @enderror
  </div>

  <label for="kode_kelas">Kode Kelas</label>
  <input type="text" name="kode_kelas" id="kode_kelas"
  class="form-control col-sm-15 @error('kode_kelas')is-invalid @enderror mb-2" placeholder="Kode Kelas"
  value="{{ $sw->kode_kelas }}">
  <div class="mb-2 invalid-feedback">
  @error('kode_kelas')
  {{$message}}
  @enderror
  </div>

  <label for="semester">Semester</label>
        <input type="text" name="semester" id="semester"
          class="form-control col-sm-15 @error('semester')is-invalid @enderror mb-2"
          placeholder="Semester">
        <div class="mb-2 invalid-feedback">
          @error('semester')
        {{$message}}
      @enderror
        </div>

  <div>
  <label for="jenis_pembayaran" name="jenis_pembayaran" id="jenis_pembayaran"
  class="form-label col-sm-15 @error('jenis_pembayaran')is-invalid @enderror mb-2" placeholder="Jenis Pembayaran"
  value="{{ $sw->jenis_pembayaran }}">Jenis Pembayaran</label>
  <select class="form-select" name="jenis_pembayaran" id="jenis_pembayaran">Pilih Jenis Pembayaran
  <option value="Tunai Lunas">Tunai Lunas</option>
  <option value="Tunai Cicilan">Tunai Cicilan</option>
  <option value="Transfer Lunas">Transfer Lunas</option>
  <option value="Transfer Cicilan">Transfer Cicilan</option>
  </select>
  </div>
  <div class="mb-2 invalid-feedback">
  @error('status_pembayaran')
  {{$message}}
  @enderror
  </div>

  <div>
  <label for="status_pembayaran" name="status_pembayaran" id="status_pembayaran"
  class="form-label col-sm-15 @error('status_pembayaran')is-invalid @enderror mb-2" placeholder="Status Pembayaran"
  value="{{ $sw->status_pembayaran }}">Status Pembayaran</label>
  <select class="form-select" name="status_pembayaran" id="status_pembayaran">Pilih
   <option value="Belum Selesai">Belum Selesai</option>
   <option value="Pending">Pending</option>
   <option value="Selesai">Selesai</option>
  </select>
  </div>
  <div class="mb-2 invalid-feedback">
  @error('status_pembayaran')
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