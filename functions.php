<?php
require_once('connectPDO.php');

function write_log($log, $location = 'debug.log')
{
    error_log(print_r($log, true) . "\n\r", 3, $location);
}

function v_array($needle, $haystack)
{
    if (is_array($haystack) && array_key_exists($needle, $haystack)) {
        return $haystack[$needle];
    }

    return 0;
}

function set_connection_exception_handler($con, $e)
{
    write_log($e->getMessage(), 'debug.log');
    write_log($con, 'debug.log');

    header('Location: 505_error_response_page_1.php');
}


function set_statement_exception_handler($stmt, $e)
{
    write_log($e->getMessage(), 'debug.log');
    write_log($stmt->errno, 'debug.log');
    write_log($stmt->error, 'debug.log');

    header('Location: 505_error_response_page_2.php');
}

/**
 * Log in the user
 */
function log_in($username, $password, $conn)
{

    try {
        $query = "SELECT id FROM wdv341_users WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        $result = $stmt->fetch();
        $conn = null;

        $_SESSION['is_logged_in'] = $result ? 1 : 0;

        return $_SESSION['is_logged_in'];
    } catch (PDOException $e) {
        $conn = null;

        write_log('Error:');
        write_log($e);

        return 0;
    }
}

/**
 * Log out user
 */
function log_out()
{
    // Destroy the session and log the user out
    unset($_SESSION['is_logged_in']);
    session_destroy();
}

function is_logged_in()
{
    return v_array('is_logged_in', $_SESSION);
}
