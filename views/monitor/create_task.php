    <?php
        session_start();
        require_once("../../models/employee.php");
        require_once("../../models/setup.php");
        priorityChecker(1);
        $info = isset($_SESSION["information"]) ? unserialize($_SESSION["information"]) : "";
        $employees = isset($_SESSION["employees"]) ? $_SESSION["employees"] : "";
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
        <title>Thêm nhiệm vụ</title>
    </head>
    <body>
        <?php
            require_once('../includes/sidebar_monitor.php');
        ?>
        <div class="page-wrap">
            
            <div class="main_wrap" id="">
                <h1 class="title" >Thêm nhiệm vụ</h1>
                <form id="" action="../../controllers/monitor/create_task.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="task_name">Tiêu đề</label>
                        <input name="title" type="text" id="task_name" name="task_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fullname">Nhân viên thực hiện</label>
                        <select name="receiver" class="form-control">
                        <?php
                            if (!empty($employees)) {
                                foreach ($employees as $employee) {
                                    $employee = unserialize($employee);
                                    if ($employee->getDepartment() == $info->getDepartment()) {
                                    ?>
                                        <option value="<?= $employee->getId() ?>"><?= $employee->getFullname() ?></option>
                                    <?php
                                    }
                                }
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deadline">Deadline</label>
                        <input name="deadline" type="date" id="deadline" name="deadline" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="task_desc">Mô tả công việc</label>
                        <textarea name="desc" type="text" id="task_desc" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file">Tệp đính kèm</label>
                        <input name="attachment" type="file" class="form-control-file" id="file">
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <button type="submit" class="btn btn-info  mt-5 p-2 px-4">Xác nhận</button>
                    </div>
                </form>
            
        </div> 
    </body>

    


    </html>
