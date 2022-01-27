@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Barang</li>
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
                  <h3 class="card-title">Barang</h3>
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
                    <a
                      role="button"
                      href="{{ route('barang.create')}}"
                      class="btn btn-block btn-primary btn-sm"> Tambah Data</a>
                    <a
                      role="button"
                      href="{{ route('barang.trash')}}"
                      class="btn btn-block btn-danger btn-sm"> Sampah </a>
                </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    {{-- $table->unsignedBigInteger('id_brg_bukti_penindakan');
                    $table->string('nama');
                    $table->string('jenis');
                    $table->string('kategori')->nullable();
                    $table->string('jenis_lain')->nullable();
                    $table->float('jumlah', 15, 2);
                    $table->string('satuan');
                    $table->string('merk')->nullable();
                    $table->string('pemilik');
                    $table->string('status'); --}}
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Merk</th>
                        <th>Pemilik</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($barang as $brg)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $brg->nama }}</td>
                        <td>{{ $brg->jenis != null ? $brg->jenis : $brg->jenis_lain }}</td>
                        <td>{{ $brg->jumlah }}</td>
                        <td>{{ $brg->satuan }}</td>
                        <td>{{ $brg->merk }}</td>
                        <td>{{ $brg->pemilik }}</td>
                        <td>{{ $brg->status }}</td>
                        <td>
                          <div style="max-width: 80px">
                            <a
                              role="button"
                              class="btn btn-block btn-warning btn-sm"
                              href="{{route('barang.edit',$brg->id) }}">Sunting </a>

                            <a
                              role="button"
                              onclick="return confirm ('Apa yakin ingin menghapus data {{$brg->nama }} ini?')"
                              class="btn btn-block btn-danger btn-sm d-inline-block"
                              href="{{ route('barang.destroy', $brg->id) }}">Hapus</a>
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