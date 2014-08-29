<?php

/**
 * User Class
 * 
 * User login
 * 
 * @author Hardik Panchal <hardikpanchal469@gmail.com>
 * @version 1.0
 * @package BePure
 * 
 */
class Installer {
    # constructor

    public static $installer_data = array();

    public function __construct() {
        
    }

    /**
     *
     * @param array $fields
     * @param integer $id
     * @return boolean 
     */
    public static function update($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);
        $map = array();
        $map['installer_email'] = 'user_name';

        if ($fields['installer_password'] != '') {
            $data['installer_password'] = md5($data['installer_password']);
            $map['installer_password'] = 'password';
        }

        $ds = _bindArray($data, $map);
        $condition = " id = " . $id;
        return qu('installer_users', $ds, $condition);
    }

    /**
     *
     * @param array $fields
     * @param integer $id
     * @return boolean 
     */
    public static function updatePassword($password, $email) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);
        $map = array();
        $data['installer_password'] = md5($password);
        $map['installer_password'] = 'password';
        $ds = _bindArray($data, $map);
        $condition = " user_name = '" . $email . "'";
        return qu('installer_users', $ds, $condition);
    }

    /**
     * Checks the login
     * @param String $user_name
     * @param String $password
     * @return boolean
     */
    public static function doLogin($user_name, $password) {
        self::$installer_data = qs(sprintf("select * from installers where installer_login = '%s' and password_login	 = '%s'", $user_name, $password));
        if (!empty(self::$installer_data)) {
            self::$installer_data['user_type'] = 'installer';
        }
        return empty(self::$installer_data) ? false : true;
    }

    /**
     * Checks the email
     * @param String $user_name
     * @return boolean
     */
    public static function ForgotPassword($user_name) {
        return qs(sprintf("select * from installers where user_name = '%s'", $user_name));
    }

    /**
     *
     * @param String $user_name
     */
    public static function setSession($user_name) {
        // d(self::$user_data);
        $_SESSION['installer'] = self::$installer_data;
    }

    /**
     *  Kill the session
     */
    public static function killSession() {
        session_destroy();
        unset($_SESSION);
    }

    function generate_password($length = 12, $special_chars = true) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        if ($special_chars)
            $chars .= '!@#$%^&*()';
        $password = '';
        for ($i = 0; $i < $length; $i++)
            $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        return $password;
    }

    public static function initUserSession($user_name) {
        self::$installer_data = qs("select * from installers  where installer_login = '{$user_name}'");
        self::$installer_data['user_type'] = 'installer';
        Agent::setSession($installer_login);
        session_regenerate_id();
    }

}

?>