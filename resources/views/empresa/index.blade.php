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
<div class="register-box col-12"style="width: 100% ";">
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


      <a class="btn btn-primary" href="{{ route('empresa.create') }}">Crear Empresa</a>


      <table class="table">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>email</th>
            <th>ein</th>
            <th>phone</th>
            <th>principal_address</th>
            
            <th>notes</th>
            <th>status</th>
            <th>services_packs_id</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          @foreach($empresas as $key => $value)
          <tr>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->ein }}</td>
            <td>{{ $value->phone }}</td>
            <td>{{ $value->principal_address }}</td>
        
            <td>{{ $value->notes }}</td>
            <td>{{ $value->status ? 'Activo':'Inactivo' }}</td>
            <td>{{ $value->services_packs->name }}</td>
            <td><a class="btn btn-warning" href="{{ route('empresa.edit',$value->id) }}">Editar</a></td>
            <td>
              <form id="delete-form" method="POST" action="{{ route('empresa.destroy', $value->id) }}">
                 @csrf
                  {{ method_field('DELETE') }}

                  <button type="submit" class="btn btn-danger btn-sm" title="Borrar">
                          Borrar
                      </button>

              </form>
            </td>
          </tr>
          @endforeach



        </tbody>
      </table>

  

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
