<?php
    require_once("connection.php");
    require_once("operations.php");
    require_once("manager.php");
    require_once("absence.php");

    class AbsenceOperations implements Operations {
        function create($absence) {
            $conn = getConnection();
            $sql = "insert into absence(employee_id, created_date, start_date, end_date,
            reason, status, attachment) values(?, ?, ?, ?, ?, ?, ?)";
            $stm = $conn->prepare($sql);
            $stm->bind_param("sssssis", $absence->getEmployeeId(), $absence->getCreatedDate(),
            $absence->getStartDate(), $absence->getEndDate(), $absence->getReason(), $absence->getStatus(),
            $absence->getAttachment());
            if (!$stm->execute()) {
                die("Absence creating is failed: " . $stm->error);
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }

        function read_one($id) {
            $manager = new Manager();
            $conn = getConnection();
            $sql = "select * from absence where id = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("i", $id);
            $stm->execute();
            $result = $stm->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $absence = new Absence(
                        $row["id"],
                        $row["employee_id"],
                        $row["created_date"],
                        $row["start_date"],
                        $row["end_date"],
                        $row["reason"],
                        $row["status"],
                        $row["attachment"]
                    );
                    $manager->add(serialize($absence));
                }
            }
            return $manager;
        }
    
        function read() {
            $manager = new Manager();
            $conn = getConnection();
            $sql = "select * from absence";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $absence = new Absence(
                        $row["id"],
                        $row["employee_id"],
                        $row["created_date"],
                        $row["start_date"],
                        $row["end_date"],
                        $row["reason"],
                        $row["status"],
                        $row["attachment"]
                    );
                    $manager->add(serialize($absence));
                }
            }
            return $manager;
        }
    
        function update($absence) {
            $conn = getConnection();
            $sql = "update absence set status = ? where id = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("ii", $absence->getStatus(), $absence->getId());
            if (!$stm->execute()) {
                die("Absence updating is failed: " . $stm->error);
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }
    
        function delete($id) {
            $conn = getConnection();
            $sql = "delete from absence where id = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("i", $id);
            if (!$stm->execute()) {
                die("Absence deleting is failed: " . $stm->error);
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }
    }
?>