    <?php
        session_start();
        require_once("../../models/employee.php");
        require_once("../../models/task_log.php");
        require_once("../../models/task.php");
        require_once("../../models/setup.php");
        priorityChecker(1);
        $employees = isset($_SESSION["employees"]) ? $_SESSION["employees"] : "";
        $task = isset($_SESSION["task"]) ? unserialize($_SESSION["task"]) : "";
        $task_logs = isset($_SESSION["task_logs"]) ? $_SESSION["task_logs"] : "";
        $employee_info = null;
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
            <div class="main_wrap d-flex justify-content-between" id="task_info">
                <div class="d-flex">
                    <div class="chitiet mr-5">
                        <h2 style="margin-bottom: 30px">CHI TIẾT NHIỆM VỤ</h2>
                        <?php
                        if (!empty($employees) && !empty($task)) {
                            foreach ($employees as $employee) {
                                $employee = unserialize($employee);
                                if ($employee->getId() == $task->getReceiver()) {
                                    $employee_info = $employee;
                                    $attachment = $task->getAttachment() != "" ? getFilenameOf($task->getAttachment()) : "...";
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
                                        $text_color = "secondary";
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
                            <?php
                                if ($status == "Completed") {
                                    $rate = "OK";
                                    $text_color2 = "success";
                                    if ($task->getRate() == 1) {
                                        $rate = "Good";
                                    } else
                                    if ($task->getRate() == 1) {
                                        $rate = "Bad";
                                        $text_color2 = "warning";
                                    }
                                ?>
                            <tr>
                                <td>Đánh giá</td>
                                <td class="font-weight-bold text-<?= $text_color2 ?>"><?= $rate ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>


                        <?php
                            if ($task->getStatus() == 3) {
                                $done_date = date("Y-m-d");
                                ?>
                        <div class="form-group" id="done_task_monitor" task_id="<?= $task->getId() ?>">
                            <?php
                                if (getDateDistance($done_date, $task->getDeadline()) >= 0) {
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

                        <?php
                            if (!is_null($employee_info)) {
                        ?>
                        <form action="../../controllers/monitor/reject_task.php" method="POST"
                            enctype="multipart/form-data" class="w-auto">
                            <div class="form-group d-none">
                                <input name="id" class="form-control" id="comment" value="<?= $task->getId() ?>"
                                    type="text">
                            </div>
                            <div class="form-group d-none">
                                <input name="employee_id" class="form-control" id="comment"
                                    value="<?= $employee_info->getId() ?>" type="text">
                            </div>
                            <div class="form-group d-none">
                                <input name="department" class="form-control" id="comment"
                                    value="<?= $employee_info->getDepartment() ?>" type="text">
                            </div>
                            <div class="form-group">
                                <input name="comment" class="form-control" id="comment" placeholder="Nhận xét..."
                                    type="text">
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" accept=".gif,.jpg,.jpeg,.png,.doc,.docx,.pdf,.xls,.xlsx,.zip,.rar,.txt" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label form-control" for="customFile">Tệp đính kèm</label>
                                </div>
                                <button type="submit" class="btn btn-danger px-5">Refuse</button>
                            </div>
                        </form>
                        <?php
                            }
                        ?>

                    </div>
                    <?php
                                        }
                                    ?>
                    <?php
                                break;
                            }
                        }
                    }
                ?>


                </div>
                <div class="ml-5">
                    <h2 class="mb-4">Lịch sử phản hồi</h2>
                    <table class="text-left feedback_history" style="max-width: 400px">
                        <tr>
                            <td>Tin nhắn</td>
                            <td>Tệp đính kèm</td>
                        </tr>
                        <?php
                        if (!empty($task_logs)) {
                            foreach ($task_logs as $task_log) {
                                $task_log = unserialize($task_log);
                                $filename = $task_log->getAttachment() != "" ? getFilenameOf($task_log->getAttachment()) : "...";
                                ?>
                        <tr>
                            <td class="font-weight-normal"><?= $task_log->getComment() ?></td>
                            <td>
                                <a href="<?= $task_log->getAttachment() ?>"><?= $filename ?></a>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                    ?>
                    </table>
                </div>
            </div>

    </body>

    </html>