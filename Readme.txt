Hướng dẫn sử dụng:
    1. Cài đặt phần mềm Xampp vào hệ điều hành.
    2. Di chuyển vào thư mục xampp sau khi đã cài đặt.
    3. Copy tất cả source code và các file text kèm theo vào thư mục xampp\htdocs.
    4. Thiết lập thông tin đăng nhập của phpMyAdmin và tên database tại database_settings.txt.
    5. Sử dụng đường dẫn localhost:8080/import-database.php?key=mvm để import database được thiết lập ở file của bước trên. (Lưu ý: Phải đặt file sql tạo thư mục gốc xampp\htdocs)
    8. Truy cập đường dẫn localhost:8080 bằng trình duyệt web để sử dụng website.
    9. Để thực hiện các tính năng tương ứng với từng vai trò khác nhau, vui lòng đăng nhập bằng các loại tài khoản được cung cấp bên dưới.
    10. Vì lý do bảo mật, người dùng nên đăng xuất khi không sử dụng website nữa.

Những lưu ý cho quản trị viên:
    1. Thiết lập thông tin của database tại database_settings.txt (Các giá trị được điền sau dấu "=", nếu giá trị rỗng thì không cần điền gì sau dấu "=").
    2. Cập nhật lại các thông tin thiết lập cho database tại: localhost:8080/update-db-settings.php.
    3. Tạo tài khoản quản trị tại: localhost:8080/admin-account-creating.php?username=XXX&key=mvm (XXX: tên tài khoản, password mặc định là tên tài khoản).
    4. Xóa tài khoản quản trị tại: localhost:8080/admin-account-deleting.php?username=XXX&key=mvm (XXX: tên tài khoản).
    5. Tạo database theo thông tin được thiết lập trong database_settings.txt tại: localhost:8080/import-database.php?key=mvm.
    5. Xóa database theo thông tin được thiết lập trong database_settings.txt tại: localhost:8080/drop-database.php?key=mvm.

Danh sách tài khoản:
    - Giám đốc: admin/123456
    - Trưởng phòng:
        + Nhân sự: tranthithaoanh/123456
        + Thiết kế: duongthithuyvy/123456
        + Truyền thông: letruchan/123456
        + Kinh doanh: phamtam/123456
        + Kỹ thuật: huynhthanhtrieu/123456
    - Nhân viên:
        + Nhân sự:
            tranvantuan/123456
            vocatphuong/123456
            trannguyenphuongthi/123456
            levohoaibao/123456
        + Thiết kế:
            caothitrucquynh/123456
            lamvotrongnhan/123456
            nguyenhoaingoc/123456
            chauthanhtoan/123456
        + Truyền thông:
            huynhvankiet/123456
            nguyenvanthai/123456
            trinhtuyetvan/123456
            vothanhlong/123456
        + Kinh doanh:
            vungocha/123456
            hongoctuyet/123456
            vulanminhtri/123456
            lythithuhuong/123456
        + Kỹ thuật:
            nguyenphamkhang/123456
            buitrucphuong/123456
            huynhlong/123456
            vuducmanh/123456

Các chức năng: (Giám đốc - A, Trưởng phòng - M, Nhân viên - E)
    1. Đăng nhập
    2. Buộc thay đổi mật khẩu (nếu mật khẩu là mặc định khi đăng nhập)
    3. Xem thông tin cá nhân (M, E)
    4. Cập nhật ảnh đại diện (M, E)
    5. Tự thay đổi mật khẩu (A, M, E)
    6. Xem danh sách tài khoản nhân viên (A)
    7. Xem thông tin chi tiết tài khoản nhân viên (A)
    8. Tạo tài khoản mới (A)
    9. Reset mật khẩu tài khoản về mặc định (A)
    10. Xem danh sách phòng ban (A)
    11. Thêm phòng ban (A)
    12. Xem thông tin chi tiết phòng ban (A)
    13. Sửa thông tin phòng ban (A)
    14. Bổ nhiệm trưởng phòng cho phòng ban (A)
    15. Xem danh sách task (M, E)
    16. Xem thông tin chi tiết task (M, E)
    17. Tạo task mới cho nhân viên (M)
    18. Hủy task (M)
    19. Reject task (M)
    20. Approve task (M)
    21. Xem lịch sử task các lần approve, reject, submit, resubmit (M, E)
    22. Start task (E)
    23. Submit, resubmit task (E)
    24. Xem thông tin nghỉ phép (M, E)
    25. Xem lịch sử yêu cầu nghỉ phép (M, E)
    26. Tạo yêu cầu nghỉ phép mới (M, E)
    27. Duyệt yêu cầu nghỉ phép (A, M)
    28. Không cho phép truy cập sang trang của vai trò khác (A, M, E)
    29. Tự động reset ngày nghỉ phép khi sang năm mới (M, E)
    30. Tự động đăng nhập vào hệ thống ở lần mở lại website tiếp theo khi chưa ấn đăng xuất và chưa tắt trình duyệt web (A, M, E)
    31. Tạo và xóa tài khoản admin thông qua url (đề cập ở phần lưu ý cho quản trị viên)
    32. Thiết lập thông tin database thông qua file text (đề cập ở phần lưu ý cho quản trị viên)
    33. Cập nhật thông tin database được thiết lập thông qua url (đề cập ở phần lưu ý cho quản trị viên)
    34. Khởi tạo database bằng url theo thông tin trong database_settings.txt (đề cập ở phần lưu ý cho quản trị viên)
    35. Xóa database bằng url theo thông tin trong database_settings.txt (đề cập ở phần lưu ý cho quản trị viên)
    36. Lưu tài khoản người dùng vào cookie sau khi login thành công 30 ngày
    37. Các thông tin thiết lập cho database tồn tại trong cookie 30 ngày
