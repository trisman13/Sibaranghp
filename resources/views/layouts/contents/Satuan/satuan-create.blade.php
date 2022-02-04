@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Buat Satuan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Satuan</li>
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
                  <h3 class="card-title">Satuan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('satuan.store')}}">
                    @csrf
                  <div class="card-body">

                    <div class="form-group">
                      <label for="kode">Kode Satuan</label>
                      @error('kode') <p class="text-danger">{{ $message }}</p> @enderror
                      <input
                        class="form-control"
                        type="text"
                        placeholder="Masukkan Kode Satuan"
                        id="kode"
                        name="kode"
                        value="{{ old('kode') }}">
                      </div>

                    <div class="form-group">
                      <label for="nama">Nama Satuan</label>
                      @error('nama') <p class="text-danger">{{ $message }}</p> @enderror
                      <input
                        class="form-control"
                        type="text"
                        placeholder="Masukkan Satuan"
                        id="nama"
                        name="nama"
                        value="{{ old('nama') }}">
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