<?php
    ob_start();
    session_start();
    require_once("../../models/employee_operations.php");
    require_once("../../models/account_operations.php");
    require_once("../../models/task_operations.php");
    require_once("../../models/setup.php");
    
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $department = isset($_POST["department"]) ? $_POST["department"] : "";
    $employees = isset($_SESSION["employees"]) ? $_SESSION["employees"] : "";
    
    try {
        if (!empty($username) && !empty($employees) && !empty($department)) {
            $employeeOperations = new EmployeeOperations;
            $accountOperations = new AccountOperations;
            $taskOperations = new TaskOperations;
            if (hasMonitor($department, $employees)) {
                foreach ($employees as $employee) {
                    $employee = unserialize($employee);
                    if ($employee->getPosition() == 1 && $employee->getDepartment() == $department) {
                        foreach ($employees as $employee2) {
                            $employee2 = unserialize($employee2);
                            if ($employee2->getUsername() == $username && $employee2->getDepartment() == $department
                                && $employee2->getPosition() != 1) {
                                $account = unserialize($accountOperations->read_one($employee->getUsername())->getList()[0]);
                                $account2 = unserialize($accountOperations->read_one($employee2->getUsername())->getList()[0]);
                                $account->setPriority(2);
                                $account2->setPriority(1);
                                $employee->setPosition(2);
                                $employee2->setPosition(1);
                                $employee->setDayOff(12);
                                $employee2->setDayOff(15);
                                if ($employeeOperations->update($employee) && $employeeOperations->update($employee2)
                                    && $accountOperations->update($account) && $accountOperations->update($account2)) {
                                    $tasks = $taskOperations->read()->getList();
                                    $old_monitor_id = $employee->getId();
                                    foreach ($tasks as $task) {
                                        $task = unserialize($task);
                                        if ($task->getCreator() == $old_monitor_id) {
                                            $task->setCreator($employee2->getId());
                                        }
                                        if ($task->getReceiver() == $employee2->getId()) {
                                            $task->setCreator($employee2->getId());
                                            $task->setReceiver($old_monitor_id);
                                        }
                                        if (!$taskOperations->update($task)) {
                                            $_SESSION["flag"] = false;
                                            $_SESSION["message"] = "Xảy ra lỗi không mong muốn trong quá trình xử lý";
                                            break;
                                        }
                                    }
                                    $_SESSION["flag"] = true;
                                    $_SESSION["message"] = "Bổ nhiệm thành công";
                                }
                                break;
                            }
                        }
                        break;
                    } else {
                        $_SESSION["flag"] = false;
                        $_SESSION["message"] = "Bổ nhiệm thất bại";
                    }
                }
            } else {
                $employee = findEmployeeByUsername($employees, $username);
                $account = unserialize($accountOperations->read_one($username)->getList()[0]);
                $employee->setPosition(1);
                $employee->setDayOff(15);
                $account->setPriority(1);
                if ($employeeOperations->update($employee) && $accountOperations->update($account)) {
                    $_SESSION["flag"] = true;
                    $_SESSION["message"] = "Bổ nhiệm thành công";
                } else {
                    $_SESSION["flag"] = false;
                    $_SESSION["message"] = "Bổ nhiệm thất bại";
                }
            }
        }
    
        $employeeOperations = new EmployeeOperations;
        $employeeManager = $employeeOperations->read();
        $_SESSION["employees"] = $employeeManager->getList();
    
        header("location: ../../views/admin/details_department.php");
    } catch (Exception $e) {
        writeToErrorLog("Error Message: " . $e, "Đã xảy ra lỗi không mong muốn");   
    }
    ob_end_flush();
?>