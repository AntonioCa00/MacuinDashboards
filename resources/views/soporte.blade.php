<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/658c27c3ed.js" crossorigin="anonymous"></script>   
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Macuin Dashboards</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-c5A5/D5ue/0Gsz7VpC5jBZ7VgNf9zpH2IeP6oY5Y13r5y5I1H7dGjKgBb7X9exDtf+FfjFucdBzR20R7Gp6yjKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/626/626610.png">       
        <link rel="stylesheet" href="css/estilosForms.css">
        <link rel="stylesheet" href="css/estilos.css">


</head>
<body>
    @if(session()->has('password'))
    <script type="text/javascript">          
        Swal.fire(
        'Error',
        'La contraseña actual es incorrecta.',
        'error'
        )
    </script> 
    @endif

    @if(session()->has('save'))
    <script type="text/javascript">          
        Swal.fire(
        '¡Todo correcto!',
        'Se ha editado su perfil',
        'success'
        )
    </script> 
    @endif

    @if(session()->has('share'))
    <script type="text/javascript">          
        Swal.fire(
        '¡Todo correcto!',
        'Se asigno correctamente',
        'success'
        )
    </script> 
    @endif

    @if (session()->has('successUsuario')) 
        <script type="text/javascript">          
            Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Usuario creado en la BD',
            showConfirmButton: false,
            timer: 1500
            })
        </script> 
    @endif

    @if (session()->has('regis')) 
        <script type="text/javascript">          
            Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Departamento creado en la BD',
            showConfirmButton: false,
            timer: 1500
            })
        </script> 
    @endif

    @if (session()->has('editado')) 
        <script type="text/javascript">          
            Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Departamento editado',
            showConfirmButton: false,
            timer: 1500
            })
        </script> 
    @endif


    @if (session()->has('borrado')) 
    <script type="text/javascript">          
        Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: 'Usuario eliminado',
        showConfirmButton: false,
        timer: 1500
        })
    </script> 
    @endif

    @if (session()->has('eliminado')) 
        <script type="text/javascript">          
            Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Departamento eliminado',
            showConfirmButton: false,
            timer: 1500
            })
        </script> 
    @endif



