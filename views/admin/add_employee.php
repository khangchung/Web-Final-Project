    <?php
        session_start();
        require_once("../../models/department.php");
        require_once("../../models/setup.php");
        priorityChecker(0);
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
        <title>Giao diện</title>
    </head>
    <body>
        <?php
            require_once('../includes/sidebar_admin.php');
        ?>
        <div class="page-wrap">
            
            <div class="main_wrap" id="">
                <h2 class=" mb-5 title" >Thêm nhân viên</h2>
                <?php
                    if (!empty($departments)) {
                    ?>
                    <form id="addEmployeeForm" action="../../controllers/admin/add_employee.php" method="POST" onsubmit="return addEmployee();">
                        <div class="form-group">
                            <label for="fullname">Họ & tên</label>
                            <input type="text" id="fullname" name="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username">Tên tài khoản</label>
                            <input type="text" id="username" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="department">Tên phòng ban</label>
                            <select name="department" class="selectpicker form-control" name="department_name">
                            <?php
                                foreach ($departments as $department) {
                                    $department = unserialize($department);
                                    ?>
                                        <option value="<?= $department->getId() ?>"><?= $department->getName() ?></option>
                                    <?php
                                }
                            ?>
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
                            <small id="errorMessage" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <button type="submit">Thêm nhân viên</button>
                        </div>
                    </form>
                    <?php      
                    }
                ?>
            </div> 
        </div>
    </body>


    </html>
