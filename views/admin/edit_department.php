    <?php
        session_start();
    ?>
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
                <h1 class="text-center mb-5" >Sửa thông tin phòng ban</h1>
                <form action="../../controllers/edit_department.php" method="POST">
                    <div class="form-group">
                        <label for="department_name">Tên phòng ban</label>
                        <select class="selectpicker form-control" id="department_name" name="name">
                            <option value="Business">Phòng kinh doanh</option>
                            <option value="Analysis">Phòng phân tích</option>
                            <option value="Design">Phòng thiết kế</option>
                            <option value="IT">Phòng lập trình</option>
                            <option value="Administration">Phòng hành chính</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="department_desc">Mô tả</label>
                        <textarea type="text" class="form-control" name="desc" id="department_desc" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="room_number">Số phòng</label> 
                        <input type="number" class="form-control" name="room" id="room_number">
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <button type="submit" class="btn btn-info mt-5 p-3">Thêm phòng ban</button>
                    </div>
                </form>
        </div>
    </body>
    </html>
