<?php
    require_once("connection.php");
    require_once("operations.php");
    require_once("manager.php");
    require_once("department.php");

    class DepartmentOperations implements Operations {
        function create($department) {
            $conn = getConnection();
            $sql = "insert into department values(?, ?, ?)";
            $stm = $conn->prepare($sql);
            $stm->bind_param("ssi", $department->getName(), $department->getDescription(), $department->getRoom());
            if (!$stm->execute()) {
                die("Department creating is failed: " . $stm->error);
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }

        function read_one($name) {
            $manager = new Manager();
            $conn = getConnection();
            $sql = "select * from department where name = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("s", $name);
            $stm->execute();
            $result = $stm->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $department = new Department(
                        $row["name"],
                        $row["description"],
                        $row["room"]
                    );
                    $manager->add($department);
                }
            }
            return $manager;
        }
    
        function read() {
            $manager = new Manager();
            $conn = getConnection();
            $sql = "select * from department";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $department = new Department(
                        $row["name"],
                        $row["description"],
                        $row["room"]
                    );
                    $manager->add($department);
                }
            }
            return $manager;
        }
    
        function update($department) {
            $conn = getConnection();
            $sql = "update department set description = ?, room = ? where name = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("sis", $department->getDescription(), $department->getRoom(), $department->getName());
            if (!$stm->execute()) {
                die("Department updating is failed: " . $stm->error);
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }
    
        function delete($name) {
            $conn = getConnection();
            $sql = "delete from department where name = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("s", $name);
            if (!$stm->execute()) {
                die("Department deleting is failed: " . $stm->error);
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }
    }
?>