<!-- LOGIN  -->

    <div class="sidebar overflow-auto" style="max-height: auto; overflow-y: scroll;">
        <h3 class="mt-3 mb-4"><strong>Macuin<br/></strong>Dashboards</h3>

                @if (Auth::user()->img_perfil == null)
                {{-- Foto default --}}
                    <img src="img/user.jpg" alt="Foto de perfil">    
                @else
                {{-- Foto editada --}}
                    <img src="{{asset('storage/'.Auth::user()->img_perfil)}}" alt="Foto de perfil">
                @endif

        <h4>{{ Auth::user()->name }}</h4>

        <h5 class="mt-2"><strong>Perfil:</strong> {{ Auth::user()->perfil }}</h5>

        <h5 class="mt-2">{{ Auth::user()->email }}</h5>

        <br>
        <a href="" data-bs-toggle="modal" data-bs-target="#modalColab"><i class="bi bi-person-fill-gear"> Editar Perfil</i></a>
        <a href="" data-bs-toggle="modal" data-bs-target="#RegistrarDpto"><i class="bi bi-person-fill-gear"> Registrar Departamento</i></a>
        <a href="" data-bs-toggle="modal" data-bs-target="#m_menu"><i class="bi bi-file-earmark-pdf-fill"> Generar reporte</i></a>
        

        {{-- <form action="{{route('logout')}}" method="POST">
            @csrf
            <a><i class="bi bi-box-arrow-left"><strong> Cerrar Sesion</strong></i></a>
        </form> 
        
        ESTO ESTA COMENTADO POR UN DETALLITO DE POST entonces puse tipo get la ruta y quedo el de abajo
        --}}

        <a href="{{route('logout')}}"><i class="bi bi-box-arrow-left"><strong> Cerrar Sesion</strong></i></a>
        
        <div class="card" style="max-width: 18rem;">
            <div class="card mb-3" style="max-width: 18rem;">
                <div class="card-header">Departamentos</div>

                    <div class="tablita overflow-auto" style="max-height: 230px; overflow-y: scroll;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Opcion:</th>
                                </tr>
                            </thead>
                            <tbody style="max-height: 50px; overflow-y: auto;">
                                @foreach ($depa as $item)
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Detalle{{$item->id_dpto}}">
                                            {{$item->nombre}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#EliminarDpto{{$item->id_dpto}}">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>                                                                                                        
                            @endforeach                                                                           
                        </table>
                    </div>

            </div>
        </div>
    </div>

    @foreach ($depa as $item)
    <!-- Modal Detalle Departamento -->
    <div class="modal fade" id="Detalle{{$item->id_dpto}}" tabindex="-1" aria-labelledby="Detalle" aria-hidden="true">
        <div class="modal-dialog modal-modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detalles de Departamento</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             <label hidden>id de Departamento {{$item->id_dpto}}</label>   
             <div class="container-fluid">
                <form action="{{route('editDpto',$item->id_dpto)}}" method="POST">  
                    @csrf                  
                    @method('PUT')
                    </select>                    
                    <div class="row mb-3">
                        <span>Nombre</span>
                        <input type="text" name="txtNombre" class="form-control" value="{{$item->nombre}}" placeholder="" required>
                    </div>
                    <div class="row mb-3">
                        <span>Telefono</span>
                        <input type="text" name="txtTel" class="form-control" placeholder="" value="{{$item->telefono}}" required>
                    </div>
                    <div class="row mb-3">
                        <span>Ubicación</span>
                        <input type="text" name="txtUbi" class="form-control" value="{{$item->ubicacion}}" placeholder="" required>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Editar Datos</button>
                    </div>
                </form> 
                                  
            </div>   
            </div>
        </div>
        </div>
    </div>

    <!-- Modal Eliminar Departamento -->
    <div class="modal fade" id="EliminarDpto{{$item->id_dpto}}" tabindex="-1" aria-labelledby="Detalle" aria-hidden="true">
        <div class="modal-dialog modal-modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar Departamento</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             <label hidden>id de Departamento {{$item->id_dpto}}</label>   
             <div class="container-fluid">
                <form action="{{route('deleteDpto',$item->id_dpto)}}" method="POST">  
                    @csrf                  
                    @method('PUT')
                    </select>                    
                    <div class="row mb-3">
                        <span>Nombre</span>
                        <input type="text" name="txtNombre" class="form-control" value="{{$item->nombre}}" placeholder="" required disabled>
                    </div>
                    <div class="row mb-3">
                        <span>Telefono</span>
                        <input type="text" name="txtTel" class="form-control" placeholder="" value="{{$item->telefono}}" required disabled>
                    </div>
                    <div class="row mb-3">
                        <span>Ubicación</span>
                        <input type="text" name="txtUbi" class="form-control" value="{{$item->ubicacion}}" placeholder="" required disabled>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Eliminar Departamento</button>
                    </div>
                </form>                                   
            </div>   
            </div>
        </div>
        </div>
    </div>

    @endforeach

    <!-- Modal Registrar Departamento -->
    <div class="modal fade" id="RegistrarDpto" tabindex="-1" aria-labelledby="Detalle" aria-hidden="true">
        <div class="modal-dialog modal-modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Departamento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <div class="container-fluid">
            <form action="{{route('regisDpto')}}" method="POST">  
                @csrf                  
                </select>                    
                <div class="row mb-3">
                    <span>Nombre</span>
                    <input type="text" name="txtNombre" class="form-control" value="" placeholder="" required>
                </div>
                <div class="row mb-3">
                    <span>Telefono</span>
                    <input type="text" name="txtTel" class="form-control" placeholder="" value="" required>
                </div>
                <div class="row mb-3">
                    <span>Ubicación</span>
                    <input type="text" name="txtUbi" class="form-control" value="" placeholder="" required>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>                   
        </div>   
        </div>
    </div>
    </div>
</div>

    <!-- CARD DE TICKETS  -->

    <div class="container-soporte">      
        <div class="card" style="height: 20rem;">
            <div class="card-header bg-transparent mb-1">
                <h3>Consulta de Tickets</h3>
                    <form class="d-flex" role="search" action="/search" method="get" id="search-form" style="margin-left: 60%">
                        @csrf
                        <select class="form-select" aria-label="Default select example" name="filtro" id="search-form">  
                            <option disabled selected>Estatus ...</option>
                            @foreach ($estatus as $esta)
                            <option value="{{$esta->estatus}}">{{$esta->estatus}}</option>
                            @endforeach                                
                        </select>
                        <button type="submit" class="btn btn-primary">Buscar</button>             
                    </form>          
            </div>
                <div class="card-body overflow-auto" style="max-height: 230px; overflow-y: scroll;">
                    <a href="/soporte_bo"><button class="btn btn-primary">Ver todos</button></a>
                    <table class="table" >
                        <thead>
                        <tr>
                            <th scope="col">Id:</th>
                            <th scope="col">Usuario:</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Fecha:</th>
                            <th scope="col">Clasificación:</th>
                            <th scope="col">Detalle:</th>
                            <th scope="col">Estatus:</th>
                            <th scope="col">Opciones:</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($tick as $tick)
                            <tr>
                                <th scope="row">{{$tick->id_ticket}}</th>
                                <td>{{$tick->name}}</td>
                                <td>{{$tick->nombre}}</td>
                                <td>{{$tick->created_at}}</td>
                                <td>{{$tick->clasificacion}}</td>
                                <td>{{$tick->detalle}}</td>
                                <td>{{$tick->estatus}}</td>
                                <td>
                                    @unless ($tick->estatus == "Solicitado")
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"disabled>Asignar</button>
                                    @else
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Asignar{{$tick->id_ticket}}">Asignar</button>
                                    @endunless                                                                          
                                </td>
                            </tr>   
                                <!-- Modal Asignar Ticket -->

                                <div class="modal fade" id="Asignar{{$tick->id_ticket}}" tabindex="-1" aria-labelledby="Detalle" aria-hidden="true">
                                    <div class="modal-dialog modal-modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Registrar Departamento</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="container-fluid">
                                        <form action="{{route('compartir',$tick->id_ticket)}}" method="POST">  
                                        @csrf                  
                                            </select>                 
                                            <div class="row mb-3">
                                                <span>Buscar Auxiliar</span>
                                                <input hidden type="text" name="txtTicket" class="form-control" value="{{$tick->id_ticket}}" placeholder="" required>
                                                <select class="form-select form-select-lg" name="txtAuxiliar" id="">
                                                    <option selected disabled>Selecciona un auxiliar</option>

                                                    
                                                    @foreach ($auxs as $aux)
                                                    <option value="{{$aux->id}}">{{$aux->name}} {{$aux->apellido}}</option>
                                                    @endforeach  
                                                        


                                                </select>
                                            </div>

                                            <div class="row mb-3">
                                                <span>Observaciones</span>
                                                <textarea name="txtObservacion" class="form-control" placeholder="" value="" required></textarea>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Registrar</button>
                                            </div>
                                        </form>                   
                                    </div>   
                                    </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach                                                                                                         
                        </tbody>
                    </table>
                </div>
        </div>


                <div class="card">
                        <div class="card-header bg-transparent mb-3"><h4>Registrar Usuarios</h4></div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <form action="/usuarioNew" method="post">
                                @csrf
                                <div class="input-group mb-4">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Nombre Usuario</span>
                                    <input type="text" name="txtNameUsu" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>

                                <div class="input-group mb-4">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Correo</span>
                                    <input type="email" name="txtemailUsu" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>

                                <div class="input-group mb-4">
                                    <label class="input-group-text" for="inputGroupSelect01">Perfil</label>
                                    <select class="form-select" name="txtPerfil" id="inputGroupSelect01">
                                        <option selected>Selecciona una opcion...</option>
                                        <option value="Jefe de Soporte">Jefe de Soporte</option>
                                        <option value="Auxiliar">Auxiliar</option>
                                    </select>
                                </div>

                                <div class="input-group mb-5">
                                    <label class="input-group-text" for="inputGroupSelect01">Departamento</label>
                                    <select class="form-select" name="txtDeparta" id="inputGroupSelect01">
                                        <option selected>Selecciona una opcion...</option>
                                            @foreach ($depa as $dpto)
                                                <option value="{{$dpto->id_dpto}}">{{$dpto->nombre}}</option>
                                            @endforeach
                                    </select>
                                </div>

                                    <button type="submit" class="btn btn-primary">Guardar Usuario</button>

                                    <button class="btn btn-primary consulta" style="margin-left: 15%" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" data-backdrop="false">Consultar Usuarios</button>

                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                        <div class="offcanvas-header text-center">
                                            <h5 class="offcanvas-title " id="offcanvasRightLabel"><Strong>Consultar Usuarios</Strong></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                            <div class="offcanvas-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Id</th>
                                                            <th scope="col">Nombre</th>
                                                            <th scope="col">Departamento</th>
                                                            <th scope="col">Opciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                        @foreach ($usu as $usu)
                                                            <tr>
                                                                <th scope="row">{{$usu->id}}</th>
                                                                <th scope="row">{{$usu->name}}</th>
                                                                @if ($usu->nombre == null)
                                                                    <td>es cliente</td>
                                                                @else
                                                                    <td>{{$usu->nombre}}</td>  
                                                                @endif
                                                         
                                                                <td>
                                                                    <div class="d-grid gap-2 d-md-block">                                              
                                                                        <button type="button" class="btn btn-danger btn-sm" onclick="borrarUsuario({{$usu->id}})">
                                                                            Eliminar
                                                                        </button>

                                                                    </div>                                                                    
                                                                </td>
                                                            </tr>  
                                                        @endforeach                                              
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>                                      
                            </form>     
                        </blockquote>
                    </div>
                </div>
        <br>
    </div>  

     {{-- Modal Confirmación para eliminar --}}
     <div class="modal fade" id="exampleModal{{$usu->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmar borrado</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            ¿Seguro que desea borrar al usuario...?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, regresar</button>
            <button type="button" class="btn btn-primary">Sí, borrar</button>
            </div>
        </div>
        </div>
    </div>
    
 <!-- Modal de Colaboradores -->
 <div class="modal fade" id="modalColab">
    <div class="modal-dialog modal-modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Datos de usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
                <form action="{{route('soporte_edit',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">  
                    @csrf                  
                    @method('PUT')
                    </select>
                    <div class="row mb-3">
                        <span>Foto de perfil</span> 
                        <input type="file" name="imgPerfil" id="imgPerfil" class="form-control-file" accept="image/*">
                    </div>                

                    <div class="row mb-3">
                        <span>Nombre</span>
                        <input type="text" name="txtNombre" class="form-control" value="{{ Auth::user()->name }}" placeholder="" required>
                    </div>
                    <div class="row mb-3">
                        <span>Apellidos</span>
                        <input type="text" name="txtApellido" class="form-control" placeholder="" value="{{ Auth::user()->apellido }}" required>
                    </div>
                    <div class="row mb-3">
                        <span>Correo</span>
                        <input type="text" name="txtEmail" class="form-control" value="{{ Auth::user()->email }}" placeholder="" required>
                    </div>
                    <div class="row mb-3">
                        <span>Contraseña</span>
                        <input type="password" name="txtPass" class="form-control" placeholder="" value="">
                    </div>
                    <div class="row mb-3">
                        <span>Contraseña Nueva</span>
                        <input type="password" name="txtNewPass" class="form-control" placeholder="" value="">

                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Editar Datos</button>
                    </div>
                </form>                   
            </div>        
        </div>
      </div>
    </div>
</div>


{{-- Modal Menu Reportes --}}
<div class="modal" id="m_menu" aria-hidden="true" aria-labelledby="m_menu" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="m_menu">Menú de elección de reporte</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{-- CARDS --}}
            <div class="card-group">
                {{-- AUXILIARES --}}
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">Auxiliares</h5>
                    </div>
                    <div class="card-body">
                        <img src="img/auxiliar.png" class="card-img-top" alt="..." style="pointer-events:none;" >
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary form-control" data-bs-target="#m_auxiliar" data-bs-toggle="modal" data-bs-dismiss="modal">Generar</button>
                    </div>
                </div>
                {{-- DEPARTAMENTOS --}}
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">Departamentos</h5>
                    </div>
                    <div class="card-body">
                        <img src="img/empresa.png" class="card-img-top" alt="..." style="pointer-events:none;" >
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary form-control" data-bs-target="#m_departamento" data-bs-toggle="modal" data-bs-dismiss="modal">Generar</button>
                    </div>
                </div>
                 {{-- ESTATUS --}}
                 <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">Estatus</h5>
                    </div>
                    <div class="card-body">
                        <img src="img/s.png" class="card-img-top" alt="..." style="pointer-events:none;" >
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary form-control" data-bs-target="#m_estatus" data-bs-toggle="modal" data-bs-dismiss="modal">Generar</button>
                    </div>
                </div>
                {{-- FECHA --}}
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">Fecha</h5>
                    </div>
                    <div class="card-body">
                        <img src="img/c.png" class="card-img-top" alt="..." style="pointer-events:none;" >
                        <p class="card-text"><small class="text-muted">Last update 3 mins ago</small></p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary form-control" data-bs-target="#m_fechas" data-bs-toggle="modal" data-bs-dismiss="modal">Generar</button>
                    </div>
                </div>
              </div>
            </div>
            {{-- FIN CARDS --}}
        <div class="modal-footer text-center">
            <a href="{{route('d_pdf')}}" target="_blank">
                <button class="btn btn-primary">Reporte General</button>
            </a>
        </div>
      </div>
    </div>
  </div>
  {{-- Modal reporte auxiliar --}}
  <div class="modal fade" id="m_auxiliar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Auxiliares</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('reporte_aux')}}"  method="post">
                @csrf
                <div>
                    <select name="txtAux" class="form-select"  id="txtAux" aria-label="Default select example">
                        <option selected disabled>Seleccione el auxiliar a reportar...</option>
                        @foreach ($auxs as $aux)
                            <option value="{{$aux->id}}">{{$aux->name}} {{$aux->apellido}}</option>
                        @endforeach  
                    </select>
                </div>
                <div class="mt-2">
                        <button type="submit" class="btn btn-primary"> <i class="bi bi-download"></i> Descargar</button>
                
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" data-bs-target="#modalPrincipal" data-bs-toggle="modal" data-bs-dismiss="modal">Volver</button>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal reporte departamentos --}}
  <div class="modal fade" id="m_departamento" aria-hidden="true" aria-labelledby="m_clasificacion" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="m_clasificacion">Departamentos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('reporte_dpto')}}"  method="post">
                @csrf
                <div>
                    <select name="txtDepartamento" class="form-select"  id="txtDepartamento" aria-label="Default select example">
                        <option selected disabled>Seleccione el departamento a reportar...</option>
                        @foreach ($depa as $dep)
                            <option value="{{$dep->id_dpto}}">{{$dep->nombre}}</option>  
                        @endforeach                  
                    </select>
                </div>
                <div class="mt-2">
                        <button type="submit" class="btn btn-primary"> <i class="bi bi-download"></i> Descargar</button>
                
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" data-bs-target="#modalPrincipal" data-bs-toggle="modal" data-bs-dismiss="modal">Volver</button>
        </div>
      </div>
    </div>
  </div>


  {{-- Modal Reporte Fechas --}}
  <div class="modal fade" id="m_fechas" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Fechas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('reporte_date')}}" method="post">
                @csrf
                <div>
                    <select name="fechas" class="form-select"  id="fechas" aria-label="Default select example">
                        <option value="" selected disabled>Seleccione la fecha a reportar...</option>
                        @foreach ($dates as $date)
                            <option value="{{$date->Date}}">{{$date->Date}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary"> <i class="bi bi-download"></i> Descargar</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" data-bs-target="#modalPrincipal" data-bs-toggle="modal" data-bs-dismiss="modal">Volver</button>
        </div>
      </div>
    </div>
  </div>


  {{-- Modal Reporte Estatus --}}
  <div class="modal fade" id="m_estatus" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Fechas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('reporte_estatus')}}" method="post">
                @csrf
                <div>
                    <select name="estatuss" class="form-select"  id="fechas" aria-label="Default select example">
                        <option value="" selected disabled>Seleccione el estatus a reportar...</option>
                        @foreach ($estatus as $est)
                            <option value="{{$est->estatus}}">{{$est->estatus}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary"> <i class="bi bi-download"></i> Descargar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#modalPrincipal" data-bs-toggle="modal" data-bs-dismiss="modal">Volver</button>
            </div>
        </div>
     </div>
    </div>

    



<!--Javacript-->

<script>    
    function borrarUsuario(id) {
        // Mostrar alert de confirmación de borrado
        new Swal({
            title: "¿Está seguro que desea eliminar el usuario de ID: "+id+"?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar"

        })
        .then((willDelete) => {
            if (willDelete.isConfirmed) {
            // Hacer una llamada Ajax a la ruta borrado_log pasando el ID
            axios.put('/borrado_log/' + id)
                .then(function(response) {
                    // Si la respuesta es exitosa, recargar la página
                    location.reload();
                })
                .catch(function(error) {
                    location.reload();//LLave maestra
                    
                });
        }
        });
    }

</script>

    @yield('codigo')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-3M4QbEx9tI8KFtZrH3q3J2LgBV+JG8WxxKpFsfR1JnXpsof8+fV+ReL+zJezGbc7MvTUL+ak2cJ1bGYaYV7uXw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    
</body>
</html>