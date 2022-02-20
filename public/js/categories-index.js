$(function () {
    window.LaravelDataTables = window.LaravelDataTables || {}; window.LaravelDataTables["Categorys-table"] = $("#Categorys-table").DataTable({
        "serverSide": true, "processing": true, "ajax": {
            "url": "http:\/\/localhost:8000\/dashboard\/categories", "type": "GET", "data": function (data) {
                for (var i = 0, len = data.columns.length; i < len; i++) {
                    if (!data.columns[i].search.value) delete data.columns[i].search;
                    if (data.columns[i].searchable === true) delete data.columns[i].searchable;
                    if (data.columns[i].orderable === true) delete data.columns[i].orderable;
                    if (data.columns[i].data === data.columns[i].name) delete data.columns[i].name;
                }
                delete data.search.regex;
            }
        }, "columns": [{ "data": "name", "name": "name", "title": "Name", "orderable": true, "searchable": true }, { "data": "active", "name": "active", "title": "Active", "orderable": true, "searchable": true }, { "data": "courses_count", "name": "courses_count", "title": "courses count", "orderable": true, "searchable": false }, { "data": "action", "name": "action", "title": "Action", "orderable": false, "searchable": false, "className": "text-center", "responsivePriority": -1 }], "stateSave": true, "order": [[1, "desc"]], "responsive": true, "autoWidth": false, "scrollX": true
    });
});
