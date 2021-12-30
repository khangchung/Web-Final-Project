    <?php
        session_start();
        require_once("../../models/setup.php");
        require_once("../../models/task.php");
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
            require_once('../includes/sidebar_employee.php');
        ?>
        <div class="page-wrap">
            
            <!--Xem thông tin chi tiết task -->
            <div id="task_info">
                <h2 style="margin-bottom: 30px">THÔNG TIN CHI TIẾT TASK</h2>
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
                    ?>
                        <table class="text-left" >
                            <tr>
                                <td>Tên Task</td>
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
                                <td>File đính kèm</td>
                                <td>
                                    <a href="#">dinhkem.rar</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Trạng thái</td>
                                <td class="<?= $text_color ?>"><?= $status ?></td>
                            </tr>
                        </table>
                        <!-- Xóa comment này và thêm code giao diện bảng task log ở đây -->
                        <h3>Lịch sử nộp task</h3>
                        <table class="text-left" >
                            <tr>
                                <td>Comment</td>
                                <td>Tệp đính kèm</td>
                            </tr>
                            <tr>
                                <td>Comment1</td>
                                <td>
                                    <a href="#">dinhkem1.rar</a>
                                </td>
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
                                <form action="" class=" mt-5 p-3" >
                                    <div class="form-group">
                                        <label for="comment">Comment</label>
                                        <input type="date" id="comment" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="file">Tệp đính kèm</label>
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

        </div>   
        
    </body>
    </html>
