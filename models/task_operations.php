<?php
    require_once("connection.php");
    require_once("operations.php");
    require_once("manager.php");
    require_once("task.php");

    class TaskOperations implements Operations {
        function create($task) {
            $conn = getConnection();
            $sql = "insert into task(title, description, status, rate, creator, receiver, created_date,
            deadline, attachment) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stm = $conn->prepare($sql);
            $stm->bind_param("ssiisssss", $task->getTitle(), $task->getDescription(), $task->getStatus(),
            $task->getRate(), $task->getCreator(), $task->getReceiver(), $task->getCreatedDate(),
            $task->getDeadline(), $task->getAttachment());
            if (!$stm->execute()) {
                die("Task creating is failed: " . $stm->error);
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }

        function read_one($id) {
            $manager = new Manager();
            $conn = getConnection();
            $sql = "select * from task where id = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("i", $id);
            $stm->execute();
            $result = $stm->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $task = new Task(
                        $row["id"],
                        $row["title"],
                        $row["description"],
                        $row["status"],
                        $row["rate"],
                        $row["creator"],
                        $row["receiver"],
                        $row["created_date"],
                        $row["deadline"],
                        $row["last_modified"],
                        $row["attachment"]
                    );
                    $manager->add(serialize($task));
                }
            }
            return $manager;
        }
    
        function read() {
            $manager = new Manager();
            $conn = getConnection();
            $sql = "select * from task";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $task = new Task(
                        $row["id"],
                        $row["title"],
                        $row["description"],
                        $row["status"],
                        $row["rate"],
                        $row["creator"],
                        $row["receiver"],
                        $row["created_date"],
                        $row["deadline"],
                        $row["last_modified"],
                        $row["attachment"]
                    );
                    $manager->add(serialize($task));
                }
            }
            return $manager;
        }
    
        function update($task) {
            $conn = getConnection();
            $sql = "update task set title = ?, description = ?, status = ?, rate = ?, creator = ?, 
            receiver = ?, created_date = ?, deadline = ?, last_modified = ?, attachment = ? where id = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("ssiissssssi", $task->getTitle(), $task->getDescription(), $task->getStatus(),
            $task->getRate(), $task->getCreator(), $task->getReceiver(), $task->getCreatedDate(),
            $task->getDeadline(), $task->getLastModified(), $task->getAttachment(), $task->getId());
            if (!$stm->execute()) {
                die("Task updating is failed: " . $stm->error);
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }
    
        function delete($id) {
            $conn = getConnection();
            $sql = "delete from task where id = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("i", $id);
            if (!$stm->execute()) {
                die("Task deleting is failed: " . $stm->error);
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }
    }
?>