<?php
    class Manager {
        private $list;

        function __construct() {
            $this->list = array();
        }

        function getList() {
            return $this->list;
        }

        function setList($list) {
            $this->list = $list;
        }

        function add($object) {
            array_push($this->list, $object);
        }

        function remove($index) {
            unset($this->list[$index]);
        }
    }
?>