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
            require_once('../includes/sidebar_admin.php');
        ?>
        <div class="page-wrap">
            
            <div class="m-5" id="">
                <h1 class="text-center mb-5" >Thêm nhân viên</h1>
                <form action="../../controllers/admin/add_employee.php" method="POST">
                    <div class="form-group">
                        <label for="fullname">Họ & tên</label>
                        <input type="text" id="fullname" name="fullname" class="form-control">
                    </div>
                    <!-- <div class="form-group">
                        <label for="birth">Ngày sinh</label> 
                        <input type="date" class="form-control" name="" id="birth">
                    </div>
                    <div class="form-group">
                        <label for="gender">Giới tính</label>
                        <div class="form-check form-check-inline mr-5">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Nam</label>
                        </div>
                        <div class="form-check form-check-inline ml-0">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Nữ</label>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="username">Tên tài khoản</label>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="department">Tên phòng ban</label>
                        <select name="department" class="selectpicker form-control" name="department_name">
                            <option value="Business">Phòng kinh doanh</option>
                            <option value="Analysis">Phòng phân tích</option>
                            <option value="Design">Phòng thiết kế</option>
                            <option value="IT">Phòng lập trình</option>
                            <option value="Administration">Phòng hành chính</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type_employee">Vị trí</label> 
                        <select class="selectpicker form-control" name="position">
                            <option value="2">Nhân viên</option>
                            <option value="1">Trưởng phòng</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <button type="submit" class="btn btn-info mt-5 p-3">Thêm nhân viên</button>
                    </div>
                </form>
            
        </div> 
    </body>
    </html>
