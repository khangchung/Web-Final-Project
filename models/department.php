<?php
    class Department {
        private $name;
        private $description;
        private $room;

        function __construct($name, $description, $room) {
            $this->name = $name;
            $this->description = $description;
            $this->room = $room;
        }

        function getName() {
            return $this->name;
        }

        function getDescription() {
            return $this->description;
        }

        function getRoom() {
            return $this->room;
        }

        function setName($name) {
            $this->name = $name;
        }

        function setDescription($description) {
            $this->description = $description;
        }

        function setRoom($room) {
            $this->room = $room;
        }
    }
?>