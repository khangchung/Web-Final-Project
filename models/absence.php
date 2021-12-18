<?php
    class Absence {
        private $id;
        private $employee_id;
        private $created_date;
        private $start_date;
        private $end_date;
        private $reason;
        private $status;
        private $attachment;

        function __construct($id, $employee_id, $created_date, $start_date, $end_date, $reason, $status, $attachment) {
            $this->id = $id;
            $this->employee_id = $employee_id;
            $this->created_date = $created_date;
            $this->start_date = $start_date;
            $this->end_date = $end_date;
            $this->reason = $reason;
            $this->status = $status;
            $this->attachment = $attachment;
        }

        function getId() {
            return $this->id;
        }

        function getEmployeeId() {
            return $this->employee_id;
        }

        function getCreatedDate() {
            return $this->created_date;
        }

        function getStartDate() {
            return $this->start_date;
        }

        function getEndDate() {
            return $this->end_date;
        }

        function getReason() {
            return $this->reason;
        }

        function getStatus() {
            return $this->status;
        }

        function getAttachment() {
            return $this->attachment;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setEmployeeId($employee_id) {
            $this->employee_id = $employee_id;
        }

        function setCreatedDate($created_date) {
            $this->created_date = $created_date;
        }

        function setStartDate($start_date) {
            $this->start_date = $start_date;
        }

        function setEndDate($end_date) {
            $this->end_date = $end_date;
        }

        function setReason($reason) {
            $this->reason = $reason;
        }

        function setStatus($status) {
            $this->status = $status;
        }

        function setAttachment($attachment) {
            $this->attachment = $attachment;
        }
    }
?>