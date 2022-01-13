    <?php
        session_start();
        require_once("../../models/department.php");
        require_once("../../models/employee.php");
        require_once("../../models/setup.php");
        priorityChecker(0);
        $employee = isset($_SESSION["employee"]) ? unserialize($_SESSION["employee"]) : "";
        $departments = isset($_SESSION["departments"]) ? $_SESSION["departments"] : "";
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
        <title>Chi tiết nhân viên</title>
    </head>
    <body>
        <?php
            require_once('../includes/sidebar_admin.php');
        ?>
        <div class="page-wrap">
            <div class="m-5" >
                <h2 class="mb-5">Thông tin nhân viên</h2>
                <?php
                    if (!empty($employee)) {
                        $position = "Nhân viên";
                        if ($employee->getPosition() == 1) {
                            $position = "Trưởng phòng";
                        }
                        foreach ($departments as $department) {
                            $department = unserialize($department);
                            if ($department->getId() == $employee->getDepartment()) {
                                ?>
                                    <div class="form-group">
                                        <label for="fullname">Họ và tên</label> 
                                        <input type="text" class="form-control" id="fullname" value="<?= $employee->getFullname() ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Tên tài khoản</label> 
                                        <input type="text" class="form-control" id="username" value="<?= $employee->getUsername() ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="department">Phòng ban</label> 
                                        <input type="text" class="form-control" id="department" value="<?= $department->getName() ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Vị trí</label> 
                                        <input type="text" class="form-control" id="position" value="<?= $position ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for=""></label> 
                                        <a href="../../controllers/admin/reset_password.php?username=<?= $employee->getUsername() ?>" class="btn btn-danger p-3">Reset mật khẩu</a>
                                    </div>
                                <?php
                                break;
                            }
                        }
                    }
                ?>
            </div>
        </div>      
    </body>
    </html>
