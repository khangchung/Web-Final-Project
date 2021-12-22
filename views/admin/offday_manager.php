    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
        <!--Icon-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
        <!--Font-->
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100&display=swap"
            rel="stylesheet">
    
        <!--Css-->
        <link rel="stylesheet" href="../style.css">
    
        <!--Javascript-->
        <script src="../main.js"></script>
        <title>Giao diện</title>
    </head>
    <body>
        <script>
            $(document).ready(function(){
    //Nhân viên xem thông tin chi tiết task
    
    //Admin xem thông tin chi tiết ngày nghỉ
    $('#offday_manager tbody tr').click(function() {
        window.location = "details_offday.php"; 
    });
});

        </script>
        <?php
            require_once('../includes/sidebar_admin.php');
        ?>
        <div class="page-wrap">
            
            <div class="main_wrap" id="offday_manager">
                <h2 style="margin-bottom: 30px">Quản lý ngày nghỉ</h2>
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã nhân viên</th>
                            <th>Họ và tên</th>
                            <th>Phòng ban</th>
                            <th>Ngày nộp đơn</th>
                            <th>Số ngày nghỉ</th>
                            <th>Lý do</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td name="">1</td>
                            <td name="employee_id">A001</td>
                            <td name="fullname">Nguyễn Minh Thuận</td>
                            <td name="department_name">Thiết kế</td>
                            <td name="date_submit">1/12/2021</td>
                            <td name="count_offday">2</td>
                            <td name="reason_offday">Nghỉ bệnh</td>
                            <td name="status_offday" class="text-success">Approved</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            
        </div> 
    </body>
    </html>
