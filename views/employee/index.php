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
            
            <!-- Quản lý task -->
            <div class="main_wrap" id="task_list">
                <h2 style="margin-bottom: 30px">DANH SÁCH TASK</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Thiết kế giỏ hàng</th>
                            <td>7/11/2021</th>
                            <td>14/11/2021</th>
                            <td>New</th>
                        </tr>
                        <tr>
                            <td>Thiết kế giỏ hàng</th>
                            <td>7/11/2021</th>
                            <td>14/11/2021</th>
                            <td>New</th>
                        </tr>
                        <tr>
                            <td>Thiết kế giỏ hàng</th>
                            <td>7/11/2021</th>
                            <td>14/11/2021</th>
                            <td>New</th>
                        </tr>
                        <tr>
                            <td>Thiết kế giỏ hàng</th>
                            <td>7/11/2021</th>
                            <td>14/11/2021</th>
                            <td>New</th>
                        </tr>
                        <tr>
                            <td>Thiết kế giỏ hàng</th>
                            <td>7/11/2021</th>
                            <td>14/11/2021</th>
                            <td>New</th>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>   
        
    </body>
    </html>
