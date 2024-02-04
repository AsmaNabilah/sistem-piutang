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
            <h1>Edit Data</h1>
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
            </div>
            <!-- /.card-header -->
            @foreach($utang as $u)
            <form action="/utang/update" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $u->id }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Transaksi</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_transaksi" placeholder="Masukan Nama Transaksi" value="{{ $u->nama_transaksi }}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Transaksi</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" name="tanggal_transaksi" placeholder="Masukan Tanggal transaksi" value="{{ $u->tanggal_transaksi }}" required>
                  </div>
                  <div class="form-group">
                    <label for="jml">Jumlah Pinjaman</label>
                    <input type="number" class="form-control" id="jml" name="jml_pinjaman" placeholder="Masukan Jumlah Pinjaman" value="{{ $u->jml_pinjaman }}" required>
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="">pilih status</option>
                        <option {{$u->status == 'Belum Lunas'  ? 'selected' : ''}}>Belum Lunas</option>
                        <option {{$u->status == 'Sudah Lunas'  ? 'selected' : ''}}>Sudah Lunas</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jatuh Tempo</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" name="jatuh_tempo" placeholder="Masukan Tanggal Jatuh Tempo" value="{{ $u->jatuh_tempo }}" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
            @endforeach
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
