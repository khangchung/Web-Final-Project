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
            require_once('../includes/sidebar_monitor.php');
        ?>
        <div class="page-wrap">
            
            <!--Xem thông tin chi tiết task -->
            <div id="task_info">
                <h2 style="margin-bottom: 30px">THÔNG TIN CHI TIẾT TASK</h2>
                <table class="text-left" >
                    <tr>
                        <td>Tên Task</td>
                        <td>Thiết kế giỏ hàng</td>
                    </tr>
                    <tr>
                        <td>Nhân viên thực hiện</td>
                        <td>Nguyễn Minh Thuận</td>
                    </tr>
                    <tr>
                        <td>Ngày bắt đầu</td>
                        <td>7/11/2021</td>
                    </tr>
                    <tr>
                        <td>Deadline</td>
                        <td>14/11/2021</td>
                    </tr>
                    <tr>
                        <td>Mô tả công việc</td>
                        <td>
                            Xây dựng trang giỏ hàng gồm các thông tin:
                            <ul class="pl-5">
                                <li>STT</li>
                                <li>Ảnh đại diện</li>
                                <li>Tên sản phẩm</li>
                                <li>Số lượng</li>
                                <li>Đơn giá</li>
                                <li>Thành tiền</li>
                                <li>Hành động</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>Tiến độ</td>
                        <td>
                            <input type="range">
                        </td>
                    </tr>
                    <tr>
                        <td>Tệp đính kèm</td>
                        <td>
                            <a href="#">tepdinhkem.rar</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Trạng thái</td>
                        <td>New</td>
                    </tr>
                </table>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary mt-3 mr-2 px-5">Duyệt</button>
                    <button class="btn btn-primary mt-3 px-5">Từ chối</button>
                </div>
            </div>

        </div>   
        
    </body>
    </html>
