<?php
    require_once("connection.php");
    require_once("operations.php");
    require_once("manager.php");
    require_once("account.php");

    class AccountOperations implements Operations {
        function create($account) {
            $conn = getConnection();
            $sql = "insert into account values(?, ?, ?)";
            $stm = $conn->prepare($sql);
            $password = password_hash($account->getPassword(), PASSWORD_BCRYPT);
            $stm->bind_param("ssi", $account->getUsername(), $password, $account->getPriority());
            if (!$stm->execute()) {
                die("Account creating is failed: " . $stm->error);
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }

        function read_one($username) {
            $manager = new Manager();
            $conn = getConnection();
            $sql = "select * from account where username = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("s", $username);
            $stm->execute();
            $result = $stm->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $account = new Account(
                        $row["username"],
                        $row["password"],
                        $row["priority"]
                    );
                    $manager->add($account);
                }
            }
            return $manager;
        }
    
        function read() {
            $manager = new Manager();
            $conn = getConnection();
            $sql = "select * from account";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $account = new Account(
                        $row["username"],
                        $row["password"],
                        $row["priority"]
                    );
                    $manager->add($account);
                }
            }
            return $manager;
        }
    
        function update($account) {
            $conn = getConnection();
            $sql = "update account set password = ?, priority = ? where username = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("sis", $account->getPassword(), $account->getPriority(), $account->getUsername());
            if (!$stm->execute()) {
                die("Account updating is failed: " . $stm->error);
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }
    
        function delete($username) {
            $conn = getConnection();
            $sql = "delete from account where username = ?";
            $stm = $conn->prepare($sql);
            $stm->bind_param("s", $username);
            if (!$stm->execute()) {
                die("Account deleting is failed: " . $stm->error);
            }
            if ($stm->affected_rows == 1) {
                return true;
            }
            return false;
        }
    }
?>