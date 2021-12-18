<?php
    class Task {
        private $id;
        private $title;
        private $description;
        private $status;
        private $rate;
        private $creator;
        private $receiver;
        private $created_date;
        private $deadline;

        function __construct($id, $title, $description, $status, $rate, $creator, $receiver, $created_date, $deadline) {
            $this->id = $id;
            $this->title = $title;
            $this->description = $description;
            $this->status = $status;
            $this->rate = $rate;
            $this->creator = $creator;
            $this->receiver = $receiver;
            $this->created_date = $created_date;
            $this->deadline = $deadline;
        }

        function getId() {
            return $this->id;
        }

        function getTitle() {
            return $this->title;
        }

        function getDescription() {
            return $this->description;
        }

        function getStatus() {
            return $this->status;
        }

        function getRate() {
            return $this->rate;
        }

        function getCreator() {
            return $this->creator;
        }

        function getReceiver() {
            return $this->receiver;
        }

        function getCreatedDate() {
            return $this->created_date;
        }

        function getDeadline() {
            return $this->deadline;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setTitle($title) {
            $this->title = $title;
        }

        function setDescription($description) {
            $this->description = $description;
        }

        function setStatus($status) {
            $this->status = $status;
        }

        function setRate($rate) {
            $this->rate = $rate;
        }

        function setCreator($creator) {
            $this->creator = $creator;
        }

        function setReceiver($receiver) {
            $this->receiver = $receiver;
        }

        function setCreatedDate($created_date) {
            $this->created_date = $created_date;
        }

        function setDeadline($deadline) {
            $this->deadline = $deadline;
        }
    }
?>