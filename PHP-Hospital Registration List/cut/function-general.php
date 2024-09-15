<?php 
    // +90 542 211 9093
    function call($phone){
        $str = [' ', '+', '(', ')'];
        $call = str_replace($str, '', $phone);
        return $call;
    }
?>