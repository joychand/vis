
$(document).ready(function(){
    var csrfToken=$('input[name^="_csrfToken"]').val();
var t =$('#village').DataTable( {

    paging: true,
    scrollY: 400,
    //"pageLength": 20,
    "pagingType": "full_numbers",
    "columnDefs": [ {
         "width": "20%", 
        "searchable": false,
        "orderable": false,
        "targets": 0
    } ],
   "order": [[ 1, 'asc' ]],
    dom: '<"row"B>lfrtip',
    buttons: [
        'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5','print'
    ]
    // initComplete: function () {
    //     this.api().columns([1,2]).every( function () {
    //         var column = this;
    //         var select = $('<select><option value=""></option></select>')
    //             .appendTo( $(column.header()).empty() )
    //             .on( 'change', function () {
    //                 var val = $.fn.dataTable.util.escapeRegex(
    //                     $(this).val()
    //                 );

    //                 column
    //                     .search( val ? '^'+val+'$' : '', true, false )
    //                     .draw();
    //             } );

    //         column.data().unique().sort().each( function ( d, j ) {
    //             select.append( '<option value="'+d+'">'+d+'</option>' )
    //         } );
    //     } );
    // }




} );
//var info=t.page.info();
//$('#villageno').html(info.recordsDisplay);
t.on( 'order.dt search.dt', function () {
    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
} ).draw();

// t.columns([2]).every( function () {
//     $('#subdivision').on('change', function () {
//         if( $(this).val()){
//             t.search($('#subdivision option:selected').text()).draw();
//             info = t.page.info();
//            // alert(info.recordsDisplay);
//             $('#villageno').html(info.recordsDisplay)
//         }
//        else{
//         t.search(this.value).draw();
//         //alert(t.rows().count());
//         $('#villageno').html(info.recordsDisplay)
//        }
//     });
// });
$('#subdivision').on('change', function(){
 alert("inside function");

 
 
    var myTable = $('#village').DataTable({
                    // "serverSide": true,
                    // "processing": true,
                     "destroy": true,
                     //retrieve: true,
                   //  "deferRender": true,
                     "ajax": {
                         "type":"post",
                         "url": "http://localhost:8765/dashboard/ajaxGetvillage/HealthInfras.json",
                         beforeSend: function(xhr){
                            xhr.setRequestHeader('X-CSRF-Token', csrfToken);
                            console.log($('input[name^="_csrfToken"]').val());
                           
                            },
                            dataSrc: ''
                        },
                       columns:[
                           {data:null},
                           {data:'village_name'},
                           {data:'subdistrict.subdistrict_name'}
                    ],
                           
                          paging: true,
                            scrollY: 400,
                            //"pageLength": 20,
                            "pagingType": "full_numbers",
                            "columnDefs": [ {
                                            "width": "20%", 
                                             "searchable": false,
                                             "orderable": false,
                                             "targets": 0
                                            } ],
                          "order": [[ 1, 'asc' ]],
                          dom: '<"row"B>lfrtip',
                            // buttons: [
                            //         'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5','print'
                            //         ],
                         
                     
                 });
 
    //myTable.ajax.reload();
 
   //myTable.ajax.draw();
   myTable.on( 'order.dt search.dt', function () {
        myTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
        } );
    } ).draw();
 });



});