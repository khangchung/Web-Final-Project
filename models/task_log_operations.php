<?php
    require_once("connection.php");
    require_once("operations.php");
    require_once("manager.php");
    require_once("task_log.php");

    class TaskLogOperations implements Operations {
        function create($task_log) {
            $conn = getConnection();
            $sql = "insert into task_log(comment, attachment) values(?, ?)";
            $stm = $conn->prepare($sql);
            $stm->bind_param("ss", $task_log->getComment(), $task_log->getAttachment());
            if (!$stm->execute()) {
                die("Task log creating is failed: " . $stm->error);
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }

        function read_one($id) {
            $manager = new Manager();
            $conn = getConnection();
            $sql = "select * from task_log where id = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("i", $id);
            $stm->execute();
            $result = $stm->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $task_log = new TaskLog(
                        $row["id"],
                        $row["comment"],
                        $row["attachment"]
                    );
                    $manager->add(serialize($task_log));
                }
            }
            return $manager;
        }
    
        function read() {
            $manager = new Manager();
            $conn = getConnection();
            $sql = "select * from task_log";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $task_log = new TaskLog(
                        $row["id"],
                        $row["comment"],
                        $row["attachment"]
                    );
                    $manager->add(serialize($task_log));
                }
            }
            return $manager;
        }
    
        function update($task_log) {
            $conn = getConnection();
            $sql = "update task_log set comment = ?, attachment = ? where id = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("ssi", $task_log->getComment(), $task_log->getAttachment(), $task_log->getId());
            if (!$stm->execute()) {
                die("Task log updating is failed: " . $stm->error);
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }
    
        function delete($id) {
            $conn = getConnection();
            $sql = "delete from task_log where id = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("i", $id);
            if (!$stm->execute()) {
                die("Task log deleting is failed: " . $stm->error);
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }
    }
?>