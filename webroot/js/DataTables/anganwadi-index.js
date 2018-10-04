
$(document).ready(function(){
    var csrfToken=$('input[name^="_csrfToken"]').val();
var t =$('#indexTable').DataTable( {
    // "initComplete": function(settings, json) {
    //     $('table#indexTable').show();
    //     },
    paging: true,
   // scrollY: 400,
    bScrollCollapse: false,
    //"pageLength": 20,
    "pagingType": "full_numbers",
    "columnDefs": [
        {
            "width": "3%", 
           "searchable": false,
           "orderable": false,
           "targets": 0
        },
        {
            visible:false,
            targets:1
        },
     
        {
            targets:[3,4,5,6,7,8,9,-1,10,11,12],
            orderable: false
        },
        {
            targets:[8,9,10],
            width:"2%"
        },
        {
            targets:[2,7],
            width:"13%"
        },
        {
            targets:3,
            width:"5%"
        },
        {
            targets:[6],
            width:"7%"
        }   
        
             
        
        
      ],
   "order": [[2, 'asc' ]],
    dom: '<"row"B>lfrtip',
    buttons: [
        {
            extend: 'copyHtml5',
            exportOptions: {
                columns: [2,3,4,5,6,7,8,9,10,11]
            }
        },
        {
            extend: 'excelHtml5',
            exportOptions: {
                columns: [2,3,4,5,6,7,8,9,10,11]
            }
        },
        {
            extend: 'pdfHtml5',
            exportOptions: {
                columns: [2,3,4,5,6,7,8,9,10,11]
            }
        } ,
        
        {
            extend: 'print',
           // autoPrint:false,
            exportOptions: {
                columns: [2,3,4,5,6,7,8,9,10,11],
               // title:'Anganwadis Village DATA'
                
            }
        }   
    ],
  
   
} );
//$('#indexTable').show();
//setTimeout(function () { $("#indexTable").show() }, 50);
t.on( 'order.dt search.dt', function () {
    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
} ).draw();


$('#subdivision').on('change', function(){
 //alert("inside function");
 var targeturl=$(this).attr('rel');
 
 
    var myTable = $('#indexTable').DataTable({
                    // "serverSide": true,
                    "processing": true,
                     "destroy": true,
                     //retrieve: true,
                   //  "deferRender": true,
                     "ajax": {
                         "type":"post",
                        //"url": "anganwadis/ajaxFilterSubdivision.json",
                        "url": targeturl,
                         data: {"subdistrict_code":$(this).val()},
                        
                         beforeSend: function(xhr){
                            xhr.setRequestHeader('X-CSRF-Token', csrfToken);
                            console.log($('input[name^="_csrfToken"]').val());
                           
                            },
                            dataSrc: ''
                        },
                       columns:[
                           {data:null},
                           {data:'anganwadi_id'},
                           {data:'village.village_name'},
                           {data:'anganwadi_reference_year'},
                           {data:'total_anganwadi_centre'},
                           {data:'total_anganwadi_worker'},
                           {data:'total_enrolled_children'},
                           {data:'anganwadi_worker_name'},
                           {data:'worker_mobile'},
                           {data:'first_qtr_pregnant'},
                           {data:'second_qtr_pregnant'},
                           {data:'third_qtr_pregnant'},
                           {data:null}
                    ],
                    language: {
                         "loadingRecords": "Please wait - loading..."
                     },
                           
                         
                            "columnDefs": [ 
                                                
                                                 {
                                                     visible:false,
                                                     targets:1
                                                 },
                             
                                                 {
                                                    targets:[3,4,5,6,7,8,9,-1,10,11,12],
                                                    orderable: false
                                                },
                                                   
                                                 {
                                                     "targets": -1,
                                                     "data": null,
                                                     orderable: false,
                                                    searchable: false,
                                                    render:function (data, type, row) {
                                                         var id = row.anganwadi_id;
                                               
                                                            return '<a href="anganwadis/edit/'+ id +'">Edit</a>|<a class="delete" id="'+ id +'"  href="#">Delete</a>';
                                                             }
                                                 
                                            
                                                 } 
                                             ],
                          "order": [[ 2, 'asc' ]],
                          dom: '<"row"B>lfrtip',
                          buttons: [
                            {
                                extend: 'copyHtml5',
                                exportOptions: {
                                    columns: [2,3,4,5,6,7,8,9,10,11]
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [2,3,4,5,6,7,8,9,10,11]
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [2,3,4,5,6,7,8,9,10,11]
                                }
                            } ,
                            
                            {
                                extend: 'print',
                                //autoPrint:false,
                                exportOptions: {
                                    columns: [2,3,4,5,6,7,8,9,10,11],
                                   // title:'Anganwadis Village DATA'
                                    
                                }
                            }   
                        ]
                        
                     
                 });
 
//     //myTable.ajax.reload();
 
//    //myTable.ajax.draw();
   myTable.on( 'order.dt search.dt', function () {
        myTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
        } );
    } ).draw();
    //console.log("setup");
    $('#indexTable tbody').off('click', 'a.delete').on('click', 'a.delete', function(){

        var rowid = $(this).attr('id');
        var deleteUrl=$('input[name^="deleteUrl"]').val();
        //console.log(deleteUrl);
       // console.log(rowid);
        if(confirm("Are you sure you want to Delete record id = " + rowid + "this data?"))
        {
            $.ajax({
                url:"anganwadis/ajaxDelete.json",
               // url:deleteUrl,
                type:"post",
                data:{"id":rowid},
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                   beforeSend: function(xhr){
                   xhr.setRequestHeader('X-CSRF-Token', csrfToken);
                              
                    },
                success:function(data)
                {
                    alert('Village Data '+data);
                    myTable.ajax.reload();
                },
                error: function(error) {
                    alert('Delete fail' +error.statusText);
                    //console.log(error);
                    myTable.ajax.reload();
                }
            })
        }
        else
        {
            return false;
        }
    }); 
 });



});