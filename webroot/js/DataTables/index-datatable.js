
$(document).ready(function(){
    var csrfToken=$('input[name^="_csrfToken"]').val();
var t =$('#indexTable').DataTable( {

    paging: true,
    scrollY: 400,
    bScrollCollapse: false,
    //"pageLength": 20,
    "pagingType": "full_numbers",
    "columnDefs": [ {
         "width": "5%", 
        "searchable": false,
        "orderable": false,
        "targets": 0
         },
         {"width":"5%","targets":2},
        //  {
        //     "targets": -1,
        //     "data": null,
        //     "defaultContent": "<button class=\"button small\" style=\"padding:0\">Edit!</button>"
        // } ,
        // { orderable: false, searchable: false, targets: -1 }
        
        
      ],
   "order": [[1, 'asc' ]],
    dom: '<"row"B>lfrtip',
    buttons: [
        {
            extend: 'copyHtml5',
            exportOptions: {
                columns: [1,2,3,4,5,6,7]
            }
        },
        {
            extend: 'excelHtml5',
            exportOptions: {
                columns: [1,2,3,4,5,6,7]
            }
        },
        {
            extend: 'pdfHtml5',
            exportOptions: {
                columns: [1,2,3,4,5,6,7]
            }
        } ,
        
        {
            extend: 'print',
            exportOptions: {
                columns: [1,2,3,4,5,6,7]
            }
        }   
    ],
    // buttons: [
    //     'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5','print'
    // ]
   
} );

t.on( 'order.dt search.dt', function () {
    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
} ).draw();


$('#subdivision').on('change', function(){
 alert("inside function");

 
 
    var myTable = $('#indexTable').DataTable({
                    // "serverSide": true,
                    "processing": true,
                     "destroy": true,
                     //retrieve: true,
                   //  "deferRender": true,
                     "ajax": {
                         "type":"post",
                         "url": "http://localhost:8765/anganwadis/ajaxFilterSubdivision.json",
                         data: {"subdistrict_code":$(this).val()},
                         beforeSend: function(xhr){
                            xhr.setRequestHeader('X-CSRF-Token', csrfToken);
                            console.log($('input[name^="_csrfToken"]').val());
                           
                            },
                            dataSrc: ''
                        },
                       columns:[
                           {data:null},
                           {data:'village.village_name'},
                           {data:'anganwadi_reference_year'},
                           {data:'total_anganwadi_centre'},
                           {data:'total_anganwadi_worker'},
                           {data:'total_enrolled_children'},
                           {data:'anganwadi_worker_name'},
                           {data:'worker_mobile'},
                           {data:null}
                    ],
                    language: {
                         "loadingRecords": "Please wait - loading..."
                     },
                           
                         // paging: true,
                          //  scrollY: 400,
                            //"pageLength": 20,
                           // "pagingType": "full_numbers",
                            "columnDefs": [ {
                                            "width": "5%", 
                                             "searchable": false,
                                             "orderable": false,
                                             "targets": 0
                                            },
                                            {"width":"5%","targets":2},
                                         {
                                             "targets": -1,
                                             "data": null,
                                             orderable: false,
                                             searchable: false,
                                             render:function (data, type, row) {
                                                var id = row.anganwadi_reference_year;
                                                return '<a href="anganwadis/edit/"+ id + ">EDIT</a>';
                                                     }
                                                 
                                            // "defaultContent": "<div class=\"row\">"+ editbutton +"</div>"
                                            // "defaultContent": "<div class=\"row\"><a href=\"#\">Edit!</a><a href=\"#\">Delete!</a></div>"
                                             } ,
                                             ],
                         // "order": [[ 1, 'asc' ]],
                          dom: '<"row"B>lfrtip',
                          buttons: [
                            {
                                extend: 'copyHtml5',
                                exportOptions: {
                                    columns: [1,2,3,4,5,6,7]
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [1,2,3,4,5,6,7]
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [1,2,3,4,5,6,7]
                                }
                            } ,
                            
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [1,2,3,4,5,6,7]
                                }
                            }   
                        ],
                         
                     
                 });
 
//     //myTable.ajax.reload();
 
//    //myTable.ajax.draw();
   myTable.on( 'order.dt search.dt', function () {
        myTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
        } );
    } ).draw();
 });



});