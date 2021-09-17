<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box col-12"style="width: 80% ">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  @if(session('mensaje'))
     <div class="alert alert-success">
      {!! html_entity_decode(session('mensaje')) !!}
     </div>
  @endif

  <div class="card col-12">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>


      <form action="{{ route('empresa.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="name">
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="email">
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="ein" placeholder="ein">
        </div>
        <div class="input-group mb-3">
          <input type="number" class="form-control" name="phone" placeholder="phone">
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="principal_address" placeholder="principal_address">
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="responsable_phone" placeholder="responsable_phone">
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="responsable_name" placeholder="responsable_name">
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="responsable_lastname" placeholder="responsable_lastname">
        </div><div class="input-group mb-3">
          <input type="text" class="form-control" name="responsable_address" placeholder="responsable_address">
        </div><div class="input-group mb-3">
          <textarea name="notes" class="form-control" placeholder="notes" id="" cols="30" rows="10"></textarea>
        </div><div class="input-group mb-3">
          <input type="text" class="form-control" name="status" placeholder="status">
        </div><div class="input-group mb-3">
          <input type="file" class="form-control" name="logo" placeholder="logo">
        </div><div class="input-group mb-3">
          
          <select name="services_packs_id" id="" class="form-control">
            <option value="">Seleccione</option>
            @foreach($servicesPacks as $key => $value)
              <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->price }}</option>
            @endforeach
          </select>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Nueva Empresa</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

  

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
</body>
</html>
