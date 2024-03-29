<?php
    require_once("connection.php");
    require_once("operations.php");
    require_once("manager.php");
    require_once("employee.php");
    require_once("setup.php");

    class EmployeeOperations implements Operations {
        function create($employee) {
            $conn = getConnection();
            $sql = "insert into employee values(?, ?, ?, ?, ?, ?, ?)";
            $stm = $conn->prepare($sql);
            $stm->bind_param("sssissi", $employee->getId(), $employee->getUsername(), $employee->getFullname(),
            $employee->getPosition(), $employee->getDepartment(), $employee->getAvatar(), $employee->getDayOff());
            if (!$stm->execute()) {
                writeToErrorLog("Employee creating is failed: " . $stm->error, "Xảy ra lỗi trong khi trong khi tạo thông tin nhân viên");
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }

        function read_one($id) {
            $manager = new Manager();
            $conn = getConnection();
            $sql = "select * from employee where id = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("s", $id);
            $stm->execute();
            $result = $stm->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $employee = new Employee(
                        $row["id"],
                        $row["username"],
                        $row["fullname"],
                        $row["position"],
                        $row["department"],
                        $row["avatar"],
                        $row["day_off"]
                    );
                    $manager->add(serialize($employee));
                }
            }
            return $manager;
        }
    
        function read() {
            $manager = new Manager();
            $conn = getConnection();
            $sql = "select * from employee";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $employee = new Employee(
                        $row["id"],
                        $row["username"],
                        $row["fullname"],
                        $row["position"],
                        $row["department"],
                        $row["avatar"],
                        $row["day_off"]
                    );
                    $manager->add(serialize($employee));
                }
            }
            return $manager;
        }
    
        function update($employee) {
            $conn = getConnection();
            $sql = "update employee set username = ?, fullname = ?, position = ?,
            department = ?, avatar = ?, day_off = ? where id = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("ssissis", $employee->getUsername(), $employee->getFullname(),
            $employee->getPosition(), $employee->getDepartment(), $employee->getAvatar(),
            $employee->getDayOff(), $employee->getId());
            if (!$stm->execute()) {
                writeToErrorLog("Employee updating is failed: " . $stm->error, "Xảy ra lỗi trong khi trong khi cập nhật thông tin nhân viên");
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }
    
        function delete($id) {
            $conn = getConnection();
            $sql = "delete from employee where id = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("s", $id);
            if (!$stm->execute()) {
                writeToErrorLog("Employee deleting is failed: " . $stm->error, "Xảy ra lỗi trong khi trong khi xóa thông tin nhân viên");
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }
    }
?>