
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
                columns: [0,2,3,4,5,6,7,8]
            }
        },
        {
            extend: 'excelHtml5',
            exportOptions: {
                columns: [0,2,3,4,5,6,7,8]
            }
        },
        {
            extend: 'pdfHtml5',
            exportOptions: {
                columns: [0,2,3,4,5,6,7,8]
            }
        } ,
        
        {
            extend: 'print',
            exportOptions: {
                columns: [0,2,3,4,5,6,7,8]
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
                           
                         // paging: true,
                          //  scrollY: 400,
                            //"pageLength": 20,
                           // "pagingType": "full_numbers",
                            "columnDefs": [ 
                                                // {
                                                //      "width": "3%", 
                                                //      "searchable": false,
                                                //      "orderable": false,
                                                //      "targets": 0
                                                //  },
                                                 {
                                                     visible:false,
                                                     targets:1
                                                 },
                             
                                                 {
                                                    targets:[3,4,5,6,7,8,9,-1,10,11,12],
                                                    orderable: false
                                                },
                                                //  {
                                                //      targets:[8,9,10],
                                                //     width:"2%"
                                                // },
                                                // {
                                                //      targets:[2,7],
                                                //     width:"13%"
                                                // },
                                                //  {
                                                //     targets:3,
                                                //     width:"5%"
                                                // },
                                                //  {
                                                //      targets:[6],
                                                //      width:"7%"
                                                //  },      
                                                 {
                                                     "targets": -1,
                                                     "data": null,
                                                     orderable: false,
                                                    searchable: false,
                                                    render:function (data, type, row) {
                                                         var id = row.anganwadi_id;
                                               
                                                            return '<a href="anganwadis/edit/'+ id +'">Edit</a>|<a class="delete" id="'+ id +'" href="#">Delete</a>';
                                                             }
                                                 
                                            
                                                 } 
                                             ],
                          "order": [[ 2, 'asc' ]],
                          dom: '<"row"B>lfrtip',
                        //   buttons: [
                        //     {
                        //         extend: 'copyHtml5',
                        //         exportOptions: {
                        //             columns: [1,2,3,4,5,6,7]
                        //         }
                        //     },
                        //     {
                        //         extend: 'excelHtml5',
                        //         exportOptions: {
                        //             columns: [1,2,3,4,5,6,7]
                        //         }
                        //     },
                        //     {
                        //         extend: 'pdfHtml5',
                        //         exportOptions: {
                        //             columns: [1,2,3,4,5,6,7]
                        //         }
                        //     } ,
                            
                        //     {
                        //         extend: 'print',
                        //         exportOptions: {
                        //             columns: [1,2,3,4,5,6,7]
                        //         }
                        //     }   
                       // ],
                         
                     
                 });
 
//     //myTable.ajax.reload();
 
//    //myTable.ajax.draw();
   myTable.on( 'order.dt search.dt', function () {
        myTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
        } );
    } ).draw();
    console.log("setup");
    $('#indexTable tbody').off('click', 'a.delete').on('click', 'a.delete', function(){

        var rowid = $(this).attr('id');
        console.log(rowid);
        if(confirm("Are you sure you want to Delete record id = " + rowid + "this data?"))
        {
            $.ajax({
                url:"http://localhost:8765/anganwadis/ajaxDelete.json",
                type:"post",
                data:{"id":rowid},
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                   beforeSend: function(xhr){
                   xhr.setRequestHeader('X-CSRF-Token', csrfToken);
                              
                    },
                success:function(data)
                {
                    alert(data);
                    myTable.ajax.reload();
                },
                error: function(error) {
                    alert(error);
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