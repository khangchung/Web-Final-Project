    <?php
        session_start();
        require_once("../../models/task_log.php");
        require_once("../../models/task.php");
        require_once("../../models/setup.php");
        priorityChecker(2);
        $task = isset($_SESSION["task"]) ? unserialize($_SESSION["task"]) : "";
        $task_logs = isset($_SESSION["task_logs"]) ? $_SESSION["task_logs"] : "";
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
    <style>
        #task_info{
            margin: 50px;
            width: auto;
        }


        #task_info table {
            width: 100%;
            max-width: 550px;
        }
        #task_info tr td{
            border: 1px solid black;
            padding: 8px 12px;
        }
        #task_info tr td:first-child{
            font-weight: bold;
            min-width: 180px;
        }
    </style>
    <body>
        <?php
            require_once('../includes/sidebar_employee.php');
        ?>
        <div class="page-wrap">
            
            <!--Xem thông tin chi tiết task -->
            <div id="task_info">
                <div  class="d-flex justify-content-between">
                    <div class="mr-5">
                        <h2 style="margin-bottom: 30px">THÔNG TIN CHI TIẾT NHIỆM VỤ</h2>
                        <?php
                            if (!empty($task)) {
                                $text_color = "primary";
                                $status = "New";
                                if ($task->getStatus() == 1) {
                                    $status = "In progress";
                                    $text_color = "secondary";
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
                                $filename = getFilenameOf($task->getAttachment()) != "" ? getFilenameOf($task->getAttachment()) : "...";
                            ?>
                            <table class="text-left">
                                <tr>
                                    <td>Tên nhiệm vụ</td>
                                    <td><?= $task->getTitle() ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày bắt đầu</td>
                                    <td><?= dateFormatter($task->getCreatedDate()) ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày hoàn thành</td>
                                    <td><?= dateFormatter($task->getDeadline()) ?></td>
                                </tr>
                                <tr>
                                    <td>Mô tả công việc</td>
                                    <td>
                                    Mô tả công việcMô tả công việcMô tả công việcMô tả công việcMô tả công việcMô tả công việcMô tả công việcMô tả công việcMô tả công việcMô tả công việcMô tả công việc
                                        <?= $task->getDescription() ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tệp đính kèm</td>
                                    <td>
                                        <a href="<?= $task->getAttachment() ?>"><?= $filename ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <td class="text-<?= $text_color ?>"><?= $status ?></td>
                                </tr>
                            </table>
                        <?php
                        if ($task->getStatus() == 0) {
                        ?>
                            <button class="btn btn-primary d-block ml-auto mt-3 px-5">Start</button>
                        <?php
                        } else
                        if ($task->getStatus() == 1) {
                        ?>
                            <form action="" class=" mt-5 p-3" style="max-width: 550px;">
                                <div class="form-group">
                                    <label for="comment" class="font-weight-bold">Tiêu đề</label>
                                    <input type="text" id="comment" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="file" class="font-weight-bold">Tệp đính kèm</label>
                                    <input type="file" class="form-control-file" id="file">
                                </div>
                                <button class="btn btn-success d-block ml-auto mt-3 px-5">Submit</button>
                            </form>
                        <?php
                        }
                    ?>
                <?php
                
                }
            ?>
                    </div>
                   
                       
                <!-- Xóa comment này và thêm code giao diện bảng task log ở đây -->
                
                <div class="ml-5">
                    <h3>Lịch sử phản hồi</h3>
                    <table class="text-left">
                        <tr>
                            <td>Đánh giá</td>
                            <td class="font-weight-bold">Tệp đính kèm</td>
                        </tr>
                        <?php
                            if (!empty($task_logs)) {
                                foreach ($task_logs as $task_log) {
                                    $task_log = unserialize($task_log);
                                    $filename = getFilenameOf($task_log->getAttachment()) != "" ? getFilenameOf($task_log->getAttachment()) : "...";
                                    ?>
                                        <tr>
                                            <td class="font-weight-normal"><?= $task_log->getComment() ?></td>
                                            <td>
                                                <a href="#"><?= $filename ?></a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                    </table>
                </div>

                </div>

            </div>   
        </div>
</body>
    </html>
