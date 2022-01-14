<?php
    require_once("connection.php");
    require_once("operations.php");
    require_once("manager.php");
    require_once("task_log.php");
    require_once("setup.php");

    class TaskLogOperations implements Operations {
        function create($task_log) {
            $conn = getConnection();
            $sql = "insert into task_log(task_id, comment, attachment, owner) values(?, ?, ?, ?)";
            $stm = $conn->prepare($sql);
            $stm->bind_param("issi", $task_log->getTaskId(), $task_log->getComment(), $task_log->getAttachment(), $task_log->getOwner());
            if (!$stm->execute()) {
                writeToErrorLog("Task log creating is failed: " . $stm->error, "Xảy ra lỗi trong khi trong khi tạo thông tin lịch sử nhiệm vụ");
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }

        function read_one($id) {
            $manager = new Manager();
            $conn = getConnection();
            $sql = "select * from task_log where task_id = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("i", $id);
            $stm->execute();
            $result = $stm->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $task_log = new TaskLog(
                        $row["task_id"],
                        $row["comment"],
                        $row["attachment"],
                        $row["owner"]
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
                        $row["task_id"],
                        $row["comment"],
                        $row["attachment"],
                        $row["owner"]
                    );
                    $manager->add(serialize($task_log));
                }
            }
            return $manager;
        }
    
        function update($task_log) {
            $conn = getConnection();
            $sql = "update task_log set comment = ?, attachment = ?, owner = ? where task_id = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("ssii", $task_log->getComment(), $task_log->getAttachment(), $task_log->getOwner(), $task_log->getTaskId());
            if (!$stm->execute()) {
                writeToErrorLog("Task log updating is failed: " . $stm->error, "Xảy ra lỗi trong khi trong khi cập nhật thông tin lịch sử nhiệm vụ");
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }
    
        function delete($id) {
            $conn = getConnection();
            $sql = "delete from task_log where task_id = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("i", $id);
            if (!$stm->execute()) {
                writeToErrorLog("Task log deleting is failed: " . $stm->error, "Xảy ra lỗi trong khi trong khi xóa thông tin lịch sử nhiệm vụ");
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }
    }
?>