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
        <title>Giao diện</title>
    </head>
    <body>
        <?php
            require_once('../includes/sidebar_monitor.php');
        ?>
        <div class="page-wrap">
            
            <!--Xem thông tin chi tiết task -->
            <div id="task_info">
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
                                    <table class="text-left" >
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
                                                <select name="rate" id="rate" class="form-control mr-2">
                                                    <option value="0">OK</option>
                                                    <option value="-1">Bad</option>
                                                </select>
                                            <?php
                                            }
                                            ?>
                                                    <a class="btn btn-success mt-3 mr-2 px-5">Approve</a>
                                                </div>
                                            <?php
                                        ?>
                                        
                                        <form action="../../controllers/monitor/reject_task.php" enctype="multipart/form-data" class="form-group">
                                            <label for="comment">Nhận xét</label>
                                            <input name="comment" id="comment" type="text">
                                            <label for="attachemnt">Tệp đính kèm</label>
                                            <input name="attachment" id="attachment" type="file">
                                            <button class="btn btn-danger mt-3 px-5">Refuse</button>
                                        </form>
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
        </div>   
        
    </body>
    </html>
