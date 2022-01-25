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
                <form method="post" action="{{ route('sbp.update', $sbp->id) }}">
                  @method('PUT')
                    @csrf
                  <div class="card-body">

                    <div class="form-group">
                    <label for="nomor_surat">Nomor Surat</label>
                    @error('nomor_surat')<p class="text-danger">{{$message}}</p> @enderror
                    <input value="{{$sbp->nomor_surat}}" type="text" class="form-control" id="nomor_surat" name="nomor_surat" 
                    placeholder="Masukkan Nomor Surat">
                    </div>

                    <div class="form-group">
                    <label for="tanggal_keluar_surat">Tanggal Keluar</label>
                    @error('tanggal_keluar_surat')<p class="text-danger">{{$message}}</p> @enderror
                    <input value="{{$sbp->tanggal_keluar_surat}}" type="date" class="form-control" id="tanggal_keluar_surat" name="tanggal_keluar_surat"
                    placeholder="Masukkan Tanggal Surat">
                    </div>

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