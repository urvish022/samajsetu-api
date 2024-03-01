function view_business_table(view_url)
{
  dataTable = $('#business_datatable').DataTable({
            dom: 'Bfrtip',
            "destroy": true,
            lengthMenu: [[10, 20, 30, -1], [10, 20, 30, "All"]],
               buttons: [
                {
                    extend: 'pageLength',
                }
        ],
        ajax: {
            "url":  view_url,
            "type": "POST",
            "dataType": "JSON"
        },
        "columns": [
            { "data": null },
            { "data": "bc_eng_name" },
            { "data": " " }
    ],
    "columnDefs": [ {
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='btn-group m-r-5 m-b-5'><a href='javascript:;' data-toggle='dropdown' aria-expanded='true' class='btn red dropdown-toggle form-control'>Action <span class='caret'></span></a><ul class='dropdown-menu'><li><a id='td_update'><i class='fa fa-pencil'></i>&nbsp;&nbsp;Edit</a></li><li><a id='td_delete' href='#modal_theme_danger' data-toggle='modal'><i class='fa fa-trash'></i>&nbsp;&nbsp;Delete</a></li></ul></div>",
    },
    {
        "targets":[0],
        "visible": true,
        "searchable": true
    }],
    "order": [[ 1, "asc" ]], 
});
dataTable.on( 'order.dt search.dt', function () {
   dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
        dataTable.cell(cell).invalidate('dom');
    } );
}).draw();
$('#business_datatable tbody').on( 'click', '#td_update', function () { 
            var data = dataTable.row($(this).parents('tr')).data();
            $('#bc_id').val(data.bc_id);
            $('#bc_eng_name').val(data.bc_eng_name);
            $('#bc_guj_name').val(data.bc_guj_name);
    });
}
function view_bday_table(view_url,send_notifications)
{
  dataTable = $('#bday_dataTable').DataTable({
            dom: 'Bfrtip',
            "destroy": true,
            lengthMenu: [[10, 20, 30, -1], [10, 20, 30, "All"]],
               buttons: [
                {
                    extend: 'pageLength',
                }
        ],
        ajax: {
            "url":  view_url,
            "type": "POST",
            "dataType": "JSON"
        },
        "columns": [
            { "data": "no" },
            { "data": "full_name_eng" },
            { data: null, render: function ( data, type, row ) {
                return customjs_date(data.birth_date);
            } },
            { "data": " " }
    ],
    "columnDefs": [ {
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='btn-group m-r-5 m-b-5'><a id='td_send' class='btn red form-control'>Send Notification</a></div>",
    },
    {
        "targets":[0],
        "visible": true,
        "searchable": true
    }],
    "order": [[ 1, "asc" ]], 
});
dataTable.on( 'order.dt search.dt', function () {
   dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
        dataTable.cell(cell).invalidate('dom');
    } );
}).draw();
$('#bday_dataTable tbody').on( 'click', '#td_send', function () { 
            $('#td_send').html('Sending..');
            var data = dataTable.row($(this).parents('tr')).data();
            send_bday_notify(data.member_id,data.full_name_eng,data.photo,send_notifications);
            dataTable.row($(this).parents('tr')).remove().draw(false);
  });
}
function send_bday_notify(member_id,full_name_eng,photo,send_notifications)
{
  $.ajax({
        url: send_notifications,
        type: "POST",
        data: {"member_id":member_id,"full_name_eng":full_name_eng,"photo":photo},
        dataType: "JSON",
        success: function (data) {
          if(data.status)
          {
            return true;
          }
          else
          {
            return false;
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          return false;
        }
  });
}
function view_category_list(view_url)
{
  dataTable = $('#category_datatable').DataTable({
            dom: 'Bfrtip',
            "destroy": true,
            lengthMenu: [[10, 20, 30, -1], [10, 20, 30, "All"]],
               buttons: [
                {
                    extend: 'pageLength',
                }
        ],
        ajax: {
            "url":  view_url,
            "type": "POST",
            "dataType": "JSON"
        },
        "columns": [
            { "data": null },
            { "data": "carrer_cat" },
            { "data": " " }
    ],
    "columnDefs": [ {
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='btn-group m-r-5 m-b-5'><a href='javascript:;' data-toggle='dropdown' aria-expanded='true' class='btn red dropdown-toggle form-control'>Action <span class='caret'></span></a><ul class='dropdown-menu'><li><a id='td_update'><i class='fa fa-pencil'></i>&nbsp;&nbsp;Edit</a></li><li><a id='td_delete'><i class='fa fa-trash'></i>&nbsp;&nbsp;Delete</a></li></ul></div>",
    },
    {
        "targets":[0],
        "visible": true,
        "searchable": true
    }],
    "order": [[ 1, "asc" ]], 
});
dataTable.on( 'order.dt search.dt', function () {
   dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
        dataTable.cell(cell).invalidate('dom');
    } );
}).draw();
$('#category_datatable tbody').on( 'click', '#td_update', function () { 
            var data = dataTable.row($(this).parents('tr')).data();
            $('#cp_id').val(data.cp_id);
            $('#carrer_cat').val(data.carrer_cat);
    });
