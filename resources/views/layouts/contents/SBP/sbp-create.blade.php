@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Buat Surat Bukti Penindakan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">SBP</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Surat Bukti Penindakan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('sbp.store')}}">
                    @csrf
                  <div class="card-body">

                    <div class="form-group">
                      <label for="nomor_surat">Nomor Surat</label>
                      @error('nomor_surat') <p class="text-danger">{{ $message }}</p> @enderror
                      <input
                        class="form-control"
                        type="text"
                        placeholder="Masukkan Nomor Surat"
                        id="nomor_surat"
                        name="nomor_surat"
                        value="{{ old('nomor_surat') }}">
                      </div>

                    <div class="form-group">
                      <label for="tanggal_keluar_surat">Tanggal Keluar</label>
                      @error('tanggal_keluar_surat') <p class="text-danger">{{ $message }}</p> @enderror
                      <input
                        class="form-control"
                        type="date"
                        placeholder="Masukkan Tanggal Surat"
                        id="tanggal_keluar_surat"
                        name="tanggal_keluar_surat"
                        value="{{ old('tanggal_keluar_surat') }}">
                      </div>

                    <br><br>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px">No</th>
                          <th>Nama</th>
                          <th>Jenis</th>
                          <th>Jumlah</th>
                          <th>Satuan</th>
                          <th>Merek</th>
                          <th>Pemilik</th>
                          <th style="width: 40px">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Yasmine Schiller</td>
                          <td>Yasmine Schiller</td>
                          <td>
                            <div class="form-group">
                              <select class="form-control">
                                <option value="EA">EA</option>
                                <option value="HT">HT</option>
                                <option value="MMEA">MMEA</option>
                                <option value="Lainnya">Lainnya</option>

                              </select>
                            </div>
                          </td>
                          <td>Yasmine Schiller</td>
                          <td>
                            <div class="form-group">
                              <select class="form-control">
                                @foreach ($satuan as $st)
                                <option value="{{$st->id}}"> {{$st->kode}} {{$st->nama}} </option>
                                @endforeach
                              </select>
                            </div>
                          </td>
                          <td>Yasmine Schiller</td>
                          <td>Yasmine Schiller</td>
                          <td>Yasmine Schiller</td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->

            </div>
            <!--/.col (left) -->
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection