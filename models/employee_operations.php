<?php
    require_once("connection.php");
    require_once("operations.php");
    require_once("manager.php");
    require_once("employee.php");

    class EmployeeOperations implements Operations {
        function create($employee) {
            $conn = getConnection();
            $sql = "insert into employee values(?, ?, ?, ?, ?, ?, ?)";
            $stm = $conn->prepare($sql);
            $stm->bind_param("sssisssi", $employee->getId(), $employee->getUsername(), $employee->getFullname(),
            $employee->getPosition(), $employee->getDepartment(), $employee->getAvatar(), $employee->getDayOff());
            if (!$stm->execute()) {
                die("Employee creating is failed: " . $stm->error);
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
                    $manager->add($employee);
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
                    $manager->add($employee);
                }
            }
            return $manager;
        }
    
        function update($employee) {
            $conn = getConnection();
            $sql = "update employee set username = ?, fullname = ?, position = ?,
            department = ?, avatar = ?, day_off = ? where id = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("ssisssii", $employee->getUsername(), $employee->getFullname(),
            $employee->getPosition(), $employee->getDepartment(), $employee->getAvatar(),
            $employee->getDayOff(), $employee->getId());
            if (!$stm->execute()) {
                die("Employee updating is failed: " . $stm->error);
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
                die("Employee deleting is failed: " . $stm->error);
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }
    }
?>