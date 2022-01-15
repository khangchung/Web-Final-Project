    <?php
        session_start();
        require_once("../../models/department.php");
        require_once("../../models/employee.php");
        require_once("../../models/absence.php");
        require_once("../../models/setup.php");
        priorityChecker(1);
        $info = isset($_SESSION["information"]) ? unserialize($_SESSION["information"]) : "";
        $absences = isset($_SESSION["absences"]) ? $_SESSION["absences"] : "";
        $departments = isset($_SESSION["departments"]) ? $_SESSION["departments"] : "";
        $employees = isset($_SESSION["employees"]) ? $_SESSION["employees"] : "";
        $employee_absences = isset($_SESSION["employee_absences"]) ? $_SESSION["employee_absences"] : "";
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
        <title>Quản lý yêu cầu nghỉ phép</title>
    </head>
    <body>
        <?php
            require_once('../includes/sidebar_monitor.php');
        ?>
        <div class="page-wrap">
            <!-- Quan ly ngay nghi -->
            <div class="main_wrap">
                <div class="header">
                    <h2 class="title">Quản lý ngày nghỉ</h2>
                    <a href="form_offday.php" style="text-decoration: none;">
                        <button class="main_button">
                            Nộp đơn nghỉ phép
                        </button>
                    </a>
                </div>
                <div>
                   <div>
                        <table class="table_responsive main_table">
                            <thead>
                                <tr>
                                    <th>Mã nhân viên</th>
                                    <th>Họ & tên</th>
                                    <th>Số ngày được nghỉ</th>
                                    <th>Số ngày đã nghỉ</th> 
                                    <th>Số ngày còn lại</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (!empty($info)) {
                                ?>
                                    <tr>
                                        <td data-label="Mã nhân viên"><?= $info->getId() ?></td>
                                        <td data-label="Họ & tên"><?= $info->getFullname() ?></td>
                                        <td data-label="Số ngày được nghỉ"><?= $info->getDayOff() ?></td>
                                        <td data-label="Số ngày đã nghỉ"><?= countDayOff($absences) ?></td> 
                                        <td data-label="Số ngày còn lại"><?= $info->getDayOff() - countDayOff($absences) ?></td>
                                    </tr>
                                <?php
                                }
                            ?>
                            </tbody>
                        </table>
                   </div>
                   <div class="mt-5" id="history_offday_monitor">
                        <h2>Lịch sử ngày nghỉ</h2>
                        <table class="table_responsive main_table">
                            <thead>
                                <tr>
                                    <th>Mã nhân viên</th>
                                    <th>Họ & tên</th>
                                    <th>Số ngày nghỉ</th>
                                    <th>Lý do nghỉ</th> 
                                    <th>Từ ngày</th>
                                    <th>Đến ngày</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (!empty($info) && !empty($absences)) {
                                    foreach ($absences as $absence) {
                                        $absence = unserialize($absence);
                                        $status = $absence->getStatus();
                                        $text = "Waiting";
                                        $text_color = "warning";
                                        if ($status == 1) {
                                            $text_color = "success";
                                            $text = "Approved";
                                        } else
                                        if ($status == -1) {
                                            $text_color = "danger";
                                            $text = "Refused";
                                        }
                                        ?>
                                            <tr id="<?= $absence->getId() ?>">
                                                <td data-label="Mã nhân viên"><?= $info->getId() ?></td>
                                                <td data-label="Họ & tên"><?= $info->getFullname() ?></td>
                                                <td data-label="Số ngày nghỉ"><?= getDateDistance($absence->getStartDate(), $absence->getEndDate()) ?></td>
                                                <td data-label="ý do nghỉ"><?= $absence->getReason() ?></td>
                                                <td data-label="Từ ngày"><?= dateFormatter($absence->getStartDate()) ?></td>
                                                <td data-label="Đến ngày"><?= dateFormatter($absence->getEndDate()) ?></td>
                                                <td data-label="Trạng thái" class="font-weight-bold text-<?= $text_color ?>"><?= $text ?></td>
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                   </div>
                   <!-- Trưởng phòng duyệt đơn cho nhân viên -->
                   <div class="mt-5" id="offday_manager_moniter">
                        <h2>Duyệt đơn nghỉ phép</h2>
                        <table class="table_responsive main_table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã nhân viên</th>
                                    <th>Họ và tên</th>
                                    <th>Phòng ban</th>
                                    <th>Ngày nộp đơn</th>
                                    <th>Số ngày nghỉ</th>
                                    <th>Lý do</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (!empty($info) && !empty($employee_absences) && !empty($departments) && !empty($employees)) {
                                    for ($i=0; $i < count($employee_absences); $i++) {
                                        $absence = unserialize($employee_absences[$i]);
                                        $status = $absence->getStatus();
                                        $text = "Waiting";
                                        $text_color = "warning";
                                        if ($status == 1) {
                                            $text_color = "success";
                                            $text = "Approved";
                                        } else
                                        if ($status == -1) {
                                            $text_color = "danger";
                                            $text = "Refused";
                                        }
                                        foreach ($employees as $employee) {
                                            $employee = unserialize($employee);
                                            if ($employee->getId() == $absence->getEmployeeId()) {
                                                foreach ($departments as $department) {
                                                    $department = unserialize($department);
                                                    if ($employee->getDepartment() == $department->getId()) {
                                                    ?>
                                                        <tr id="<?= $absence->getId() ?>">
                                                            <td data-label="STT"><?= $i+1 ?></td>
                                                            <td data-label="Mã nhân viên"><?= $employee->getId() ?></td>
                                                            <td data-label="Họ và tên"><?= $employee->getFullname() ?></td>
                                                            <td data-label="Phòng ban"><?= $department->getName() ?></td>
                                                            <td data-label="Ngày nộp đơn"><?= dateFormatter($absence->getCreatedDate()) ?></td>
                                                            <td data-label="Số ngày nghỉ"><?= getDateDistance($absence->getStartDate(), $absence->getEndDate()) ?></td>
                                                            <td data-label="Lý do"><?= $absence->getReason() ?></td> 
                                                            <td data-label="Trạng thái" class="font-weight-bold text-<?= $text_color ?>"><?= $text ?></td>
                                                        </tr>
                                                    <?php
                                                        break;
                                                    }
                                                }
                                                break;
                                            }
                                        }
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                   </div>
                </div>
            </div>
        </div>   
    </body>
    </html>
