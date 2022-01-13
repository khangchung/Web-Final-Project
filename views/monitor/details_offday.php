    <?php
        session_start();
        require_once("../../models/absence.php");
        require_once("../../models/department.php");
        require_once("../../models/employee.php");
        require_once("../../models/setup.php");
        priorityChecker(1);
        $absence = isset($_SESSION["absence"]) ? unserialize($_SESSION["absence"]) : "";
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
        <title>Chi tiết yêu cầu nghỉ phép nhân viên</title>
    </head>
    <body>
        <?php
            require_once('../includes/sidebar_monitor.php');
        ?>
        <div class="page-wrap">
            <div class="m-5" >
                <h1 style="margin-bottom: 30px">Thông tin ngày nghỉ</h1>
                <?php
                    if (!empty($absence) && !empty($employees) && !empty($departments)) {   
                        foreach ($employees as $employee) {
                            $employee = unserialize($employee);
                            if ($employee->getId() == $absence->getEmployeeId()) {
                                foreach ($departments as $department) {
                                    $department = unserialize($department);
                                    if ($department->getId() == $employee->getDepartment()) {
                                        $attachment = $absence->getAttachment() != "" ? getFilenameOf($absence->getAttachment()) : "...";
                                    ?>
                                        <div class="form-group">
                                            <label for="fullname">Họ và tên</label> 
                                            <input type="text" class="form-control" id="fullname" value="<?= $employee->getFullname() ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="department">Phòng ban</label> 
                                            <input type="text" class="form-control" id="department" value="<?= $department->getName() ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_submit">Ngày nộp đơn</label> 
                                            <input type="text" class="form-control" id="date_submit" value="<?= dateFormatter($absence->getCreatedDate()) ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="count_offday">Số ngày nghỉ</label> 
                                            <input type="number" class="form-control" id="count_offday" 
                                                value="<?= getDateDistance($absence->getStartDate(), $absence->getEndDate()) ?>" 
                                                disabled>
                                        </div>                 
                                        <div class="form-group">
                                            <label for="start_offday">Ngày bắt đầu nghỉ</label> 
                                            <input type="text" class="form-control" id="start_offday" value="<?= dateFormatter($absence->getStartDate()) ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="end_offday">Ngày đi làm lại</label> 
                                            <input type="text" class="form-control" id="end_offday" value="<?= dateFormatter($absence->getEndDate()) ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="reason_offday">Lý do</label>
                                            <textarea id="reason_offday" class="form-control" disabled><?= $absence->getReason() ?></textarea>
                                        </div>
                                        <?php
                                        if (!empty($absence->getAttachment())) {
                                            ?>
                                            <div class="form-group">
                                                <label for="attachments_offday">Tệp đính kèm (nếu có)</label>
                                                <a href="<?= $absence->getAttachment() ?>" class="form-control-file" id="attachments_offday"><?= $attachment ?></a>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                            if ($absence->getStatus() == 0) {
                                            ?>
                                                <div class="form-group">
                                                    <label for=""></label>
                                                    <a href="../../controllers/monitor/censored.php?id=<?= $absence->getId() ?>&option=approve" class="btn btn-success my-2 p-3">Approve</a>
                                                    <a href="../../controllers/monitor/censored.php?id=<?= $absence->getId() ?>&option=refuse" class="btn btn-danger my-2 ml-3 p-3 px-4">Refuse</a>
                                                </div>
                                            <?php
                                            }
                                        ?>
                                    <?php
                                        break;
                                    }
                                }
                                break;
                            }
                        }
                    }
                ?>     
            </div>
        </div>      
    </body>
    </html>
