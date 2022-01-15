    <?php
        session_start();
        require_once("../../models/department.php");
        require_once("../../models/setup.php");
        priorityChecker(0);
        $department = isset($_SESSION["department"]) ? unserialize($_SESSION["department"]) : "";
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
        <title>Chi tiết phòng ban</title>
    </head>
    <body>
        <?php
            require_once('../includes/sidebar_admin.php');
        ?>
        <div class="page-wrap">
            <div class="m-5" id="">
                <h2 class="title" >Thông tin phòng ban</h2>
                <?php
                    if (!empty($department)) {
                        if (!empty($employees)) {
                            $loop_flag = true;
                            foreach ($employees as $employee) {
                                $employee = unserialize($employee);
                                if ($department->getId() == $employee->getDepartment()
                                    && $employee->getPosition() == 1) {
                                ?>
                                    <form action="../../controllers/admin/appoint.php" method="POST">
                                        <div class="d-none">
                                            <input name="department" type="text" class="form-control" value="<?= $department->getId() ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="department_id">Tên phòng ban</label> 
                                            <input type="text" class="form-control" id="department_name" value="<?= $department->getName() ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="department_id">Trưởng phòng</label> 
                                            <input type="text" class="form-control" id="employee_name" value="<?= $employee->getFullname() ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="department_desc">Mô tả</label>
                                            <textarea type="text" class="form-control" id="department_desc" class="form-control" disabled><?= $department->getDescription() ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="room_number">Số phòng</label>
                                            <input type="number" class="form-control" id="room_number" value="<?= $department->getRoom() ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="room_number">Bổ nhiệm</label>
                                            <select name="username" class="form-control">
                                            <?php
                                                foreach ($employees as $employee) {
                                                    $employee = unserialize($employee);
                                                    if ($employee->getDepartment() == $department->getId()) {
                                                        ?>
                                                            <option value="<?= $employee->getUsername() ?>"><?= $employee->getUsername() ?></option>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for=""></label>
                                            <button class="btn btn-success btn-lg" onclick="return appointMonitor();" >Bổ nhiệm</button>
                                        </div>
                                        <div class="modal" id="appoint_monitor_modal">
                                            <div class="modal_overlay"></div>
                                            <div class="modal_body" id="appoint_monitor" style="margin-top: 150px">
                                                <p>Nếu xác nhận bổ nhiệm trưởng phòng mới thì trưởng phòng hiện tại sẽ bị bãi nhiệm.</p>
                                                <strong>Xác nhận bổ nhiệm?</strong> 
                                                <div class="m-2 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-danger mr-2">Xác nhận</button>
                                                    <button type="button" class="btn btn-outline-danger text-center" onclick="closeAppointMonitor();">Hủy</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php
                                    $loop_flag = false;
                                    break;
                                }
                            }
                            if ($loop_flag) {
                            ?>
                                <form action="../../controllers/admin/appoint.php" method="POST">
                                    <div class="d-none">
                                        <input name="department" type="text" class="form-control" value="<?= $department->getId() ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="department_id">Tên phòng ban</label> 
                                        <input type="text" class="form-control" id="department_name" value="<?= $department->getName() ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="department_id">Trưởng phòng</label> 
                                        <input type="text" class="form-control" id="employee_name" value="" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="department_desc">Mô tả</label>
                                        <textarea type="text" class="form-control" id="department_desc" class="form-control" disabled><?= $department->getDescription() ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="room_number">Số phòng</label>
                                        <input type="number" class="form-control" id="room_number" value="<?= $department->getRoom() ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="room_number">Bổ nhiệm</label>
                                        <select name="username" class="form-control">
                                        <?php
                                            foreach ($employees as $employee) {
                                                $employee = unserialize($employee);
                                                if ($employee->getDepartment() == $department->getId()) {
                                                    ?>
                                                        <option value="<?= $employee->getUsername() ?>"><?= $employee->getUsername() ?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="button" class="btn btn-success btn-lg" onclick="return appointMonitor();" >Bổ nhiệm</input>
                                    </div>
                                    <div class="modal" id="appoint_monitor_modal">
                                        <div class="modal_overlay"></div>
                                        <div class="modal_body" id="appoint_monitor" style="margin-top: 150px">
                                            <p>Nếu xác nhận bổ nhiệm trưởng phòng mới thì trưởng phòng hiện tại sẽ bị bãi nhiệm.</p>
                                            <strong>Xác nhận bổ nhiệm?</strong> 
                                            <div class="m-2 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-danger mr-2">Xác nhận</button>
                                                <button type="button" class="btn btn-outline-danger text-center" onclick="closeAppointMonitor();">Hủy</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php
                            }
                        } else {
                        ?>
                        <form action="../../controllers/admin/appoint.php" method="POST">
                            <div class="d-none">
                                <input name="department" type="text" class="form-control" value="<?= $department->getId() ?>">
                            </div>
                            <div class="form-group">
                                <label for="department_id">Tên phòng ban</label> 
                                <input type="text" class="form-control" id="department_name" value="<?= $department->getName() ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="department_id">Trưởng phòng</label> 
                                <input type="text" class="form-control" id="employee_name" value="" disabled>
                            </div>
                            <div class="form-group">
                                <label for="department_desc">Mô tả</label>
                                <textarea type="text" class="form-control" id="department_desc" class="form-control" disabled><?= $department->getDescription() ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="room_number">Số phòng</label>
                                <input type="number" class="form-control" id="room_number" value="<?= $department->getRoom() ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="room_number">Bổ nhiệm</label>
                                <select name="username" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <button class="btn btn-danger" onclick="return appointMonitor();" >Bổ nhiệm</button>
                            </div>
                            <div class="modal" id="appoint_monitor_modal">
                                <div class="modal_overlay"></div>
                                <div class="modal_body" id="appoint_monitor" style="margin-top: 150px">
                                    <p>Nếu xác nhận bổ nhiệm trưởng phòng mới thì trưởng phòng hiện tại sẽ bị bãi nhiệm.</p>
                                    <strong>Xác nhận bổ nhiệm?</strong> 
                                    <div class="m-2 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-danger mr-2">Xác nhận</button>
                                        <button type="button" class="btn btn-outline-danger text-center" onclick="closeAppointMonitor();">Hủy</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                        }
                    }
                ?>
            </div> 
        </div>
        <div class="modal" id="appoint_monitor_modal">
            <div class="modal_overlay"></div>
            <div class="modal_body" id="appoint_monitor" style="margin-top: 150px">
                <p>Nếu xác nhận bổ nhiệm trưởng phòng mới thì trưởng phòng hiện tại sẽ bị bãi nhiệm.</p>
                <strong>Xác nhận bổ nhiệm?</strong> 
                <div class="m-2 d-flex justify-content-end">
                    <button class="btn btn-primary mr-2">Xác nhận</button>
                    <button type="submit" class="btn btn-outline-primary text-center" onclick="closeAppointMonitor();">Hủy</button>
                </div>
            </div>
        </div>
</body>

</html>
