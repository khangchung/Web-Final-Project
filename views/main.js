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

            const reader = new FileReader();
            
            reader.addEventListener('load', function(){
                img.setAttribute('src', reader.result);
            })
            
            reader.readAsDataURL(choseFile);
        }
    })
}

// Kiểm tra đăng nhập
function checkLogin(){
    const username = document.querySelector('#login_form .username');
    const password = document.querySelector('#login_form .password');

    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();
    
    if(usernameValue === '') {
        setErrorFor(username, 'Vui lòng nhập tên tài khoản');
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

function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector('#login_form small');
    formControl.className = 'field error';
    small.innerText = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = 'field success';
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
        console.log(offdayId)
        window.location = `../../controllers/admin/dayoff_details.php?id=${offdayId}`; 
    });
    //Admin xem thông tin chi tiết phòng ban
    $('#department_manager tbody tr').click(function() {
        const departmentName = $(this).closest('tr').attr('id');
        
        window.location = `../../controllers/admin/department_details.php?name=${departmentName}`; 
    });

    $('#offday_manager_moniter tbody tr').click(function() {
        // const offdayId = $(this).find(".offdayId").attr("id");
        window.location = `details_offday.php`; 
    });
    

});

