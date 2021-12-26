    <?php
        session_start();
        require_once("../../models/setup.php");
        $absence = isset($_SESSION["absence"]) ? $_SESSION["absence"] : "";
        $employee = isset($_SESSION["employee"]) ? $_SESSION["employee"] : "";
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
            <div class="m-5" >
                <h1 style="margin-bottom: 30px">Thông tin ngày nghỉ</h1>
                <?php
                    if (!empty($absence) && !empty($employee)) {
                        for ($i=0; $i < count($employee); $i++) { 
                            if ($employee->getId() == $absence->getEmployeeId()) {
                                $fullname = $employee->getFullname();
                                $department = $employee->getDepartment();
                                break;
                            }
                        }
                    }
                ?>
                <div class="form-group">
                    <label for="fullname">Họ và tên</label> 
                    <input type="text" class="form-control" id="fullname" value="<?= $fullname ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="department">Phòng ban</label> 
                    <input type="text" class="form-control" id="department" value="<?= $department ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="date_submit">Ngày nộp đơn</label> 
                    <input type="text" class="form-control" id="date_submit" value="<?= $absence->getCreateDate() ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="count_offday">Số ngày nghỉ</label> 
                    <input type="number" class="form-control" id="count_offday" 
                        value="<?php getDateDistance($absence->getStartDate(), $absence->getEndDate()) ?>" 
                        disabled>
                </div>                 
                <div class="form-group">
                    <label for="start_offday">Ngày bắt đầu nghỉ</label> 
                    <input type="text" class="form-control" id="start_offday" value="<?= $absence->getStartDate() ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="end_offday">Ngày đi làm lại</label> 
                    <input type="text" class="form-control" id="end_offday" value="<?= $absence->getEndDate() ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="reason_offday">Lý do</label>
                    <textarea id="reason_offday" class="form-control" disabled><?= $absence->getReason() ?></textarea>
                </div>
                <div class="form-group">
                    <label for="attachments_offday">Tệp đính kèm (nếu có)</label>
                    <a href="<?= $absence->getAttachment() ?>" class="form-control-file" id="attachments_offday">Download here.</a>
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <a href="../../controllers/admin/censored.php?id=<?= $absence->getId() ?>" class="btn btn-info my-2 p-3">Duyệt đơn</a>
                </div>      
            </div>
        </div>      
    </body>
    </html>
