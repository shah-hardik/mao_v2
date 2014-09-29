<?php

/**
 * Admin side Login file
 * 
 * 
 * @author Hardik Shah
 * @version 1.0
 * @package MaO
 * 
 */
if (!isset($_SESSION['user'])) {
    if ($_REQUEST['username']) {

        $user_name = _escape($_REQUEST['username']);
        $password = _escape($_REQUEST['password']);
        if (User::doLogin($user_name, $password)) {
            User::initUserSession($user_name);
            //_R(lr('home'));
            _R(lr('customer'));
        } else {
            $error = "Invalid Credentials";
        }
        $jsInclude = "login.js.php";
    }
    $no_visible_elements = true;
} else {
    _R(lr('login'));
}
_cg("page_title", "Login");
?>