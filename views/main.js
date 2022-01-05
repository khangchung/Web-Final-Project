// JAVASCIPT
// Đóng mở sidebar
function openSidebar(){
    document.querySelector('.sidebar').style.width = '270px';
    document.querySelector('.page-wrap').style.marginLeft = '270px';
    document.querySelector('.menu_btn').style.display = 'none';
}
function closeSidebar(){
    document.querySelector('.sidebar').style.width = '0';
    document.querySelector('.page-wrap').style.marginLeft = '0';
    document.querySelector('.menu_btn').style.display = 'block';
}
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
                url: "http://localhost:8080/controllers/employee/update_avatar.php",
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

// Kiểm tra đăng nhập
    var uppercase = /[A-Z]/;
    var special_character = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;

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
    // Kiểm tra thêm nhân viên
    function addEmployee(){
        var fullname = document.querySelector('#addEmployeeForm #fullname');
        var username = document.querySelector('#addEmployeeForm #username');

        var fullnameValue = fullname.value;
        var usernameValue = username.value;

        if(fullnameValue === ''){
            setErrorMessage('Vui lòng nhập họ và tên');
            return false;
        }
        else if(!setCapitalize(fullnameValue)){
            setErrorMessage('Ký tự đầu của tên phải viết hoa');
            return false;
        }
        else if(usernameValue === ''){
            setErrorMessage('Vui lòng nhập tên tài khoản');
            return false;
        }
        else if(uppercase.test(usernameValue)) {
            setErrorMessage('Tên tài khoản không được chứa ký tự in hoa');
            return false;
        }
        else if(special_character.test(usernameValue)) {
            setErrorMessage('Tên tài khoản không được chứa ký tự đặc biệt');
            return false;
        }
        else if(usernameValue.length < 6) {
            setErrorMessage('Tên tài khoản phải có tối thiểu 6 ký tự');
            return false;
        }
        return true;
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
        errorMessage.innerHTML = message;
    }
    function setCapitalize(str){
        return /[A-Z]/.test(str.charAt(0));
    } 




//JQUERY
$(document).ready(function(){
    //Nhân viên xem thông tin chi tiết task
    $('#task_list tbody tr').click(function() {
        const employeeId = $(this).closest('tr').attr('id');
        window.location = `../../controllers/employee/task_details.php?id=${employeeId}`; 
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
        const departmentName = $(this).closest('tr').attr('id');
        
        window.location = `../../controllers/admin/department_details.php?name=${departmentName}`; 
    });
    // Trưởng phòng xem thông tin chi tiết ngày nghỉ của nhân viên
    $('#offday_manager_moniter tbody tr').click(function() {
        const offdayId = $(this).closest(".offdayId").attr("id");
        window.location = `../../controllers/monitor/dayoff_details.php?id=${offdayId}`; 
    });
    

});

