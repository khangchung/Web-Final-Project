    <?php
        session_start();
        require_once("../../models/employee.php");
        require_once("../../models/task.php");
        require_once("../../models/setup.php");
        priorityChecker(1);
        $employees = isset($_SESSION["employees"]) ? $_SESSION["employees"] : "";
        $task = isset($_SESSION["task"]) ? unserialize($_SESSION["task"]) : "";
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
        <title>Chi tiết nhiệm vụ</title>
    </head>
    <body>
        <?php
            require_once('../includes/sidebar_monitor.php');
        ?>
        <div class="page-wrap">
            
            <!--Xem thông tin chi tiết task -->
            <div class="main_wrap" id="task_info">
<<<<<<< HEAD
                <div class="d-flex justify-content-between">
                    <div>
                        <h2 style="margin-bottom: 30px">CHI TIẾT NHIỆM VỤ</h2>
                    <?php
                        if (!empty($employees) && !empty($task)) {
                            foreach ($employees as $employee) {
                                $employee = unserialize($employee);
                                if ($employee->getId() == $task->getReceiver()) {
                                    $attachment = "...";
                                    if ($task->getAttachment() != "") {
                                        $attachment = getFilenameOf($task->getAttachment());
                                    }
                                    $text_color = "primary";
                                    $status = "New";
                                    if ($task->getStatus() == 1) {
                                        $status = "In progress";
                                        $text_color = "secondary";
                                    } else
                                    if ($task->getStatus() == 2) {
                                        $status = "Cancel";
                                        $text_color = "danger";
                                    } else
                                    if ($task->getStatus() == 3) {
                                        $status = "Waiting";
                                        $text_color = "warning";
                                    } else
                                    if ($task->getStatus() == 4) {
                                        $status = "Rejected";
                                        $text_color = "danger";
                                    } else
                                    if ($task->getStatus() == 5) {
                                        $status = "Completed";
                                        $text_color = "success";
                                    }
                                    ?>
                                        
                                            <table>
                                                <tr>
                                                    <td>Tiêu đề</td>
                                                    <td><?= $task->getTitle() ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nhân viên thực hiện</td>
                                                    <td><?= $employee->getFullname() ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Ngày bắt đầu</td>
                                                    <td><?= dateFormatter($task->getCreatedDate()) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Deadline</td>
                                                    <td><?= dateFormatter($task->getDeadline()) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Mô tả công việc</td>
                                                    <td>
                                                        <?= $task->getDescription() ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tệp đính kèm</td>
                                                    <td>
                                                        <a href="<?= $task->getAttachment() ?>"><?= $attachment ?></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Trạng thái</td>
                                                    <td class="font-weight-bold text-<?= $text_color ?>"><?= $status ?></td>
                                                </tr>
                                            </table>
                                           
                                        
                                        <?php
                                            if ($task->getStatus() == 3) {
                                                $done_date = date("Y-m-d");
                                                ?>
                                                    <div class="form-group" id="done_task_monitor" task_id="<?= $task->getId() ?>">
                                                        <?php
                                                        if (getDateDistance($done_date, $task->getDeadline()) <= 0) {
                                                        ?>
                                                            <select name="rate" id="rate" class="form-control mr-2">
                                                                <option value="1">Good</option>
                                                                <option value="0">OK</option>
                                                                <option value="-1">Bad</option>
                                                            </select>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <select name="rate" id="rate" class="form-control">
                                                                <option value="0">OK</option>
                                                                <option value="-1">Bad</option>
                                                            </select>
                                                        <?php
                                                        }
                                                        ?>
                                                                <a class="btn btn-success ml-2 px-5 ">Approve</a>
                                                    </div>
                                              
                                                    <form action="../../controllers/monitor/reject_task.php" enctype="multipart/form-data" class="w-auto">
                                                        
                                                                <div class="form-group">
                                                                    <input name="comment" class="form-control" id="comment" placeholder="Nhận xét..." type="text"></input>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="customFile">
                                                                        <label class="custom-file-label form-control" for="customFile">Tệp đính kèm</label>
                                                                    </div>
                                                                        <a class="btn btn-danger px-5">Refuse</a>
                                                                </div>

                                                    </form>
                </div>
=======
                <h2 style="margin-bottom: 30px">CHI TIẾT NHIỆM VỤ</h2>
                <?php
                    if (!empty($employees) && !empty($task)) {
                        foreach ($employees as $employee) {
                            $employee = unserialize($employee);
                            if ($employee->getId() == $task->getReceiver()) {
                                $attachment = "...";
                                if ($task->getAttachment() != "") {
                                    $attachment = getFilenameOf($task->getAttachment());
                                }
                                $text_color = "primary";
                                $status = "New";
                                if ($task->getStatus() == 1) {
                                    $status = "In progress";
                                    $text_color = "secondary";
                                } else
                                if ($task->getStatus() == 2) {
                                    $status = "Cancel";
                                    $text_color = "danger";
                                } else
                                if ($task->getStatus() == 3) {
                                    $status = "Waiting";
                                    $text_color = "warning";
                                } else
                                if ($task->getStatus() == 4) {
                                    $status = "Rejected";
                                    $text_color = "danger";
                                } else
                                if ($task->getStatus() == 5) {
                                    $status = "Completed";
                                    $text_color = "success";
                                }
                                ?>
                                    <table>
                                        <tr>
                                            <td>Tiêu đề</td>
                                            <td><?= $task->getTitle() ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nhân viên thực hiện</td>
                                            <td><?= $employee->getFullname() ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ngày bắt đầu</td>
                                            <td><?= dateFormatter($task->getCreatedDate()) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Deadline</td>
                                            <td><?= dateFormatter($task->getDeadline()) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Mô tả công việc</td>
                                            <td>
                                                <?= $task->getDescription() ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tệp đính kèm</td>
                                            <td>
                                                <a href="<?= $task->getAttachment() ?>"><?= $attachment ?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Trạng thái</td>
                                            <td class="font-weight-bold text-<?= $text_color ?>"><?= $status ?></td>
                                        </tr>
                                    </table>
                                    <?php
                                        if ($task->getStatus() == 3) {
                                            $done_date = date("Y-m-d");
                                            ?>
                                                <div class=" mt-5" id="done_task_monitor" style="max-width: 450px;" task_id="<?= $task->getId() ?>">
                                                    <h3>Đánh giá</h3>
                                                    <?php
                                                    if (getDateDistance($done_date, $task->getDeadline()) <= 0) {
                                                    ?>
                                                        <select name="rate" id="rate" class="w-100 mr-2">
                                                            <option value="1">Good</option>
                                                            <option value="0">OK</option>
                                                            <option value="-1">Bad</option>
                                                        </select>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <select name="rate" id="rate" class="w-100 mr-2">
                                                            <option value="0">OK</option>
                                                            <option value="-1">Bad</option>
                                                        </select>
                                                    <?php
                                                    }
                                                    ?>
                                                            <!-- <a class="btn btn-success mt-3 mr-2 px-5">Duyệt</a> -->
                                                    
                                                    <?php
                                                ?>
                                        
                                                    <form action="../../controllers/monitor/reject_task.php" enctype="multipart/form-data" style="width: auto">
                                                        <div class="form-group">
                                                            <label for="comment">Nhận xét</label>
                                                            <textarea name="comment" id="comment" type="text" class="w-100"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="attachemnt">Tệp đính kèm</label>
                                                            <input name="attachment" id="attachment" type="file">
                                                        </div>
                                                        <div class="form-group justify-content-end">
                                                            <input type="button" class="btn btn-success mt-3 mr-2 px-5" value="Approve"></input>
                                                            <input type="button" class="btn btn-danger mt-3 px-5" value="Refuse"></input>
                                                        </div>
                                                    </form>
                                                </div>
>>>>>>> 126708269ba18e2533b7b4d2236f36fa3d204a50
                                        <?php
                                        }
                                    ?>
                                <?php
                                break;
                            }
                        }
                    }
                ?>
                

                <div class="ml-5">
                    <h2 class="mb-4">Lịch sử phản hồi</h2>
                    <table class="text-left feedback_history" style="max-width: 400px">
                        <tr>
                            <td>Thông điệp</td>
                            <td>Tệp đính kèm</td>
                        </tr>
                        
                        <tr>
                            <td class="font-weight-normal">thongdiep</td>
                            <td>
                                <a href="#">tepdinhkem.rar</a>
                            </td>
                        </tr>
                                    
                    </table>
                </div>
            </div>
        </div>   
        
    </body>
    </html>
