    <?php
        session_start();
        require_once("../../models/absence.php");
        require_once("../../models/employee.php");
        require_once("../../models/department.php");
        require_once("../../models/setup.php");
        priorityChecker(0);
        $absences = isset($_SESSION["absences"]) ? $_SESSION["absences"] : "";
        $departments = isset($_SESSION["departments"]) ? $_SESSION["departments"] : "";
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
        <title>Quản lý yêu cầu nghỉ phép</title>
    </head>
    <body>
        
        <?php
            require_once('../includes/sidebar_admin.php');
        ?>
        <div class="page-wrap">
            
            <div class="main_wrap" id="offday_manager">
                <h2 class="title">Quản lý ngày nghỉ</h2>
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
                            if (!empty($absences) && !empty($departments) && !empty($employees)) {
                                for ($i=0; $i < count($absences); $i++) {
                                    $absence = unserialize($absences[$i]);
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
                                    for ($j=0; $j < count($employees); $j++) {
                                        $employee = unserialize($employees[$j]);
                                        foreach ($departments as $department) {
                                            $department = unserialize($department);
                                            if ($department->getId() == $employee->getDepartment()) {
                                                if ($employee->getId() == $absence->getEmployeeId()) {
                                                    ?>
                                                        <tr class="offdayId" id="<?= $absence->getId() ?>">
                                                            <td data-label="STT"><?= $i+1 ?></td>
                                                            <td data-label="Mã nhân viên"><?= $absence->getEmployeeId() ?></td>
                                                            <td data-label="Họ và tên"><?= $employee->getFullname() ?></td>
                                                            <td data-label="Phòng ban"><?= $department->getName() ?></td>
                                                            <td data-label="Ngày nộp đơn"><?= dateFormatter($absence->getCreatedDate()) ?></td>
                                                            <td data-label="Số ngày nghỉ">
                                                                <?= getDateDistance($absence->getStartDate(), $absence->getEndDate()) ?>
                                                            </td>
                                                            <td data-label="Lý do"><?= $absence->getReason() ?></td>
                                                            <td data-label="Trạng thái" class="font-weight-bold text-<?= $text_color ?>" style="font-weight: 500;">
                                                                <?= $text ?>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    break;
                                                }
                                            }
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
