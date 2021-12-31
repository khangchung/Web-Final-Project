    <?php
        session_start();
        require_once("../../models/setup.php");
        priorityChecker(2);
        $info = isset($_SESSION["information"]) ? unserialize($_SESSION["information"]) : "";
        $absences = isset($_SESSION["absences"]) ? $_SESSION["absences"] : "";
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
            require_once('../includes/sidebar_employee.php');
        ?>
        <div class="page-wrap">
            <!-- Quan ly ngay nghi -->
            <div class="main_wrap">
                <a href="form_offday.php" style="text-decoration: none;">
                    <button class="btn btn-info d-block ml-auto p-3 text-dark">
                        Nộp đơn nghỉ phép
                    </button>
                </a>
                <div class="offDay_body">
                   <div class="offDay_body-manage">
                        <h3 style="margin-bottom: 20px;">Quản lý ngày nghỉ</h3>
                        <table>
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
                                    if (!empty($info) && !empty($absences)) {
                                    ?>
                                        <tr>
                                            <td><?= $info->getId() ?></td>
                                            <td><?= $info->getFullname() ?></td>
                                            <td><?= $info->getDayOff() ?></td>
                                            <td><?= countDayOff($absences) ?></td> 
                                            <td><?= $info->getDayOff() - countDayOff($absences) ?></td>
                                        </tr>
                                    <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                   </div>
                   <div class="offDay_body-history" style="margin-top: 50px;">
                        <h3>Lịch sử ngày nghỉ</h3>
                        <table>
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
                                                <tr>
                                                    <td><?= $info->getId() ?></td>
                                                    <td><?= $info->getFullname() ?></td>
                                                    <td><?= getDateDistance($absence->getStartDate(), $absence->getEndDate()) ?></td>
                                                    <td><?= $absence->getReason() ?></td>
                                                    <td><?= dateFormatter($absence->getStartDate()) ?></td>
                                                    <td><?= dateFormatter($absence->getEndDate()) ?></td>
                                                    <td class="text-<?= $text_color ?>"><?= $text ?></td>
                                                </tr>
                                            <?php
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
