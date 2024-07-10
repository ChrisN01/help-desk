var tabla;
var user_id = $('#user_id').val();
var rol_id = $('#rol_id').val();
console.log('Hoola')
var url ='';
function init() {
    
}

$(document).ready(function(){

    if(rol_id ==1){
        url = '../../controller/ticket.php?op=get_ticket_by_user';
    }
    else{
        url = '../../controller/ticket.php?op=get_tickets';
    }

   tabla= $('#ticket_data').dataTable({

    "aProcessing": true,
    "aServerSide": true,
    dom: 'Bfrtip',
    "searching": true,
    lengthChange: false,
    colReorder: true,
    buttons: [		          
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
            ],
            "ajax":{
                url: url,
                type : "post",
                dataType : "json",	
                data: rol_id == 1 ? { user_id: user_id } : {},					
                error: function(e){
                    console.log(e.responseText);	
                }
            },
            "ordering": true,
            "bDestroy": true,
            "responsive": true,
            "bInfo":true,
            "iDisplayLength": 10,
            "autoWidth": false,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }    

   }).DataTable();

});


function show(ticket_id) {
    console.log(ticket_id)
    
}

init();