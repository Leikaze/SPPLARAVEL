<!-- Template -->
@extends('welcome')

<!-- Title -->
@section('title', 'SPP')
<!-- Konten -->
@section('konten')

  {{--Tombol Registrasi--}}
  <div class="d-flex justify-content-between align-items-center">
  <h1 class="h3 mb-4 text-gray-800">Laporan Siswa</h1>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
    Tambah data
  </button>
  </div>

  <table class="table table-striped table-hover table-bordered">
  <thead>
  <tr>
  <th scope="col">No</th>
  <th scope="col">NIS</th>
  <th scope="col">NISN</th>
  <th scope="col">Nama Lengkap</th>
  <th scope="col">Kode Prodi</th>
  <th scope="col">Semester</th>
  <th scope="col">Nomor Telpon</th>
  <th scope="col">Aksi</th>
  </tr>
  </thead>
  <tbody>
  @foreach ($siswa as $sw)
  <tr>
  <th scope="row">{{$sw['id']}}</th>
  <td>{{$sw['nis']}}</td>
  <td>{{$sw['nisn']}}</td>
  <td>{{$sw['nama_lengkap']}}</td>
  <td>{{$sw['kode_prodi']}}</td>
  <td>{{$sw['semester']}}</td>
  <td>{{$sw['nomer_hp']}}</td>
  <td>
  <div class="d-flex align-items-center mr-1">
  <a href="{{ route('siswa.destroy', $sw['id']) }}" class="btn btn-danger btn-sm mr-2"><i
  class="fas fa-trash"></i></a>

  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ubahModal{{$sw['id']}}">
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
        <form action="{{ route('siswa.store') }}" method="POST">
        @csrf

        <label for="nis">NIS</label>
        <input type="text" name="nis" id="nis"
          class="form-control col-sm-15 @error('nis')is-invalid @enderror mb-2"
          placeholder="NIS">
        <div class="mb-2 invalid-feedback">
          @error('nis')
        {{$message}}
      @enderror
        </div>

        <label for="nisn">NISN</label>
      <input type="text" name="nisn" id="nisn"
       class="form-control col-sm-15 @error('nisn')is-invalid @enderror mb-2" placeholder="NISN">
      <div class="mb-2 invalid-feedback">
      @error('nis')
      {{$message}}
      @enderror
      </div>
      
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap"
          class="form-control col-sm-15 @error('nama_lengkap')is-invalid @enderror mb-2" placeholder="Nama Lengkap">
        <div class="mb-2 invalid-feedback">
          @error('nama_lengkap')
        {{$message}}
        @enderror
        </div>

        <label for="kode_prodi">Kode Prodi</label>
        <input type="text" name="kode_prodi" id="kode_prodi"
          class="form-control col-sm-15 @error('kode_prodi')is-invalid @enderror mb-2" placeholder="Kode Prodi">
        <div class="mb-2 invalid-feedback">
          @error('kode_prodi')
        {{$message}}
      @enderror
        </div>

        <label for="semester">Semester</label>
        <input type="text" name="semester" id="semester"
          class="form-control col-sm-15 @error('semester')is-invalid @enderror mb-2" placeholder="Semester">
        <div class="mb-2 invalid-feedback">
          @error('semester')
        {{$message}}
      @enderror
        </div>

        <label for="nomer_hp">Nomor Telpon</label>
        <input type="text" name="nomer_hp" id="nomer_hp"
          class="form-control col-sm-15 @error('nomer_hp')is-invalid @enderror mb-2" placeholder="Nomor Telpon">
        <div class="mb-2 invalid-feedback">
          @error('nomer_hp')
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
  @foreach ($siswa as $ss)
  <div class="modal fade" id="ubahModal{{ $ss->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
  <form action="{{ route('siswa.update', $ss->id) }}" method="POST">
  @csrf

  <label for="nis">Nomor Induk Siswa</label>
  <input type="text" name="nis" id="nis"
  class="form-control col-sm-15 @error('nis')is-invalid @enderror mb-2" placeholder="Nomor Induk Siswa"
  value="{{ $ss->nis }}">
  <div class="mb-2 invalid-feedback">
  @error('nis')
  {{$message}}
  @enderror
  </div>

  <label for="nisn">Nomor Induk Siswa Nasional</label>
  <input type="text" name="nisn" id="nisn"
  class="form-control col-sm-15 @error('nisn')is-invalid @enderror mb-2" placeholder="Nomor Induk Siswa Nasional"
  value="{{ $ss->nisn }}">
  <div class="mb-2 invalid-feedback">
  @error('nisn')
  {{$message}}
  @enderror
  </div>

  <label for="nama_lengkap">Nama Lengkap</label>
  <input type="text" name="nama_lengkap" id="nama_lengkap"
  class="form-control col-sm-15 @error('nama_lengkap')is-invalid @enderror mb-2" placeholder="Nama Lengkap"
  value="{{ $ss->nama_lengkap }}">
  <div class="mb-2 invalid-feedback">
  @error('nama_lengkap')
  {{$message}}
  @enderror
  </div>


  <label for="kode_prodi">Kode Program Studi</label>
  <input type="text" name="kode_prodi" id="kode_prodi"
  class="form-control col-sm-15 @error('kode_prodi')is-invalid @enderror mb-2" placeholder="Kode Program Studi"
  value="{{ $ss->kode_prodi }}">
  <div class="mb-2 invalid-feedback">
  @error('kode_prodi')
  {{$message}}
  @enderror
  </div>

  <label for="semester">Semester</label>
        <input type="text" name="semester" id="semester"
          class="form-control col-sm-15 @error('semester')is-invalid @enderror mb-2"
          placeholder="Semester" value="{{ $ss->semester }}">
        <div class="mb-2 invalid-feedback">
          @error('semester')
        {{$message}}
      @enderror
        </div>

        <label for="nomer_hp">Nomor Telpon</label>
        <input type="text" name="nomer_hp" id="nomer_hp"
          class="form-control col-sm-15 @error('nomer_hp')is-invalid @enderror mb-2"
          placeholder="Nomor Telpon" value="{{ $ss->nomer_hp }}">
        <div class="mb-2 invalid-feedback">
          @error('nomer_hp')
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