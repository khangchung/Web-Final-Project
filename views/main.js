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

//JQUERY
$(document).ready(function(){
    //Nhân viên xem thông tin chi tiết task
    $('#task_list tbody tr').click(function() {
        window.location = "details_task.php"; 
    });
    //Admin xem thông tin chi tiết của nhân viên
    $('#employee_manager tbody tr').click(function() {
        const employeeId = $(this).find(".employeeId").html();
       
        window.location = `../../controllers/admin/employee_details.php?id=${employeeId}`; 
    });
    //Admin xem thông tin chi tiết ngày nghỉ
    $('#offday_manager tbody tr').click(function() {
        window.location = "details_offday.php"; 
    });
    //Admin xem thông tin chi tiết phòng ban
    $('#department_manager tbody tr').click(function() {
        const departmentName = $(this).find(".departmentName").attr("id");
        window.location = `../../controllers/admin/department_details.php?name=${departmentName}`; 
    });
});

