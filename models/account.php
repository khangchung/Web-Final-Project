<?php
    class Account {
        private $username;
        private $password;
        private $priority;

        function __construct($username, $password, $priority) {
            $this->username = $username;
            $this->password = $password;
            $this->priority = $priority;
        }

        function getUsername() {
            return $this->username;
        }

        function getPassword() {
            return $this->password;
        }

        function getPriority() {
            return $this->priority;
        }

        function setUsername($username) {
            $this->username = $username;
        }

        function setPassword($password) {
            $this->password = $password;
        }

        function setPriority($priority) {
            $this->priority = $priority;
        }
    }
?>