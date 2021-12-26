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
            <div class="m-5" >
                <h1 style="margin-bottom: 30px">Thông tin ngày nghỉ</h1>
                
                
                <div class="form-group">
                    <label for="fullname">Họ và tên</label> 
                    <input type="text" class="form-control" name="fullname" id="fullname" value="Nguyễn Minh Thuận" disabled>
                </div>
                <!-- <div class="form-group">
                    <label for="birth">Ngày sinh</label> 
                    <input type="text" class="form-control" name="" id="birth" value="21/07/1999">
                </div>
                <div class="form-group">
                    <label for="gender">Giới tính</label> 
                    <input type="text" class="form-control" name="" id="gender" value="Nam">
                </div> -->
                <div class="form-group">
                    <label for="department">Phòng ban</label> 
                    <input type="text" class="form-control" name="department_name" id="department_name" value="Thiết kế" disabled>
                </div>
                <div class="form-group">
                    <label for="date_submit">Ngày nộp đơn</label> 
                    <input type="text" class="form-control" name="date_submit" id="date_submit" value="21/12/2021" disabled>
                </div>
                <div class="form-group">
                    <label for="count_offday">Số ngày nghỉ</label> 
                    <input type="number" class="form-control" name="count_offday" id="count_offday" value="2" disabled>
                </div>                 
                <div class="form-group">
                    <label for="start_offday">Ngày bắt đầu nghỉ</label> 
                    <input type="text" class="form-control" name="start_offday" id="start_offday" value="22/12/2021" disabled>
                </div>
                <div class="form-group">
                    <label for="end_offday">Ngày đi làm lại</label> 
                    <input type="text" class="form-control" name="end_offday" id="end_offday" value="24/12/2021" disabled>
                </div>
                <div class="form-group">
                    <label for="reason_offday">Lý do</label>
                    <textarea id="reason_offday" class="form-control" name="reason_offday" disabled>Nghỉ bệnh</textarea>
                </div>
                <div class="form-group">
                    <label for="attachments_offday">Tệp đính kèm (nếu có)</label>
                    <a href="https://www.w3schools.com" class="form-control-file" name="attachments_offday" id="attachments_offday">tepdinhkem.rar</a>
                </div>
                <div class="form-group">
                    <label for=""></label> 
                    <button type="submit" class=" btn btn-info my-2 p-3">Duyệt đơn</button>
                </div>
            </div>
        </div>      
    </body>
    </html>
