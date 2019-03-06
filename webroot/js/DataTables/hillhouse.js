
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
            targets:[1,4]
        },
     
        {
            targets:[3,5,6,-1],
            orderable: false
        },
        {
            targets:[4,1],
            searchable:false
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
                columns:  [2,3,5,6]
            }
        },
        {
            extend: 'excelHtml5',
            exportOptions: {
                columns:  [2,3,5,6]
            }
        },
        {
            extend: 'pdfHtml5',
            exportOptions: {
                columns:  [2,3,5,6]
            }
        } ,
        
        {
            extend: 'print',
           // autoPrint:false,
            exportOptions: {
                columns:  [2,3,5,6]
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
 //alert($(this).val());
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
                           {data:'village_code'},
                           {data:'village.village_name'},
                           {data:'reference_year'},
                           {data:'counting_agency'},
                           {data:'total_population'},
                           {data:'total_household'},
                           {data:null}
                    ],
                    language: {
                         "loadingRecords": "Please wait - loading..."
                     },
                           
                         
                            "columnDefs": [ 
                                                
                                                 {
                                                     visible:false,
                                                     targets:[1,4]
                                                 },
                             
                                                 {
                                                    targets:[3,5,6,-1],
                                                    orderable: false
                                                },
                                                {
                                                    targets:[4,1],
                                                    searchable:false
                                                },
                                                   
                                                 {
                                                     "targets": -1,
                                                     "data": null,
                                                     orderable: false,
                                                    searchable: false,
                                                    render:function (data, type, row) {
                                                         var ref = row.reference_year;
                                                         var villcode=row.village_code;
                                                         var agency=row.counting_agency;
                                               
                                                            return '<a href="hillhouse/edit/'+ ref+'/'+villcode+'/'+agency +'">Edit</a>|<a class="delete" id="'+ ref+'-'+villcode+'-'+agency +'"  href="#">Delete</a>';
                                                             }
                                                 
                                            
                                                 } 
                                             ],
                          "order": [[ 2, 'asc' ]],
                          dom: '<"row"B>lfrtip',
                          buttons: [
                            {
                                extend: 'copyHtml5',
                                exportOptions: {
                                    columns: [2,3,5,6]
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns:  [2,3,5,6]
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns:  [2,3,5,6]
                                }
                            } ,
                            
                            {
                                extend: 'print',
                                //autoPrint:false,
                                exportOptions: {
                                    columns:  [2,3,5,6]
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
        var delimeter = '-';

        

        var splitted = rowid.split(delimeter);
        var refYr=splitted[0];
        var villcode=splitted[1];
        var cAgency = splitted[2];
        //console.log(splitted[0]); 
        //console.log(splitted[1]);
        //console.log(splitted[2]);//alert the part1
        var deleteUrl=$('input[name^="deleteUrl"]').val();
        //console.log(deleteUrl);
       // console.log(rowid);
        if(confirm("Are you sure you want to Delete record id = " + rowid + "this data?"))
        {
            $.ajax({
                url:"hillhouse/ajaxDelete.json",
               // url:deleteUrl,
                type:"post",
                data:{"ref":refYr,"village_code":villcode,"counting_agency":cAgency},
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