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
            <div class="main_wrap" id="department_manager">
                <a href="add_department.php" style="text-decoration: none;">
                    <button class="btn btn-info d-block ml-auto p-3 text-dark">
                        Thêm phòng ban
                    </button>
                </a>
                <h2 style="margin-bottom: 30px">Danh sách phòng ban</h2>
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã phòng ban</th>
                            <th>Tên phòng ban</th>
                            <th>Tên trưởng phòng</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>PB001</td>
                            <td>Phòng tài chính</td>
                            <td>Nguyễn Minh Thuận</td>
                            <td>
                                <i class="bi bi-trash mr-2 text-danger" style="font-size: 32px"></i>
                                <a href="edit_department.php">
                                    <i class="bi bi-pencil-square mr-2 text-warning" style="font-size: 32px"></i>
                                </a>
                            </td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>  
             
    </body>
    </html>
