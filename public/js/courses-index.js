$(function () {
    
    window.LaravelDataTables = window.LaravelDataTables || {}; window.LaravelDataTables["course-table"] = $("#course-table").DataTable({
        "serverSide": true, "processing": true, "ajax": {
            "url": "http:\/\/localhost:8000\/dashboard\/courses", "type": "GET", "data": function (data) {
                for (var i = 0, len = data.columns.length; i < len; i++) {
                    if (!data.columns[i].search.value) delete data.columns[i].search;
                    if (data.columns[i].searchable === true) delete data.columns[i].searchable;
                    if (data.columns[i].orderable === true) delete data.columns[i].orderable;
                    if (data.columns[i].data === data.columns[i].name) delete data.columns[i].name;
                }
                delete data.search.regex;
            }
        }, "columns": [{ "data": "name", "name": "name", "title": "Name", "orderable": true, "searchable": true }, { "data": "views_count", "name": "views_count", "title": "Views Count", "orderable": true, "searchable": true }, { "data": "levels", "name": "levels", "title": "Levels", "orderable": true, "searchable": true }, { "data": "hours", "name": "hours", "title": "Hours", "orderable": true, "searchable": true }, { "data": "active", "name": "active", "title": "Active", "orderable": true, "searchable": true }, { "data": "category_id", "name": "category_id", "title": "Category", "orderable": true, "searchable": true }, { "data": "created_at", "name": "created_at", "title": "Created At", "orderable": true, "searchable": true }, { "data": "updated_at", "name": "updated_at", "title": "Updated At", "orderable": true, "searchable": true }, { "data": "action", "name": "action", "title": "Action", "orderable": false, "searchable": false, "width": 60, "className": "text-center" }], "dom": "Bfrtip", "order": [[1, "desc"]], "searching": true, "buttons": [{ "extend": "create" }, { "extend": "export" }, { "extend": "print" }, { "extend": "reset" }, { "extend": "reload" }]
    });
});
