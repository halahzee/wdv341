<?php 

function v_array($needle, $haystack) {
    if(is_array($haystack) && array_key_exists($needle, $haystack)) {
        return $haystack[$needle];
    }

    return 0;
}


function valid_fname($fname) {
    if($fname == '') {
        return false;
    }

    return true;
}



function valid_lname($lname) {
    if($lname == '') {
        return false;
    }

    return true;
}

function valid_email($email) {
    if($email == '') {
        return false;
    }

    return true;
}

function valid_message($message) {
    if($message == '') {
        return false;
    }

    return true;
}






?>