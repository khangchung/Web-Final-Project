    <?php
        session_start();
        require_once("../../models/setup.php");
        require_once("../../models/employee.php");
        require_once("../../models/task.php");
        priorityChecker(1);
        $tasks = isset($_SESSION["tasks"]) ? $_SESSION["tasks"] : "";
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
        <title>Giao diện</title>
    </head>
    <body>
        <?php
            require_once('../includes/sidebar_monitor.php');
        ?>
        <div class="page-wrap">
            
            <!-- Quản lý task -->
            <div class="main_wrap" id="task_manager_moniter">
                <a href="create_task.php" style="text-decoration: none;">
                    <button class="btn btn-info d-block ml-auto p-3 text-dark">
                        Thêm nhiệm vụ
                    </button>
                </a>
                <h2 style="margin-bottom: 30px">DANH SÁCH NHIỆM VỤ</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nhiệm vụ</th>
                            <th>Nhân viên thực hiện</th>
                            <th>Deadline</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($tasks) && !empty($employees)) {
                                foreach ($tasks as $task) {
                                    $task = unserialize($task);
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
                                    foreach ($employees as $employee) {
                                        $employee = unserialize($employee);
                                        if ($task->getReceiver() == $employee->getId()) {
                                            $fullname = $employee->getFullname();
                                            ?>
                                                <tr id="<?= $task->getId() ?>">
                                                    <td><?= $task->getTitle() ?></th>
                                                    <td><?= $fullname ?></th>
                                                    <td><?= dateFormatter($task->getDeadline()) ?></th>
                                                    <td class="font-weight-bold text-<?= $text_color ?>"><?= $status ?></th>
                                                </tr>
                                            <?php
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
        
    </body>
    </html>
