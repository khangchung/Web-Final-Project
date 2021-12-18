<?php
    class TaskLog {
        private $task_id;
        private $comment;
        private $attachment;

        function __construct($task_id, $comment, $attachment) {
            $this->task_id = $task_id;
            $this->comment = $comment;
            $this->attachment = $attachment;
        }

        function getTaskId() {
            return $this->task_id;
        }

        function getComment() {
            return $this->comment;
        }

        function getAttachment() {
            return $this->attachment;
        }

        function setTaskId($task_id) {
            $this->task_id = $task_id;
        }

        function setComment($comment) {
            $this->comment = $comment;
        }

        function setAttachment($attachment) {
            $this->attachment = $attachment;
        }
    }
?>