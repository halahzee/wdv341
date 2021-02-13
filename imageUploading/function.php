<?php //create a function called write log, has two parameters one is 
//log and the other is the location (where we will create or save the log file that will be in the same directory)

function write_log($log, $location = 'debug.log'){

    error_log(print_r($log, true). "\n\r", 3, $location); // print_r works in every case.
}

//validate array by making sure that the data we're working with is in fact an 
//array and that the key we're searching for exists.

function v_array($needle, $haystack){
    if(is_array($haystack) && array_key_exists($needle, $haystack)){
        return $haystack[$needle];
    }

    return 0;
}

?>