// default render page
$(document).ready(function() {
    var data = {member_id:"",member_name:""};
    generate_mini_info(data);
});

// render date datewise
$(document).on('click','#filter_mini_statement', function(){   
    var member_id = $('input#member_id').val();
    var member_name = $('input#member_name').val();
    var data = {member_id:member_id,member_name:member_name};
    generate_mini_info(data);
});

// generate Element Table
function generate_mini_info(element){	
    $.ajax({
        url: baseURL + 'admin/reports/generate_mini_stattement_information',
        data: {'member_id' : element.member_id,'member_name' : element.member_name},
        type: 'post', 
        dataType: 'json',
        beforeSend: function () {
            $('#generate_min_statements').html('<div class="text-center">'+
                '<i class="fa fa-spinner fa-pulse fa-4x fa-fw"></i></div>');
        },			 
        success: function (html) {
            var dataTable='<table id="mini_statement" class="table table-striped"'+
            'cellspacing="0" width="100%"></table>';
            $('#generate_min_statements').html(dataTable);		
            var table = $('#mini_statement').DataTable({
                data: html.data,
                "bPaginate": true,
                "bLengthChange": true,
                "pageLength" : 25,
                "lengthMenu" : [[10,25,50,100],[10,25,50,100]],
                "bFilter": false,
                "bInfo": true,
                "bAutoWidth": true,
                columns: [
                { title: "S.No", "width": "2%"},
                { title: "Date", "width": "12%"},
                { title: "Member id", "width": "17%"},
                { title: "Name", "width": "8%"},
                { title: "Phone", "width": "10%"},
                { title: "Address", "width": "12%"},				
                { title: "Amount", "width": "12%"}
                ],
                dom: 'lBfrtip',
                buttons: [
                //'copy','csv', 'excel', 'pdf', 'print'
                {
                    extend: 'excel',
                    className: 'btn btn-secondary',
                    titleAttr: 'Excel Export',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    filename: 'Min Statement Information',
                    title: 'Min Statement Information',
                    extension: '.xlsx'
                },
                {
                    extend: 'csv',
                    className: 'btn  btn-primary',
                    titleAttr: 'CSV Export',
                    text: '<i class="fa fa-bars"></i>',
                    filename: 'Min Statement Information',
                    title: 'Min Statement Information',
                    extension: '.csv'
                },
                {
                    extend: 'print',
                    customize: function (win) {
                        $(win.document.body)
                        .css('font-size', '10pt')
                        .prepend(
                        '<img src='+systemLogo+' style="position:absolute; top:0;'+
                        ' left:0;height:90px" />'
                        );
                        $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                    },
                    className: 'btn btn-secondary',
                    titleAttr: 'Print Export',
                    text: '<i class="fa fa-print"></i>',
                    title: '<h3>'+systemName+'</h3>'+
                    '<h4 class="text-center">Min Statement Information</h4>',
                },                
                ],
            });
        }		 
    });
}
// get DatePicker
$(document).on('focus', '.getDatePicker', function () {
    $(this).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        yearRange: "2012:2050"
    });
});