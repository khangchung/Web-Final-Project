<?php
    interface Operations {
        function create($oject);
        function read_one($id);
        function read();
        function update($object);
        function delete($id);
    }
?>