<?php
    class Employee {
        private $id;
        private $username;
        private $fullname;
        private $position;
        private $department;
        private $avatar;
        private $day_off;

        function __construct($id, $username, $fullname, $position, $department, $avatar ,$day_off) {
            $this->id = $id;
            $this->username = $username;
            $this->fullname = $fullname;
            $this->position = $position;
            $this->department = $department;
            $this->avatar = $avatar;
            $this->day_off = $day_off;
        }

        function getId() {
            return $this->id;
        }

        function getUsername() {
            return $this->username;
        }

        function getFullname() {
            return $this->fullname;
        }

        function getPosition() {
            return $this->position;
        }

        function getDepartment() {
            return $this->department;
        }

        function getAvatar() {
            return $this->avatar;
        }

        function getDayOff() {
            return $this->day_off;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setUsername() {
            $this->username = $username;
        }

        function setFullname() {
            $this->fullname = $fullname;
        }

        function setPosition($position) {
            $this->position = $position;
        }

        function setDepartment($department) {
            $this->department = $department;
        }

        function setAvatar($avatar) {
            $this->avatar = $avatar;
        }

        function setDayOff($day_off) {
            $this->day_off = $day_off;
        }
    }
?>