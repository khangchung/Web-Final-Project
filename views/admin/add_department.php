    <?php
        session_start();
        require_once("../../models/setup.php");
        priorityChecker(0);
        $validate = isValid();
        $isSuccess = null;
        $message = "";
        if ($validate[1] != "" || $validate[2] != "") {
            if ($validate[1] != "") {
                $message = $validate[1];
                $isSuccess = true;
            } else
            if ($validate[2] != "") {
                $message = $validate[2];
                $isSuccess = false;
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
        <title>Thêm phòng ban</title>
    </head>
    <body>
        <?php
            require_once('../includes/sidebar_admin.php');
        ?>
        <div class="page-wrap">
            
            <div class="main_wrap" id="addDepartmentForm">
                <h2 class=" mb-5" >Thêm phòng ban</h2>
                <form action="../../controllers/admin/add_department.php" method="POST" onsubmit="return addDepartment();">
                    <div class="form-group">
                        <label for="department">Tên phòng ban <span class="requiredField">*</span></label>
                        <input type="text" class="form-control" onkeydown="clearErrorMessage()"  name="name" id="department_name">
                    </div>
                    <div class="form-group">
                        <label for="department_desc">Mô tả <span class="requiredField">*</span></label>
                        <textarea type="text" id="department_desc" onkeydown="clearErrorMessage()"  name="desc" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="total_department">Số phòng <span class="requiredField">*</span></label> 
                        <input type="number" min="0" class="form-control" onclick="clearErrorMessage()" name="room" id="total_department">
                    </div>
                    <?php
                        if (!empty($message) && !is_null($isSuccess)) {
                            if ($isSuccess) {
                            ?>
                                <div class="form-group">
                                    <p class="text-success"><?= $message ?></p>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="form-group">
                                    <p class="text-danger"><?= $message ?></p>
                                </div>
                            <?php
                            }
                        }
                    ?>
                    <div class="form-group">
                        <label for=""></label>
                        <small id="errorMessage"></small>
                    </div>
                    <div class="form-group">
                        <label for="add_department"></label>
                        <button type="submit" class="btn btn-success btn-lg" id="add_department" >Thêm phòng ban</button>
                    </div>
                </form>
            
        </div> 
    </body>
    </html>
