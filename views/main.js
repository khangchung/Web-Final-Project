// JAVASCIPT
// Xem ảnh đại diện
function viewAvatar(){
    src = document.querySelector('.info_wrap_header-avatar img').src;
    imgShow = document.querySelector('.modal_body img');
    imgShow.setAttribute('src', src);
    document.querySelector('.modal').style.display = 'block';
}
function closeAvatar(){
    document.querySelector('.modal').style.display = 'none';
}
//Đổi ảnh đại diện
function changeAvatar(){
    const img = document.querySelector('.info_wrap_header-avatar img');
    const file = document.querySelector('#file');

    file.addEventListener('change', function(){
        const choseFile = this.files[0];

        if(choseFile){
            let form_data = new FormData();
            form_data.append('image', choseFile);
            $.ajax({
                type: "POST",
                url: "http://localhost:8080/controllers/api/update_avatar.php",
                processData: false,
                mimeType: "multipart/form-data",
                contentType: false,
                data: form_data,
                success: (data, textStatus, xhr) => {
                    if (xhr.status == 200) {
                        // Thông báo update thành công
                        console.log(xhr.status);
                        console.log("successed");
                    } else {
                        // Thông báo update thất bại
                        console.log(xhr.status);
                        console.log("failed");
                    }
                },
                error: e => {
                    console.log(e);
                }
            });

            const reader = new FileReader();
            
            reader.addEventListener('load', function(){
                img.setAttribute('src', reader.result);
            })
            
            reader.readAsDataURL(choseFile);
        }
    })
}

//Hiện thông báo xác nhận bổ nhiệm
function appointMonitor(){
    document.querySelector('#appoint_monitor_modal').style.display = 'block';
    return false;
} 
 
function closeAppointMonitor(){
    document.querySelector('#appoint_monitor_modal').style.display = 'none';
} 

function resetPassword(){
    document.querySelector('#reset_password').style.display = 'block';
    return false;
}

function closeResetPassword(){
    document.querySelector('#reset_password').style.display = 'none';
}

function confirmResetPassword(){
    var href = document.querySelector("#href").href;
    window.location.href = href;
    document.querySelector('#reset_password').style.display = 'none';
}

