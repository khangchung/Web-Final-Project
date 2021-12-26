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
            <!-- Thông tin nhân viên -->
            <div class="info_wrap" style="margin-top: 50px;" >
                <div class="info_wrap_header">
                    <div class="info_wrap_header-avatar">
                       <img src="/images/avatar.png " alt="">
                    </div>
                    <div class="info_wrap_header-btn">
                        <label for="file" onclick="changeAvatar();" class="info_wrap_header-change" id="uploadBtn">Cập nhật</label>
                        <input type="file" id="file" style="display: none;">
                        <input type="button" class="info_wrap_header-view" onclick="viewAvatar();" value="Xem">
                    </div>
                </div>

                <div class="info_wrap_body">
                    <h1 style="margin:10px 0 30px">THÔNG TIN CÁ NHÂN</h1>
                    <div class="info_wrap_body-item">
                        <label for="">Họ và tên</label> <br>
                        <input type="text" name="" id="" value="Nguyễn Minh Thuận" disabled>
                    </div>
                    <div class="info_wrap_body-item">
                        <label for="">Ngày sinh</label> <br>
                        <input type="text" name="" id="" value="21/7/1999" disabled>
                    </div>
                    <div class="info_wrap_body-item">
                        <label for="">Mã nhân viên</label> <br>
                        <input type="text" name="" id="" value="51702192" disabled>
                    </div>
                    <div class="info_wrap_body-item">
                        <label for="">Vị trí</label> <br>
                        <input type="text" name="" id="" value="Trưởng phòng" disabled> 
                    </div>
                    <div class="info_wrap_body-item">
                        <label for="">Tên phòng ban</label> <br>
                        <input type="text" name="" id="" value="Phòng thiết kế" disabled>
                    </div>
                </div>
            </div>
        </div>  
        <div class="modal" id="avatar">
            <div class="modal_overlay"></div>
            <div class="modal_body">
                <img src="/images/male.jpg" alt="">
                <div class="closeAvatar" onclick="closeAvatar();">
                    <i class="bi bi-x-lg"></i>
                </div>
            </div>
        </div>  
    </body>
    </html>
