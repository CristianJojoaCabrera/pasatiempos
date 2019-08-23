<div class="modal fade"  id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display:inline">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4>FORMULARIO CREACION DE HOBBY</h4>
            </div>
            <form action="" id="formHobby">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Descripcción de Hobby</label>
                            <textarea id="descripcion" name="descripcion" class="md-textarea form-control" rows="3"></textarea>
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
                <h4>FORMULARIO EDICCIÓN DE HOBBY</h4>
            </div>
            <form action="" id="formHobbyEditar">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Descripcción de Hobby</label>
                            <textarea id="descripcionEditar" name="descripcionEditar" class="md-textarea form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-success">Editar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="card">
    <div class="card-header">Bienvenido {{Auth::user()->user_name}} (panel de registro y lista de pasa tiempos)</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <button class="btn-primary" data-toggle="modal" data-target="#myModal">Crear Hobby</button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12" id="datatableDeportistasDiv">
                <table id="dataTableHobbies" class="display responsive no-wrap" width="100%">
                    <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Descripcción Hobby</th>
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
            var idUserHobby;
            var idUser = '{{Auth::user()->id}}';
            var tableHobbies = $('#dataTableHobbies').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                fixedHeader: true,
                ajax: '{{route('usuarios_hobbies_tbl')}}'+'/'+idUser,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                },
                columns: [
                    {data:'DT_RowIndex',className :'text-center'},
                    {data:'name'},
                    {data: 'Accion',className :'text-center',searchable: false,},

                ]

            });
            tableHobbies.on('click', '.editar', function (e) {
                $tr = $(this).closest('tr');
                let dataTable = tableHobbies.row($tr).data();
                console.log(dataTable)
                idUserHobby = dataTable.id;
                $('#descripcionEditar').val(dataTable.name);
            });
            tableHobbies.on('click', '.eliminar', function (e) {
                $tr = $(this).closest('tr');
                let dataTable = tableHobbies.row($tr).data();
                console.log(dataTable)

                let route = "{{ route('delete_user_hobby') }}";
                let formDatas = new FormData();
                formDatas.append('id',dataTable.id);
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
                            tableHobbies.ajax.reload();
                            alert('Hobby eliminado');

                        }else{
                            alert('algo salio mal');
                        }

                    },
                    error: function (response, xhr, request) {
                        alert('algo salio mal');
                    }
                });

            });
            var create = function () {
                return {
                    init: function () {
                        console.log('oasjkdas');
                        let route = "{{ route('register_hobby') }}";
                        let formDatas = new FormData();
                        formDatas.append('name',$('#descripcion').val());

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
                                    $('#formHobby')[0].reset();
                                    tableHobbies.ajax.reload();
                                    $('#myModal').modal('hide');
                                    alert('hobby registrado');

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
            var form = $('#formHobby');
            var rules = {
                descripcion: {
                    required: true
                },

            };
            var messages = {
                descripcion: {
                    required: 'Campo requerido'
                },

            };
            FormValidationMd.init(form, rules, messages, create());

            var editar = function () {
                return {
                    init: function () {
                        console.log('oasjkdas');
                        let route = "{{ route('edit_user_hobby') }}";
                        let formDatas = new FormData();
                        formDatas.append('id',idUserHobby);
                        formDatas.append('name',$('#descripcionEditar').val());
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
                                    $('#formHobbyEditar')[0].reset();
                                    tableHobbies.ajax.reload();
                                    $('#editarModal').modal('hide');
                                    alert('Hobby editado');

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
            var form = $('#formHobbyEditar');
            var rules = {
                descripcionEditar: {
                    required: true
                },
            };
            var messages = {
                descripcionEditar: {
                    required: 'Campo requerido'
                }
            };
            FormValidationMd.init(form, rules, messages, editar());
        });
    </script>
@endsection
