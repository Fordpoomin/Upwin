var table = $('#stats').DataTable({
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
            stats_home: true,
            phone_home: phone
        }
    },
    "columns": [{
        data: 'stats_id'
    }, {
        data: 'name'
    }, {
        data: 'phone'
    }, {
        data: 'faculty_name'
    }, {
        data: 'activity_name'
    }, {
        data: 'activity_date_finish'
    }, {
        data: 'check_in'
    }, {
        data: 'check_out'
    }, {
        data: 'date_gen'
    }]
});