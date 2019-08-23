<div class="modal fade"  id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="display:inline">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>FORMULARIO CREACION DE USUARIOS</h4>
                </div>
                <form action="" id="form1">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nombre</label>
                                <input name="nombre" id="nombre" type="text"
                                       class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Nombre Usuario</label>
                                <input name="nombreUsuario" id="nombreUsuario" type="text"
                                       class="form-control ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Contraseña</label>
                                <input name="contrasena" id="contrasena" type="text"
                                       class="form-control ">
                            </div>
                            <div class="col-md-6">
                                <label>Confirmar Contraseña</label>
                                <input name="contrasenaConfirmar" id="contrasenaConfirmar" type="text"
                                       class="form-control ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Correo</label>
                                <input name="correo" id="correo" type="email"
                                       class="form-control ">
                            </div>
                            <div class="col-md-6">
                                <label>Ciudad</label>
                                <input name="ciudad" id="ciudad" type="text"
                                       class="form-control ">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<div class="modal fade"  id="editarModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display:inline">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4>EDICCION DE USUARIO</h4>
            </div>
            <form action="" id="formEditar">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nombre</label>
                            <input name="nombreEditar" id="nombreEditar" type="text"
                                   class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Nombre Usuario</label>
                            <input name="nombreUsuarioEditar" id="nombreUsuarioEditar" type="text"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Correo</label>
                            <input name="correoEditar" id="correoEditar" type="email"
                                   class="form-control ">
                        </div>
                        <div class="col-md-6">
                            <label>Ciudad</label>
                            <input name="ciudadEditar" id="ciudadEditar" type="text"
                                   class="form-control ">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade"  id="pasatiempoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display:inline">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4>EDICCION DE USUARIO</h4>
            </div>
            <form action="" id="formEditar">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nombre</label>
                            <input name="nombreEditar" id="nombreEditar" type="text"
                                   class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Nombre Usuario</label>
                            <input name="nombreUsuarioEditar" id="nombreUsuarioEditar" type="text"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Correo</label>
                            <input name="correoEditar" id="correoEditar" type="email"
                                   class="form-control ">
                        </div>
                        <div class="col-md-6">
                            <label>Ciudad</label>
                            <input name="ciudadEditar" id="ciudadEditar" type="text"
                                   class="form-control ">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="card">
    <div class="card-header">Bienvenido {{Auth::user()->user_name}} (Administrador)</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <button class="btn-primary" data-toggle="modal" data-target="#myModal">Crear usuario</button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12" id="datatableDeportistasDiv">
                <table id="dataTableUsers" class="display responsive no-wrap" width="100%">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Nombre Usuario</th>
                        <th>Correo</th>
                        <th>Ciudad</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('javascript')
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/af-2.3.2/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.css"/>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/af-2.3.2/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>

    <script>
    $(document).ready(function(){
        var idUser;
        var tableUser = $('#dataTableUsers').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            fixedHeader: true,
            ajax: '{{route('usuarios_tbl')}}',
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            columns: [
                {data:'name'},
                {data:'user_name'},
                {data:'email'},
                {data:'city'},
                {data: 'Accion',className :'text-center',searchable: false,},

            ]

        });
        tableUser.on('click', '.pasatiempo', function (e) {
            $tr = $(this).closest('tr');
            let dataTable = tableUser.row($tr).data();
            console.log(dataTable)

        });
        tableUser.on('click', '.editar', function (e) {
            $tr = $(this).closest('tr');
            let dataTable = tableUser.row($tr).data();
            console.log(dataTable)
            idUser = dataTable.id;
            $('#nombreEditar').val(dataTable.name);
            $('#nombreUsuarioEditar').val(dataTable.user_name);
            $('#correoEditar').val(dataTable.email);
            $('#ciudadEditar').val(dataTable.city);
        });
        var create = function () {
            return {
                init: function () {
                    console.log('oasjkdas');
                    let route = "{{ route('register_user') }}";
                    let formDatas = new FormData();
                    formDatas.append('name',$('#nombre').val());
                    formDatas.append('name_user',$('#nombreUsuario').val());
                    formDatas.append('password',$('#contrasena').val());
                    formDatas.append('passwordConfirm',$('#contrasenaConfirmar').val());
                    formDatas.append('email',$('#correo').val());
                    formDatas.append('city',$('#ciudad').val());
                    $.ajax({
                        url: route,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        cache: false,
                        type: 'POST',
                        contentType: false,
                        data: formDatas,
                        processData: false,
                        beforeSend: function () {

                        },
                        success: function (response, xhr, request) {
                            if(request.status === 200){
                                $('#form1')[0].reset();
                                tableUser.ajax.reload();
                                $('#myModal').modal('hide');
                                alert('usario registrado');

                            }else{
                                alert('algo salio mal');
                            }

                        },
                        error: function (response, xhr, request) {
                            alert('algo salio mal');
                        }
                    });
                }
            }
        };
        var form = $('#form1');
        var rules = {
            nombre: {
                required: true
            },
            nombreUsuario: {
                required: true
            },
            contrasena: {
                required: true
            },
            contrasenaConfirmar:{
                required:true
            },
            correo:{
                required:true
            },
            ciudad:{
                required:true
            },
        };
        var messages = {
            nombre: {
                required: 'Campo requerido'
            },
            nombreUsuario: {
                required: 'Campo requerido'
            },
            contrasena: {
                required: 'Campo requerido'
            },
            contrasenaConfirmar:{
                required: 'Campo requerido'
            },
            correo:{
                required: 'Campo requerido'
            },
            ciudad:{
                required: 'Campo requerido'
            },

        };
        FormValidationMd.init(form, rules, messages, create());

        var editar = function () {
            return {
                init: function () {
                    console.log('oasjkdas');
                    let route = "{{ route('edit_user') }}";
                    let formDatas = new FormData();
                    formDatas.append('id',idUser);
                    formDatas.append('name',$('#nombreEditar').val());
                    formDatas.append('name_user',$('#nombreUsuarioEditar').val());
                    formDatas.append('email',$('#correoEditar').val());
                    formDatas.append('city',$('#ciudadEditar').val());
                    $.ajax({
                        url: route,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        cache: false,
                        type: 'POST',
                        contentType: false,
                        data: formDatas,
                        processData: false,
                        beforeSend: function () {

                        },
                        success: function (response, xhr, request) {
                            if(request.status === 200){
                                $('#formEditar')[0].reset();
                                tableUser.ajax.reload();
                                $('#editarModal').modal('hide');
                                alert('usario editado');

                            }else{
                                alert('algo salio mal');
                            }

                        },
                        error: function (response, xhr, request) {
                            alert('algo salio mal');
                        }
                    });
                }
            }
        };
        var form = $('#formEditar');
        var rules = {
            nombreEditar: {
                required: true
            },
            nombreUsuarioEditar: {
                required: true
            },
            correoEditar:{
                required:true
            },
            ciudadEditar:{
                required:true
            },
        };
        var messages = {
            nombreEditar: {
                required: 'Campo requerido'
            },
            nombreUsuarioEditar: {
                required: 'Campo requerido'
            },
            correoEditar:{
                required: 'Campo requerido'
            },
            ciudadEditar:{
                required: 'Campo requerido'
            },

        };
        FormValidationMd.init(form, rules, messages, editar());


    });
</script>
@endsection