// Biến chung
    var uppercase = /[A-Z]/;
    var special_character = /[ !@#$%&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
 //Lấy ngày hiện tại   
    var today = new Date();
        var dd = today.getDate();

        var mm = today.getMonth()+1; 
        var yyyy = today.getFullYear();
        if(dd<10) 
        {
            dd='0'+dd;
        } 

        if(mm<10) 
        {
            mm='0'+mm;
        } 
    today = yyyy+'-'+mm+'-'+dd;
//Kiểm tra đăng nhập
    function checkLogin(){
        var username = document.querySelector('#login_form .username');
        var password = document.querySelector('#login_form .password');

        var usernameValue = username.value.trim();
        var passwordValue = password.value.trim();
        
        if(usernameValue === '') {
            setErrorFor(username, 'Vui lòng nhập tên tài khoản');
            return false;
        } else {
            setSuccessFor(username);
        }

        if(uppercase.test(usernameValue)) {
            setErrorFor(username, 'Tên tài khoản không được chứa ký tự in hoa');
            return false;
        } else {
            setSuccessFor(username);
        }

        if(special_character.test(usernameValue)) {
            setErrorFor(username, 'Tên tài khoản không được chứa ký tự đặc biệt');
            return false;
        } else {
            setSuccessFor(username);
        }
        
        if(passwordValue === '') {
            setErrorFor(password, 'Vui lòng nhập mật khẩu');
            return false;
        } else {
            setSuccessFor(password);
        }
        return true;
    }
//Kiểm đổi mật khẩu
function checkChangePassword(){
    var oldPass = document.querySelector('#changePassword #oldPass');
    var newPass1 = document.querySelector('#changePassword #newPass1');
    var newPass2 = document.querySelector('#changePassword #newPass2');

    var oldPassValue = oldPass.value.trim();
    var newPass1Value = newPass1.value.trim();
    var newPass2Value = newPass2.value.trim();

    if(oldPassValue === '') {
        setErrorFor(oldPass, 'Vui lòng nhập mật khẩu cũ');
        return false;
    } else {
        setSuccessFor(oldPass);
    }

    if(newPass1Value === oldPassValue) {
        setErrorFor(newPass1, 'Mật khẩu mới không được trùng với mật khẩu cũ');
        return false;
    } else {
        setSuccessFor(newPass1);
    }

    if(newPass1Value === '') {
        setErrorFor(newPass1, 'Vui lòng nhập mật khẩu mới');
        return false;
    } else {
        setSuccessFor(newPass1);
    }

    if(newPass2Value === '') {
        setErrorFor(newPass2, 'Vui lòng nhập xác nhận mật khẩu');
        return false;
    } else {
        setSuccessFor(newPass2);
    }

    if(newPass2Value !== newPass1Value) {
        setErrorFor(newPass2, 'Xác nhận mật khẩu không chính xác');
        return false;
    } else {
        setSuccessFor(newPass2);
    }
    return true;
}
    // Kiểm tra thêm nhân viên
    function addEmployee(){
        var fullname = document.querySelector('#addEmployeeForm #fullname');
        var username = document.querySelector('#addEmployeeForm #username');

        var fullnameValue = fullname.value;
        var usernameValue = username.value;


        if(fullnameValue === ''){
            setErrorMessage('Vui lòng nhập họ và tên');
            fullname.focus();
            return false;
        }
        else if(!setCapitalize(fullnameValue)){
            setErrorMessage('Ký tự đầu của tên phải viết hoa');
            fullname.focus();

            return false;
        }
        else if(usernameValue === ''){
            setErrorMessage('Vui lòng nhập tên tài khoản');
            username.focus();
            return false;
        }
        else if(uppercase.test(usernameValue)) {
            setErrorMessage('Tên tài khoản không được chứa ký tự in hoa');
            username.focus();
            return false;
        }
        else if(special_character.test(usernameValue)) {
            setErrorMessage('Tên tài khoản không được chứa ký tự đặc biệt');
            username.focus();
            return false;
        }
        else if(usernameValue.length < 6) {
            setErrorMessage('Tên tài khoản phải có tối thiểu 6 ký tự');
            username.focus();
            return false;
        }
        else{
            // setSuccessMessage('Thêm nhân viên thành công')
            return true;
        }
    }

    // Kiểm tra thêm phòng ban
    function addDepartment(){
        var name = document.querySelector('#addDepartmentForm #department_name');
        var desc = document.querySelector('#addDepartmentForm #department_desc');
        var total = document.querySelector('#addDepartmentForm #total_department');

        var nameValue = name.value;
        var descValue = desc.value;
        var totalValue = total.value;


        if(nameValue === ''){
            setErrorMessage('Vui lòng nhập tên phòng ban');
            name.focus();
            return false;
        }
        else if(descValue === ''){
            setErrorMessage('Vui lòng nhập mô tả cho phòng ban');
            desc.focus();
            return false;
        }
        else if(descValue.length < 10) {
            setErrorMessage('Mô tả phòng ban quá ngắn');
            desc.focus();
            return false;
        }
        else if(totalValue === ''){
            setErrorMessage('Vui lòng nhập số phòng của phòng ban');
            return false;
        }
        else{
            // setSuccessMessage('Thêm nhân viên thành công')
            return true;
        }
    }

    // Kiểm tra nộp đơn nghỉ phép của nhân viên
    function formOffDay(){
        var startDay = document.querySelector('#formOffDay #startDay');
        var endDay = document.querySelector('#formOffDay #endDay');
        var reason = document.querySelector('#formOffDay #reason');

        var startDayValue = startDay.value;
        var endDayValue = endDay.value;
        var reasonValue = reason.value;

        if(startDayValue === ''){
            setErrorMessage('Vui lòng chọn ngày bắt đầu nghỉ');
            startDay.focus();
            return false;
        }
        else if(startDayValue < today){
            setErrorMessage('Không được chọn ngày nghỉ trong quá khứ');
            startDay.focus();
            return false;
        }
        else if(endDayValue === ''){
            setErrorMessage('Vui lòng chọn ngày kết thúc nghỉ');
            endDay.focus();
            return false;
        }
        else if(endDayValue < startDayValue){
            setErrorMessage('Ngày kết thúc phải ở sau ngày nghỉ');
            endDay.focus();
            return false;
        }
        else if(reasonValue === ''){
            setErrorMessage('Vui lòng nhập lý do nghỉ');
            reason.focus();
            return false;
        }
        
        else{
            // setSuccessMessage('Nộp đơn thành công')
            return true;
        }
    }

//Kiểm tra tạo task
function createTask(){
    var taskName = document.querySelector('#createTask #task_name');
    var deadline = document.querySelector('#createTask #deadline');
    var desc = document.querySelector('#createTask #task_desc');
    var file = document.querySelector('#createTask #file');


    var taskNameValue = taskName.value;
    var deadlineValue = deadline.value;
    var descValue = desc.value;
    var fileValue = file.value;


    if(taskNameValue === ''){
        setErrorMessage('Vui lòng nhập tiêu đề');
        taskName.focus();
        return false;
    }
    else if(deadlineValue === ''){
        setErrorMessage('Vui lòng chọn ngày deadline');
        deadline.focus();
        return false;
    }
    else if(deadlineValue < today){
        setErrorMessage('Deadline không thể chọn ngày trong quá khứ');
        deadline.focus();
        return false;
    }
    else if(descValue === ''){
        setErrorMessage('Vui lòng nhập mô tả công việc');
        desc.focus();
        return false;
    }
    else if(descValue.length < 20){
        setErrorMessage('Mô tả công việc quá ngắn');
        desc.focus();
        return false;
    }
    else if(fileValue === ''){
        setErrorMessage('Vui lòng thêm vào tệp đính kèm');
        file.focus();
        return false;
    }
    else{
        // setSuccessMessage('Tạo nhiệm vụ thành công')
        return true;
    }
}

// Hàm check lỗi

    function setErrorFor(input, message) {
        var formControl = input.parentElement;
        var small = formControl.querySelector('#login_form small');
        formControl.className = 'field error';
        small.innerText = message;
    }

    function setSuccessFor(input) {
        var formControl = input.parentElement;
        formControl.className = 'field success';
    }

    function setErrorMessage(message) {
        const errorMessage = document.querySelector('#errorMessage');
        errorMessage.style.opacity = "1";
        errorMessage.innerHTML = message;
    }
    
    function clearErrorMessage(){
        document.querySelector('#errorMessage').style.opacity = "0";
    }


    // function setSuccessMessage(message) {
    //     const successMessage = document.querySelector('#successMessage');
    //     successMessage.style.opacity = "1";
    //     successMessage.innerHTML = message;
    // }

    function setCapitalize(str){
        return /[A-Z]/.test(str.charAt(0));
    } 




//JQUERY
$(document).ready(function(){
    //Đóng mở sidebar
    $(".menu_btn").on("click", function(){
        $(".menu_btn").css("opacity", "0");
        $(".sidebar").addClass("enter");
        $(".sidebar").css({left: 0});
        $(".page-wrap").css("marginLeft","300px") ;
    });
    $(".close_btn").on("click", function(){
        $(".sidebar").removeClass("enter");
        $(".menu_btn").css("opacity", "1");
        $(".sidebar").css({left: -300});
        $(".page-wrap").css("marginLeft","0") ;
    });
    
    //Nhân viên xem thông tin chi tiết task
    $('#task_list tbody tr').click(function() {
        const taskId = $(this).closest('tr').attr('id');
        window.location = `../../controllers/employee/task_details.php?id=${taskId}`; 
    });
    //Admin xem thông tin chi tiết của nhân viên
    $('#employee_manager tbody tr').click(function() {
        const employeeId = $(this).closest('tr').attr('id');
        window.location = `../../controllers/admin/employee_details.php?id=${employeeId}`; 
    });
    //Admin xem thông tin chi tiết ngày nghỉ
    $('#offday_manager tbody tr').click(function() {
        const offdayId = $(this).closest(".offdayId").attr("id");
        window.location = `../../controllers/admin/dayoff_details.php?id=${offdayId}`; 
    });
    //Admin xem thông tin chi tiết phòng ban
    $('#department_manager tbody tr').click(function() {
        const departmentId = $(this).closest('tr').attr('id');
        window.location = `../../controllers/admin/department_details.php?id=${departmentId}`; 
    });
    // Trưởng phòng xem thông tin chi tiết nhiệm vụ của nhân viên
    $('#task_manager_moniter tbody tr').click(function() {
        const taskId = $(this).closest("tr").attr("id");
        window.location = `../../controllers/monitor/task_details.php?id=${taskId}`; 
    });
    // Trưởng phòng duyệt nhiệm vụ của nhân viên
    $('#done_task_monitor a').click(function() {
        const taskId = $(this).closest("div").attr("task_id");
        const taskRate = $("#rate option:selected").val();
        window.location = `../../controllers/monitor/done_task.php?id=${taskId}&rate=${taskRate}`; 
    });
    // Trưởng phòng xem thông tin chi tiết ngày nghỉ của nhân viên
    $('#offday_manager_moniter tbody tr').click(function() {
        const offdayId = $(this).closest("tr").attr("id");
        window.location = `../../controllers/monitor/dayoff_details.php?id=${offdayId}`; 
    });
    // Trương phòng xem chi tiết lịch sử ngày nghỉ của trưởng phòng
    $('#history_offday_monitor tbody tr').click(function() {
        const offdayId = $(this).closest("tr").attr("id");
        window.location = `../../controllers/monitor/dayoff_history.php?id=${offdayId}`; 
    });
    // Nhân viên xem chi tiết lịch sử ngày nghỉ của nhân viên
    $('#history_offday_employee tbody tr').click(function() {
        const offdayId = $(this).closest("tr").attr("id");
        window.location = `../../controllers/employee/dayoff_history.php?id=${offdayId}`;
    });
    

});