$('#category_datatable tbody').on( 'click', '#td_delete', function () { 
            var data = dataTable.row($(this).parents('tr')).data();
            $('#delete_cp_id').val(data.cp_id);
            $('#modal_cat_delete').modal('show');
    });
}
function view_proud_category_tbl(view_url)
{
  dataTable = $('#proud_cat_tbl').DataTable({
            dom: 'Bfrtip',
            "destroy": true,
            lengthMenu: [[10, 20, 30, -1], [10, 20, 30, "All"]],
               buttons: [
                {
                    extend: 'pageLength',
                }
        ],
        ajax: {
            "url":  view_url,
            "type": "POST",
            "dataType": "JSON"
        },
        "columns": [
            { "data": null },
            { "data": "prc_name" },
            { "data": " " }
    ],
    "columnDefs": [ {
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='btn-group m-r-5 m-b-5'><a href='javascript:;' data-toggle='dropdown' aria-expanded='true' class='btn red dropdown-toggle form-control'>Action <span class='caret'></span></a><ul class='dropdown-menu'><li><a id='td_update'><i class='fa fa-pencil'></i>&nbsp;&nbsp;Edit</a></li><li><a id='td_delete'><i class='fa fa-trash'></i>&nbsp;&nbsp;Delete</a></li></ul></div>",
    },
    {
        "targets":[0],
        "visible": true,
        "searchable": true
    }],
    "order": [[ 1, "asc" ]], 
});
dataTable.on( 'order.dt search.dt', function () {
   dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
        dataTable.cell(cell).invalidate('dom');
    } );
}).draw();
$('#proud_cat_tbl tbody').on( 'click', '#td_update', function () { 
            var data = dataTable.row($(this).parents('tr')).data();
            $('#prc_id').val(data.prc_id);
            $('#prc_name').val(data.prc_name);
    });
$('#proud_cat_tbl tbody').on( 'click', '#td_delete', function () { 
            var data = dataTable.row($(this).parents('tr')).data();
            $('#delete_prc_id').val(data.prc_id);
            $('#modal_cat_delete').modal('show');
    });
}
function view_album_category(view_url)
{
  dataTable = $('#album_datatable').DataTable({
            dom: 'Bfrtip',
            lengthMenu: [[10, 20, 30, -1], [10, 20, 30, "All"]],
               buttons: [
                {
                    extend: 'pageLength',
                }
        ],
        ajax: {
            "url":  view_url,
            "type": "POST",
            "dataType": "JSON"
        },
        "columns": [
            { "data": null },
            { "data": "album_name" },
            { data: null, render: function ( data, type, row ) {
                return customjs_date(data.date);
            } },
            { "data": " " }
    ],
    "columnDefs": [ {
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='btn-group m-r-5 m-b-5'><a href='javascript:;' data-toggle='dropdown' aria-expanded='true' class='btn red dropdown-toggle form-control'>Action <span class='caret'></span></a><ul class='dropdown-menu'><li><a id='td_update'><i class='fa fa-pencil'></i>&nbsp;&nbsp;Edit</a></li><li><a id='td_delete'><i class='fa fa-trash'></i>&nbsp;&nbsp;Delete</a></li></ul></div>",
    },
    {
        "targets":[0],
        "visible": true,
        "searchable": true
    }],
    "order": [[ 1, "asc" ]], 
});
dataTable.on( 'order.dt search.dt', function () {
   dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
        dataTable.cell(cell).invalidate('dom');
    } );
}).draw();
$('#album_datatable tbody').on( 'click', '#td_update', function () { 
            var data = dataTable.row($(this).parents('tr')).data();
            $('#album_id').val(data.album_id);
            $('#album_name').val(data.album_name);
            $('#date').datepicker("setDate", customjs_date(data.date));
    });
