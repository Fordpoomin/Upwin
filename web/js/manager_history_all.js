var table = $('#dataTable').DataTable({
    responsive: true,
    dom: 'Bfrtip',
    buttons: [{
            extend: 'csv',
            charset: 'UTF-8',
            // fieldSeparator: ';',
            bom: true,
            filename: 'csvtable',
            title: 'csvtable',
            "className": "btn text-light",
        }, {
            extend: 'excel',
            bom: true,
            filename: 'exceltable',
            title: 'exceltable',
            "className": "btn text-light",
        }

    ],
    "ajax": {
        url: "./apis_system.php",
        type: "POST",
        dataType: 'json',
        dataSrc: 'result',
        data: {
            history_qrcode: true
        }
    },
    "columns": [{
        data: 'history_id'
    }, {
        data: 'name'
    }, {
        data: 'faculty_name'
    }, {
        data: 'activity_name'
    }, {
        data: 'date_finish'
    }, {
        data: 'date_gen'
    }]

});