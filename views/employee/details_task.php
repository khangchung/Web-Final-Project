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
        <title>Chi tiết nhiệm vụ</title>
        
    </head>
    <body>
        <?php
            require_once('../includes/sidebar_employee.php');
        ?>
        <div class="page-wrap">
            
            <!--Xem thông tin chi tiết task -->
            <div class="main_wrap" id="task_info">
                <div  class="d-flex justify-content-between">
                    <div class="mr-5">
                        <h2 class="title">THÔNG TIN CHI TIẾT NHIỆM VỤ</h2>
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
                                    $text_color = "secondary";
                                } else
                                if ($task->getStatus() == 5) {
                                    $status = "Completed";
                                    $text_color = "success";
                                }
                                $filename = getFilenameOf($task->getAttachment()) != "" ? getFilenameOf($task->getAttachment()) : "...";
                            ?>
                            <table class="text-left details_task">
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
                                    <td class="font-weight-bold text-<?= $text_color ?>"><?= $status ?></td>
                                </tr>
                            </table>
                        <?php
                        if ($task->getStatus() == 0) {
                        ?>
                            <div class="justify-content-end">
                            <a href="../../controllers/employee/start_task.php?id=<?= $task->getId() ?>" class="btn btn-primary ml-auto mt-3 px-5">Start</a>
                            </div>
                        <?php
                        } else
                        if ($task->getStatus() == 1) {
                        ?>
                            <form action="../../controllers/employee/submit_task.php" method="POST" enctype="multipart/form-data" class=" mt-5 p-3" style="max-width: 550px;">
                                <div class="form-group d-none">
                                    <input name="id" type="text" class="form-control" value="<?= $task->getId() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="comment" class="font-weight-bold">Tin nhắn</label>
                                    <input name="comment" type="text" id="comment" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="file" class="font-weight-bold">Tệp đính kèm</label>
                                    <input name="attachment" type="file" class="form-control-file" id="file">
                                </div>
                                <button type="submit" class="btn btn-success d-block ml-auto mt-3 px-5">Submit</button>
                            </form>
                        <?php
                        }
                    ?>
                <?php
                
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
                                    $filename = getFilenameOf($task_log->getAttachment()) != "" ? getFilenameOf($task_log->getAttachment()) : "...";
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

            </div>   
        </div>
</body>
    </html>
