<!DOCTYPE html>
<html lang="en">

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('admin/v_header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
   
  @include('admin/v_sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pencatatan Utang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pencatatan Utang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <a href="/utang/tambah" class="btn btn-block btn-primary">Tambah Data</a>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Jumlah Pinjaman</th>
                    <th>Status</th>
                    <th>Jatuh Tempo</th>
                    <th style="text-align: center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($utang as $index => $u)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $u->nama_transaksi }}</td>
                      <td>{{ date('d/m/Y', strtotime($u->tanggal_transaksi)) }}</td>
                      <td>Rp. {{ number_format($u->jml_pinjaman,0,',','.') }}</td>
                      <td>{{ $u->status }}</td>
                      <td>{{ date('d/m/Y', strtotime($u->jatuh_tempo)) }}</td>
                      <td style="text-align: center">
                        <a href="/utang/edit/{{ $u->id }}" class="btn btn-warning btn-sm">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="/utang/hapus/{{ $u->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')">
                          <i class="fas fa-trash"></i>
                        </a>
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

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('admin/v_footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>
</html>
