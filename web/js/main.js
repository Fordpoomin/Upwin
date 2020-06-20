$(function() {

    var url_local = window.location.href;
    var res_url = url_local.split("?");
    var activity_name = res_url[1].split("&")[1].split("=")[1];

    console.log(decodeURIComponent(activity_name));

    var facultys = document.getElementById('facultys');
    /////////////////status <= 0///////////////////
    if (faculty == 1) {
        facultys.innerText = "คณะเกษตรศาสตร์และทรัพยากรธรรมชาติ";
    } else if (faculty == 2) {
        facultys.innerText = "คณะเทคโนโลยีสารสนเทศและการสื่อสาร";
    } else if (faculty == 3) {
        facultys.innerText = "คณะพยาบาลศาสตร์";
    } else if (faculty == 4) {
        facultys.innerText = "คณะเภสัชศาสตร์";
    } else if (faculty == 5) {
        facultys.innerText = "คณะวิทยาศาสตร์";
    } else if (faculty == 6) {
        facultys.innerText = "คณะวิศวกรรมศาสตร์";
    } else if (faculty == 7) {
        facultys.innerText = "คณะสถาปัตยกรรมศาสตร์และศิลปกรรมศาสตร์";
    } else if (faculty == 8) {
        facultys.innerText = "คณะทันตแพทยศาสตร์";
    } else if (faculty == 9) {
        facultys.innerText = "คณะนิติศาสตร์";
    } else if (faculty == 10) {
        facultys.innerText = "คณะแพทยศาสตร์";
    } else if (faculty == 11) {
        facultys.innerText = "คณะรัฐศาสตร์และสังคมศาสตร์";
    } else if (faculty == 12) {
        facultys.innerText = "คณะวิทยาการจัดการและสารสนเทศศาสตร์";
    } else if (faculty == 13) {
        facultys.innerText = "คณะวิทยาศาสตร์การแพทย์";
    } else if (faculty == 14) {
        facultys.innerText = "คณะศิลปศาสตร์";
    } else if (faculty == 15) {
        facultys.innerText = "คณะสหเวชศาสตร์";
    } else if (faculty == 16) {
        facultys.innerText = "คณะพลังงานและสิ่งแวดล้อม";
    } else if (faculty == 17) {
        facultys.innerText = "วิทยาลัยการศึกษา";
    } else if (faculty == 18) {
        facultys.innerText = "วิทยาลัยการจัดการ";

        /////////////////status <= 1///////////////////
    } else if (faculty == 19) {
        facultys.innerText = "กองกลาง";
    } else if (faculty == 20) {
        facultys.innerText = "กองกิจการนิสิต";
    } else if (faculty == 21) {
        facultys.innerText = "กองการเจ้าหน้าที่";
    } else if (faculty == 22) {
        facultys.innerText = "กองคลัง";
    } else if (faculty == 23) {
        facultys.innerText = "กองบริการการศึกษา";
    } else if (faculty == 24) {
        facultys.innerText = "กองแผนงาน";
    } else if (faculty == 25) {
        facultys.innerText = "กองพัฒนาคุณภาพนิสิตและนิสิตพิการ";
    } else if (faculty == 26) {
        facultys.innerText = "กองบริหารงานวิจัย";
    } else if (faculty == 27) {
        facultys.innerText = "กองอาคารสถานที่";
    } else if (faculty == 28) {
        facultys.innerText = "สำนักงานสภา มหาวิทยาลัยพะเยา";
    } else if (faculty == 29) {
        facultys.innerText = "สภาพนักงาน มหาวิทยาลัยพะเยา";
    } else if (faculty == 30) {
        facultys.innerText = "สำนักงานอธิการบดี";
    } else if (faculty == 31) {
        facultys.innerText = "ศูนย์บรรณสารและการเรียนรู้";
    } else if (faculty == 32) {
        facultys.innerText = "โรงเรียนสาธิตมหาวิทยาลัยพะเยา";
    } else if (faculty == 33) {
        facultys.innerText = "ศูนย์การแพทย์และโรงพยาบาลมหาวิทยาลัยพะเยา";
    } else if (faculty == 34) {
        facultys.innerText = "ศูนย์เครือข่ายความร่วมมือเพื่อการพัฒนาเชิงพื้นที่แบบสร้างสรรค์";
    } else if (faculty == 35) {
        facultys.innerText = "ศูนย์บริการเทคโนโลยีสารสนเทศและการสื่อสาร";
    } else if (faculty == 36) {
        facultys.innerText = "ศูนย์พัฒนาเด็กเล็ก";
    } else if (faculty == 37) {
        facultys.innerText = "ศูนย์พัฒนาเทคโนโลยียานยนต์";
    } else if (faculty == 38) {
        facultys.innerText = "ศูนย์สถาบันนวัตกรรมและถ่ายทอดเทคโนโลยี";
    } else if (faculty == 39) {
        facultys.innerText = "ศูนย์บ่มเพาะวิสาหกิจ";
    } else if (faculty == 40) {
        facultys.innerText = "ศูนย์ศึกษาเศรษฐกิจพอเพียงการเกษตรและความอยู่รอดของมนุษยชาติ";
    } else if (faculty == 41) {
        facultys.innerText = "หน่วยกฎหมาย";
    } else if (faculty == 42) {
        facultys.innerText = "หน่วยตรวจสอบภายใน";
    } else if (faculty == 43) {
        facultys.innerText = "หน่วยตรวจสอบภายใน";
    } else if (faculty == 44) {
        facultys.innerText = "หน่วยปฏิบัติการวิชาชีพการโรงแรมและการท่องเที่ยว";
    } else if (faculty == 45) {
        facultys.innerText = "อุทยานวิทยาศาสตร์";
    } else if (faculty == 99) {
        facultys.innerText = "ท่านกำลังเข้าสู่กิจกรรม\n" + ": " + decodeURIComponent(activity_name);
    }

    var locatioss = "none";
    $("#check_in").click(function() {

        console.log("Onclick Check in");
        console.log("Phone :" + phone);
        console.log("faculty :" + faculty);
        $.ajax({
            url: "./apis_system.php",
            type: "POST",
            dataType: "json",
            data: {
                scan_main: true,
                phone_main: phone,
                faculty_main: faculty,
                check_main: 1
            },
            success: function(data) {
                console.log(data);
                console.log(data.result.check_in);
                console.log(data.result.faculty_name);
                var res_in = data.result.check_in.split(" ");
                if (data.result.faculty_name == "none") {
                    locatioss = decodeURIComponent(activity_name);
                } else {
                    locatioss = data.result.faculty_name;
                }
                document.getElementById('check_ins').innerText = "เช็คอินแล้ว" + "\n" + "วันที่ : " + data.result.check_in;
                document.getElementById('faculty_names').innerText = "คุณได้เช็คอินที่: " + locatioss;
                //activityname
                //activity id
                if (data.status == 200) {

                    swal({
                        title: "เช็คอินแล้ว",
                        text: "วันที่ : " + res_in[0] + " เวลา : " + res_in[1] + "\n" + locatioss,
                        icon: "success",
                        dangerMode: true,
                    });

                } else {
                    swal({
                        title: "เช็คอินแล้ว",
                        text: "เช็คอินไม่สำเร็จ!",
                        icon: "error",
                        dangerMode: true,
                    });
                }
            }
        });

    });

    $("#check_out").click(function() {

        console.log("Onclick Check out");
        console.log("Phone :" + phone);
        console.log("faculty :" + faculty);

        $.ajax({
            url: "./apis_system.php",
            type: "POST",
            dataType: "json",
            data: {
                scan_main: true,
                phone_main: phone,
                faculty_main: faculty,
                check_main: 0

            },
            success: function(data) {
                console.log(data);
                console.log(data.result.check_out);
                console.log(data.result.faculty_name);
                var res_in = data.result.check_in.split(" ");
                var res_out = data.result.check_out.split(" ");

                if (data.result.faculty_name == "none") {
                    locatioss = decodeURIComponent(activity_name);
                } else {
                    locatioss = data.result.faculty_name;
                }

                var hours = parseInt(res_out[1].split(':')[0], 10) - parseInt(res_in[1].split(':')[0], 10);
                if (hours < 0) hours = 24 + hours;
                // console.log(hours);

                var t = "-";
                if (hours > 0) {
                    t = "คุณได้เช็คอินเมื่อ " + hours + " ชั่วโมงที่แล้ว";
                } else {
                    t = "คุณได้เช็คอินเมื่อ " + hours + " ชั่วโมงที่แล้ว";
                }

                document.getElementById('check_ins').innerText = "เช็คเอ้าท์แล้ว" + "\n" + "วันที่ : " + data.result.check_out;
                document.getElementById('faculty_names').innerText = "คุณได้เช็คเอ้าท์ที่: " + locatioss;
                document.getElementById('times').innerText = t;


                if (data.status == 200) {

                    swal({
                        title: "เช็คเอ้าท์แล้ว",
                        text: "วันที่ : " + res_out[0] + " เวลา : " + res_out[1] + "\n" + locatioss,
                        icon: "success",
                        dangerMode: true,
                    });

                } else {
                    swal({
                        title: "เช็คอินแล้ว",
                        text: "เช็คอินไม่สำเร็จ!",
                        icon: "error",
                        dangerMode: true,
                    });
                }
            }
        });
    });


});