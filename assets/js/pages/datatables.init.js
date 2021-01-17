
$(document).ready(function() {
    var table = $('#datatable-buttons').DataTable( {
        dom: 'Bfrtip',
        lengthChange: !1, 
        buttons: [
             'excel'
        ],language: {
            "search": "ابحث هنا ",
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            }
        },
        drawCallback: function() {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }
    });
    table.buttons().container()
    .appendTo( '#datatable-buttons_wrapper  .col-md-6:eq(0)' );
    $('.dataTables_filter input').addClass('form-control form-control-sm');
    $('.dt-buttons button').addClass('btn btn-secondary buttons-copy buttons-html5');
    $('.dt-buttons').addClass('col-md-2');
    $('.dataTables_filter').addClass('col-md-6');

    $('.dataTables_wrapper').addClass('row');
 } );

 