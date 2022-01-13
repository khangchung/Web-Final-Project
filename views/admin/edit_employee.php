    <?php
        session_start();
        require_once("../../models/employee.php");
        require_once("../../models/setup.php");
        priorityChecker(0);
        $dictionary = array(
            "Business" => "Phòng kinh doanh",
            "Analysis" => "Phòng kinh doanh",
            "Desgin" => "Phòng kinh doanh",
            "IT" => "Phòng kinh doanh",
            "Administration" => "Phòng kinh doanh"
        );
        $employees = isset($_SESSION["employees"]) ? $_SESSION["employees"] : "";
        $id = isset($_GET["id"]) ? $_GET["id"] : "";
        if (!empty($employees) && !empty($id)) {
            for ($i=0; $i < count($employees); $i++) {
                $employee = unserialize($employees[$i]);
                if ($employee->getId() == $id) {
                    $postion = "Nhân viên";
                    if ($employee->getPosition() == 1) {
                        $postion = "Trưởng phòng";
                    }
                    break;
                }
            }
        }
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
                <h2 class="text-center mb-5" >Sửa thông tin nhân viên</h2>
                <?php
                    if (isset($employee) && isset($postion)) {
                    ?>
                        <form action="../../controllers/admin/edit_employee.php" method="POST">
                            <div class="form-group">
                                <label for="id">Mã nhân viên</label>
                                <input type="text" id="id" name="id" class="form-control" value="<?= $employee->getId() ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="fullname">Họ & tên</label>
                                <input type="text" id="fullname" name="fullname" class="form-control" value="<?= $employee->getFullname() ?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Tên tài khoản</label>
                                <input type="text" id="username" name="username" class="form-control" value="<?= $employee->getUsername() ?>">
                            </div>
                            <div class="form-group">
                                <label for="department">Tên phòng ban</label>
                                <select class="selectpicker form-control" name="department">
                                    <option value="<?= $employee->getDepartment() ?>" selected><?= $dictionary[$employee->getDepartment()] ?></option>
                                    <option value="Business">Phòng kinh doanh</option>
                                    <option value="Analysis">Phòng phân tích</option>
                                    <option value="Design">Phòng thiết kế</option>
                                    <option value="IT">Phòng lập trình</option>
                                    <option value="Administration">Phòng hành chính</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="position">Vị trí</label> 
                                <select class="selectpicker form-control" name="position">
                                <option value="<?= $employee->getPosition() ?>" selected><?= $postion ?></option>
                                    <option value="2">Nhân viên</option>
                                    <option value="1">Trưởng phòng</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <button type="submit" class="btn btn-info  mt-5 p-2 px-4">Xác nhận</button>
                            </div>
                        </form>
                    <?php
                    }
                ?>
        </div> 
    </body>
    </html>