$('#album_datatable tbody').on( 'click', '#td_delete', function () { 
            var data = dataTable.row($(this).parents('tr')).data();
            $('#delete_album_id').val(data.album_id);
            $('#modal_album_delete').modal('show');
    });
}
function view_villages_table(view_url)
{
dataTable = $('#village_datatable').DataTable({
            dom: 'Bfrtip',
            "destroy": true,
            lengthMenu: [[10, 20, 30, -1], [10, 20, 30, "All"]],
               buttons: [
                {
                    extend: 'pageLength',
                }
        ],
        ajax: {
            "url":  view_url,
            "type": "POST",
            "dataType": "JSON"
        },
        "columns": [
            { "data": null },
            { "data": "eng_name" },
            { "data": "guj_name" },
            { "data": " " }
    ],
    "columnDefs": [ {
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='btn-group m-r-5 m-b-5'><a href='javascript:;' data-toggle='dropdown' aria-expanded='true' class='btn red dropdown-toggle form-control'>Action <span class='caret'></span></a><ul class='dropdown-menu'><li><a id='td_update'><i class='fa fa-pencil'></i>&nbsp;&nbsp;Edit</a></li><li><a id='td_delete' href='#modal_theme_danger' data-toggle='modal'><i class='fa fa-trash'></i>&nbsp;&nbsp;Delete</a></li></ul></div>",
    },
    {
        "targets":[0],
        "visible": true,
        "searchable": true
    }],
    "order": [[ 1, "asc" ]], 
});
dataTable.on( 'order.dt search.dt', function () {
   dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
        dataTable.cell(cell).invalidate('dom');
    } );
}).draw();
$('#village_datatable tbody').on( 'click', '#td_update', function () { 
            var data = dataTable.row($(this).parents('tr')).data();
            $('#village_id').val(data.village_id);
            $('#guj_name').val(data.guj_name);
            $('#eng_name').val(data.eng_name);
    });
}
function view_appui_table(view_url)
{
dataTable = $('#app_ui_datatable').DataTable({
            dom: 'Bfrtip',
            "bDestroy": true,
            lengthMenu: [[15, 25, 45, -1], [15, 25, 45, "All"]],
               buttons: [
                {
                    extend: 'pageLength',
                }
        ],
        ajax: {
            "url":  view_url,
            "type": "POST",
            "dataType": "JSON"
        },
        "columns": [
            { "data": null },
            { "data": "eng_name" },
            { "data": "activity_name" },           
            { "data": " " }
    ],
    "columnDefs": [ {
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='btn-group m-r-5 m-b-5'><a href='javascript:;' data-toggle='dropdown' aria-expanded='true' class='btn red dropdown-toggle form-control'>Action <span class='caret'></span></a><ul class='dropdown-menu'><li><a id='td_update'><i class='fa fa-pencil'></i>&nbsp;&nbsp;Edit</a></li><li><a id='td_delete' href='#modal_theme_danger' data-toggle='modal'><i class='fa fa-trash'></i>&nbsp;&nbsp;Delete</a></li></ul></div>",
    },
    {
        "targets":[0],
        "visible": true,
        "searchable": true
    }],
    "order": [[ 1, "asc" ]], 
});
dataTable.on( 'order.dt search.dt', function () {
   dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
        dataTable.cell(cell).invalidate('dom');
    } );
}).draw();
}
function view_api_table(view_url)
{
dataTable = $('#api_datatable').DataTable({
            dom: 'Bfrtip',
            "bDestroy": true,
            lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
               buttons: [
                {
                    extend: 'pageLength',
                }
        ],
        ajax: {
            "url":  view_url,
            "type": "POST",
            "dataType": "JSON"
        },
        "columns": [
            { "data": null },
            { "data": "api_name" },
            { data: null, render: function ( data, type, row ) {
            if(data.active_api == 1)
                return "<a class='btn btn-xs bg-yellow' ><small class='label pull-right'>Default</small></a>";
            else
                return "<a class='btn btn-info btn-xs' onclick='set_as_default_company("+data.api_id+")' id='td_active'>Set as Default</a>";
            } },
            { "data": " " }
    ],
    "columnDefs": [ {
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='btn-group m-r-5 m-b-5'><a href='javascript:;' data-toggle='dropdown' aria-expanded='true' class='btn red dropdown-toggle form-control'>Action <span class='caret'></span></a><ul class='dropdown-menu'><li><a id='td_update'><i class='fa fa-pencil'></i>&nbsp;&nbsp;Edit</a></li><li><a id='td_delete' href='#modal_theme_danger' data-toggle='modal'><i class='fa fa-trash'></i>&nbsp;&nbsp;Delete</a></li></ul></div>",
    },
    {
        "targets":[0],
        "visible": true,
        "searchable": true
    }],
    "order": [[ 1, "asc" ]], 
});
dataTable.on( 'order.dt search.dt', function () {
   dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
        dataTable.cell(cell).invalidate('dom');
    } );
}).draw();
}
function view_sms_api_table(view_url)
{
dataTable = $('#smsapi_datatable').DataTable({
            dom: 'Bfrtip',
            "bDestroy": true,
            lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
               buttons: [
                {
                    extend: 'pageLength',
                }
        ],
        ajax: {
            "url":  view_url,
            "type": "POST",
            "dataType": "JSON"
        },
        "columns": [
            { "data": null },
            { "data": "sms_api_name" },
            { data: null, render: function ( data, type, row ) {
            if(data.active_api == 1)
                return "<a class='btn btn-xs bg-yellow' ><small class='label pull-right'>Default</small></a>";
            else
                return "<a class='btn btn-info btn-xs' onclick='set_as_default_company("+data.sms_api_id+")' id='td_active'>Set as Default</a>";
            } },
            { "data": " " }
    ],
    "columnDefs": [ {
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='btn-group m-r-5 m-b-5'><a href='javascript:;' data-toggle='dropdown' aria-expanded='true' class='btn red dropdown-toggle form-control'>Action <span class='caret'></span></a><ul class='dropdown-menu'><li><a id='td_update'><i class='fa fa-pencil'></i>&nbsp;&nbsp;Edit</a></li><li><a id='td_delete' href='#modal_theme_danger' data-toggle='modal'><i class='fa fa-trash'></i>&nbsp;&nbsp;Delete</a></li></ul></div>",
    },
    {
        "targets":[0],
        "visible": true,
        "searchable": true
    }],
    "order": [[ 1, "asc" ]], 
});
dataTable.on( 'order.dt search.dt', function () {
   dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
        dataTable.cell(cell).invalidate('dom');
    } );
}).draw();
$('#smsapi_datatable tbody').on( 'click', '#td_update', function () { 
            var data = dataTable.row($(this).parents('tr')).data();
            $('#sms_api_id').val(data.sms_api_id);
            $('#sms_api_name').val(data.sms_api_name);
            $('#sms_api_send_url').val(data.sms_api_send_url);
            $('#sms_api_view_balance_url').val(data.sms_api_view_balance_url);
            $('#sms_api_key').val(data.sms_api_key);
    });
}
function view_message_template_table(view_url)
{
dataTable = $('#msgtemp_datatable').DataTable({
            dom: 'Bfrtip',
            "bDestroy": true,
            lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
               buttons: [
                {
                    extend: 'pageLength',
                }
        ],
        ajax: {
            "url":  view_url,
            "type": "POST",
            "dataType": "JSON"
        },
        "columns": [
            { "data": null },
            { "data": "sms_title" },
            { "data": " " }
    ],
    "columnDefs": [ {
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='btn-group m-r-5 m-b-5'><a href='javascript:;' data-toggle='dropdown' aria-expanded='true' class='btn red dropdown-toggle form-control'>Action <span class='caret'></span></a><ul class='dropdown-menu'><li><a id='td_update'><i class='fa fa-pencil'></i>&nbsp;&nbsp;Edit</a></li><li><a id='td_delete' href='#modal_theme_danger' data-toggle='modal'><i class='fa fa-trash'></i>&nbsp;&nbsp;Delete</a></li></ul></div>",
    },
    {
        "targets":[0],
        "visible": true,
        "searchable": true
    }],
    "order": [[ 1, "asc" ]], 
});
dataTable.on( 'order.dt search.dt', function () {
   dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
        dataTable.cell(cell).invalidate('dom');
    } );
}).draw();
$('#msgtemp_datatable tbody').on( 'click', '#td_update', function () { 
            var data = dataTable.row($(this).parents('tr')).data();
            $('#sms_temp_id').val(data.sms_temp_id);
            $('#sms_title').val(data.sms_title);
            $('#sms_context').val(data.sms_context);
    });
}