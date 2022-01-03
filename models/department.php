<?php
    class Department {
        private $id;
        private $name;
        private $description;
        private $room;

        function __construct($id, $name, $description, $room) {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->room = $room;
        }

        function getId() {
            return $this->id;
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

        function setId($id) {
            $this->id = $id;
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