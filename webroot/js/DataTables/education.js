
$(document).ready(function(){
    var csrfToken=$('input[name^="_csrfToken"]').val();
var t =$('#indexTable').DataTable( {

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
            targets:[3,4,5,6,7,8,9,-1,10,11,12,13,14,15,16,17,18],
            orderable: false
        },
        {
            targets:[2,-1],
            width:"10%"
        },
        // {
        //     targets:[2,7],
        //     width:"13%"
        // },
        // {
        //     targets:3,
        //     width:"5%"
        // },
        // {
        //     targets:[6],
        //     width:"7%"
        // }   
        
             
        
        
      ],
   "order": [[2, 'asc' ]],
    dom: '<"row"B>lfrtip',
    buttons: [
        {
            extend: 'copyHtml5',
            exportOptions: {
                columns: [2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18]
            }
        },
        {
            extend: 'excelHtml5',
            exportOptions: {
                columns: [2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18]
            }
        },
        {
            extend: 'pdfHtml5',
            exportOptions: {
                columns: [2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18]
            }
        } ,
        
        {
            extend: 'print',
           // autoPrint:false,
            exportOptions: {
                columns: [2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18]
               // title:'Anganwadis Village DATA'
                
            }
        }   
    ],
  
   
} );

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
                        // "url": "http://localhost:876/anganwadis/ajaxFilterSubdivision.json",
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
                            {data:'education_infra_id'},
                            {data:'village.village_name'},
                            {data:'education_reference_year'},
                            {data:'total_govt_school'},
                            {data:'total_adc_school'},
                            {data:'total_private_school'},
                            {data:'total_primary_school'},
                            {data:'total_primary_student'},
                            {data:'total_primary_teacher'},
                            {data:'total_jhs'},
                            {data:'total_jhs_student'},
                            {data:'total_jhs_teacher'},
                            {data:'total_secondary_school'},
                            {data:'total_secondary_student'},
                            {data:'total_secondary_teacher'},
                            {data:'total_hrsec_school'},
                            {data:'total_hrsec_student'},
                            {data:'total_hrsec_teacher'},
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
                                                    targets:[3,4,5,6,7,8,9,-1,10,11,12,13,14,15,16,17,18],
                                                    orderable: false
                                                },
                                                   
                                                 {
                                                     "targets": -1,
                                                     "data": null,
                                                     orderable: false,
                                                    searchable: false,
                                                    render:function (data, type, row) {
                                                         var id = row.education_infra_id;
                                               
                                                            return '<a href="education-infras/edit/'+ id +'">Edit</a>|<a class="delete" id="'+ id +'"  href="#">Delete</a>';
                                                             }
                                                 
                                            
                                                 } 
                                             ],
                          "order": [[ 2, 'asc' ]],
                          dom: '<"row"B>lfrtip',
                          buttons: [
                            {
                                extend: 'copyHtml5',
                                exportOptions: {
                                    columns: [2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18]
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18]
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18]
                                }
                            } ,
                            
                            {
                                extend: 'print',
                               // autoPrint:false,
                                exportOptions: {
                                    columns: [2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18]
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
        console.log(rowid);
       // console.log(rowid);
        if(confirm("Are you sure you want to Delete record id = " + rowid + "this data?"))
        {
            $.ajax({
                url:"education-infras/ajaxDelete.json",
               // url:deleteUrl,
                type:"post",
                data:{"id":rowid},
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                   beforeSend: function(xhr){
                   xhr.setRequestHeader('X-CSRF-Token', csrfToken);
                              
                    },
                success:function(data)
                {
                    alert('Village Data ' + data);
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