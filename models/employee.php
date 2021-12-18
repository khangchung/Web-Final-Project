<?php
    class Employee {
        private $id;
        private $username;
        private $fullname;
        private $gender;
        private $position;
        private $department;
        private $avatar;
        private $day_off;

        function __construct($id, $username, $fullname, $gender, $position, $department, $avatar ,$day_off) {
            $this->id = $id;
            $this->username = $username;
            $this->fullname = $fullname;
            $this->gender = $gender;
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

        function getGender() {
            return $this->gender;
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

        function setGender() {
            $this->gender = $gender;
        }

        function setPosition() {
            $this->position = $position;
        }

        function setDepartment() {
            $this->department = $department;
        }

        function setAvatar() {
            $this->avatar = $avatar;
        }

        function setDayOff() {
            $this->day_off = $day_off;
        }
    }
?>