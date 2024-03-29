    <?php
        session_start();
        require_once("../../models/setup.php");
        require_once("../../models/employee.php");
        require_once("../../models/department.php");
        priorityChecker(0);
        $employees = isset($_SESSION["employees"]) ? $_SESSION["employees"] : "";
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
        <title>Quản lý nhân viên</title>
    </head>
    <body>
        <?php
            require_once('../includes/sidebar_admin.php');
        ?>
        <div class="page-wrap">
            <div class="main_wrap" id="employee_manager">
                <div class="header">
                    <h2 class="title">Quản lý Nhân viên</h2>
                    <a href="add_employee.php" style="text-decoration: none;">
                        <button class="main_button">
                            Thêm nhân viên
                        </button>
                    </a>
                </div>
                
                <table class="table_responsive main_table">
                    <col style="width:10%">
                    <col style="width:15%">
                    <col style="width:30%">
                    <col style="width:30%">
                    <col style="width:25%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã nhân viên</th>
                            <th>Họ và tên</th>
                            <th>Tài khoản</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($employees) && !empty($departments)) {
                            for ($i=0; $i < count($employees); $i++) {
                                $employee = unserialize($employees[$i]);
                                $test_color = "";
                                $font_weight = "";
                                if ($employee->getPosition() == 1) {
                                    $test_color = "text-danger";
                                    $font_weight = "font-weight-bold";
                                }
                                foreach ($departments as $department) {
                                    $department = unserialize($department);
                                    if ($department->getId() == $employee->getDepartment()) {
                                    ?>
                                        <tr id=<?= $employee->getId() ?> class="<?= $test_color?> <?= $font_weight ?>">
                                            <td data-label="STT"><?= $i+1 ?></td>                                   
                                            <td data-label="Mã nhân viên"><?= $employee->getId() ?></td>
                                            <td data-label="Họ và tên"><?= $employee->getFullname() ?></td>
                                            <td data-label="Tài khoản"><?= $employee->getUsername() ?></td>
                                            <td data-label="Chức năng">
                                                <i class="bi bi-eye-fill mr-2 text-info " style="font-size: 32px"></i>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div> 
    </body>
    </html>
