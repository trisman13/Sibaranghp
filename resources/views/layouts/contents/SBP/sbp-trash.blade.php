@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List Surat Bukti Penindakan</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Surat Bukti Penindakan</h3>
                  @if(session('success'))
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i>{{session('success')}}</h5>
                  </div>
                  @endif
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>   
                  </div>
                  <div class="mt-5" style="max-width: 100px">
                    <a role="button" href="{{ route('sbp-create')}}" class="btn btn-block btn-success btn-sm"> Tambah Data</a>
                </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal Keluar</th>
                        <th>Surat Keputusan BDN</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($sbp as $surat)
                      <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $surat->nomor_surat}}</td>
                        <td>{{ $surat->tanggal_keluar_surat}}</td>
                        <td>{{ $surat->id_surat_kep_bdn}}</td>
                        <td>{{ $surat->status}}</td>
                        <td>
                          <div style="max-width: 80px">
                            <a
                              role="button"
                              onclick="return confirm ('Apa yakin ingin mengembalikan data {{$surat->nomor_surat}} ini?')"
                              class="btn btn-block btn-warning btn-sm"
                              href="{{ route('sbp.restore',$surat ->id)}}"> Kembalikan </a> 

                            <a 
                              role="button"
                              onclick="return confirm ('Apa yakin ingin menghapus data {{$surat->nomor_surat}} ini Permanen?')"
                              class="btn btn-block btn-danger btn-sm d-inline-block"
                              href="{{ route('sbp.destroy.permanen',$surat ->id)}}">Hapus</a>
                        </div>
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection