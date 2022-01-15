    <?php
        session_start();
        require_once("../../models/setup.php");
        priorityChecker(2);
        $info = isset($_SESSION["information"]) ? unserialize($_SESSION["information"]) : "";
        $absences = isset($_SESSION["absences"]) ? $_SESSION["absences"] : "";
        $numOfBlockedDate = isset($_SESSION["offday_form"]) ? $_SESSION["offday_form"] : "";
        $disabled = "";
        if (!empty($numOfBlockedDate) && $numOfBlockedDate > 0) {
            $disabled = "disabled";
        }
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
        <title>Gửi yêu cầu nghỉ phép</title>
    </head>
    <body>
        <?php
            require_once('../includes/sidebar_employee.php');
        ?>
       <div class="page-wrap" id="formOffDay">
            
            <form action="../../controllers/employee/dayoff_form.php" method="POST" onsubmit="return formOffDay();" class=" mt-5 p-3" enctype="multipart/form-data">
                <h2 class="title">Yêu cầu nghỉ phép</h2>
                <?php
                    if (!empty($numOfBlockedDate)) {
                    ?>
                            <p class="confirmOffDay text-white bg-danger p-3">Bạn không thể tiếp tục gửi yêu cầu. Vui lòng quay lại sau <?= $numOfBlockedDate ?> ngày nữa!</p>
                    <?php
                    }
                ?>
               
                <div class="form-group">
                    <label for="startDay">Ngày bắt đầu <span class="requiredField">*</span></label>
                    <input name="start_date" onclick="clearErrorMessage()" type="date" id="startDay" class="form-control" <?= $disabled ?>>
                </div>
                <div class="form-group">
                    <label for="endDay">Ngày kết thúc <span class="requiredField">*</span></label>
                    <input name="end_date" onclick="clearErrorMessage()" type="date" id="endDay" class="form-control" <?= $disabled ?>>
                </div>
                <div class="form-group">
                    <label for="reason">Lý do <span class="requiredField">*</span></label>
                    <textarea name="reason" onkeydown="clearErrorMessage()" id="reason" class="form-control" <?= $disabled ?>></textarea>
                </div>
                <div class="form-group">
                    <label for="file">Tệp đính kèm (nếu có)</label>
                    <input name="attachment" type="file" accept=".gif,.jpg,.jpeg,.png,.doc,.docx,.pdf,.xls,.xlsx,.zip,.rar,.txt" class="form-control-file" id="file" <?= $disabled ?>>
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <small id="errorMessage"></small>
                </div>
                
                <div class="form-group">
                    <label for="" class=""></label>
                    <button type="submit" class="btn btn-success btn-lg" <?= $disabled ?>>Nộp đơn</button>
                </div>
            </form>
       </div>
    </body>
    </html>
