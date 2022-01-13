    <?php
        session_start();
        require_once("../../models/department.php");
        require_once("../../models/setup.php");
        priorityChecker(0);
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
        <title>Giao diện</title>
    </head>

    <body>
        <?php
            require_once('../includes/sidebar_admin.php');
        ?>
        <div class="page-wrap">
            <div class="main_wrap" id="department_manager">
                <a href="add_department.php" style="text-decoration: none;">
                    <button class="btn_add">
                        Thêm phòng ban
                    </button>
                </a>
                <h2 class="title">Danh sách phòng ban</h2>
                <table class="table_responsive">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên phòng ban</th>
                            <th>Trưởng phòng</th>
                            <th>Mô tả</th>
                            <th>Số phòng</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($departments)) {
                                for ($i=0; $i < count($departments); $i++) {
                                    $department = unserialize($departments[$i]);
                                    if (!empty($employees)) {
                                        $fullname = "...";
                                        foreach ($employees as $employee) {
                                            $employee = unserialize($employee);
                                            if ($employee->getDepartment() == $department->getId()
                                                && $employee->getPosition() == 1) {
                                                $fullname = $employee->getFullname();
                                                break;
                                            }
                                        }
                                        ?>
                                            <tr id="<?= $department->getId() ?>">
                                                <td data-label="STT"><?= $i+1 ?></td>
                                                <td data-label="Tên phòng ban"><?= $department->getName() ?></td>
                                                <td data-label="Trưởng phòng"><?= $fullname ?></td>
                                                <td data-label="Mô tả"><?= $department->getDescription() ?></td>
                                                <td data-label="Số phòng"><?= $department->getRoom() ?></td>
                                                <td data-label="Chức năng">
                                                    <i class="bi bi-eye-fill mr-2 text-info " style="font-size: 32px"></i>
                                                    <a href="edit_department.php?id=<?= $department->getId() ?>">
                                                        <i class="bi bi-pencil-square text-warning" style="font-size: 32px"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                    } else {
                                        ?>
                                            <tr id="<?= $department->getId() ?>">
                                                <td><?= $i+1 ?></td>
                                                <td><?= $department->getName() ?></td>
                                                <td>...</td>
                                                <td><?= $department->getDescription() ?></td>
                                                <td><?= $department->getRoom() ?></td>
                                                <td>
                                                    <i class="bi bi-eye-fill mr-2 text-info " style="font-size: 32px"></i>
                                                    <a href="edit_department.php?id=<?= $department->getId() ?>">
                                                        <i class="bi bi-pencil-square text-warning" style="font-size: 32px"></i>
                                                    </a>
                                                </td>
                                                </td>
                                            </tr>
                                        <?php
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