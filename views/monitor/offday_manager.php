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
        <?php
            require_once('../includes/sidebar_employee.php');
        ?>
        <div class="page-wrap">
            <!-- Quan ly ngay nghi -->
            <div class="main_wrap">
                <a href="form_offday.php" style="text-decoration: none;">
                    <button class="btn btn-info d-block ml-auto p-3 text-dark">
                        Nộp đơn nghỉ phép
                    </button>
                </a>
                <div>
                   <div>
                        <h3>Quản lý ngày nghỉ</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>Mã nhân viên</th>
                                    <th>Họ & tên</th>
                                    <th>Số ngày được nghỉ</th>
                                    <th>Số ngày đã nghỉ</th> 
                                    <th>Số ngày còn lại</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>5102192</td>
                                    <td>Nguyễn Minh Thuận</td>
                                    <td>15</td>
                                    <td>3</td> 
                                    <td>12</td>
                                </tr>
                            </tbody>
                        </table>
                   </div>
                   <div class="mt-5">
                        <h3>Lịch sử ngày nghỉ</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>Mã nhân viên</th>
                                    <th>Họ & tên</th>
                                    <th>Số ngày nghỉ</th>
                                    <th>Lý do nghỉ</th> 
                                    <th>Từ ngày</th>
                                    <th>Đến ngày</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>5102192</td>
                                    <td>Nguyễn Minh Thuận</td>
                                    <td>2</td>
                                    <td>Bị bệnh</td>
                                    <td>1/12/2021</td>
                                    <td>3/12/2021</td>
                                    <td class="text-success">Approved</td>
                                </tr>
                                <tr>
                                    <td>5102192</td>
                                    <td>Nguyễn Minh Thuận</td>
                                    <td>1</td>
                                    <td>Bị bệnh</td>
                                    <td>8/11/2021</td>
                                    <td>9/11/2021</td>
                                    <td class="text-success">Approved</td>
                                </tr>
                                <tr>
                                    <td>5102192</td>
                                    <td>Nguyễn Minh Thuận</td>
                                    <td>3</td>
                                    <td></td>
                                    <td>8/10/2021</td>
                                    <td>9/10/2021</td>
                                    <td class="text-danger">Refused</td>
                                </tr>
                            </tbody>
                        </table>
                   </div>
                   <div class="mt-5" id="offday_manager_moniter">
                        <h3>Duyệt đơn nghỉ phép</h3>
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
                                    <td>1</td>
                                    <td>5102192</td>
                                    <td>Nguyễn Minh Thuận</td>
                                    <td>Phân tích</td>
                                    <td>1/12/2021</td>
                                    <td>3</td>
                                    <td>Nghỉ bệnh</td> 
                                    <td>Waiting</td>
                                </tr>
                            </tbody>
                        </table>
                   </div>
                </div>
            </div>
        </div>   
    </body>
    </html>
