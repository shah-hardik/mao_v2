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
class Agent {
    # constructor

    public static $agent_data = array();

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
        $map['agent_email'] = 'user_name';

        if ($fields['agent_password'] != '') {
            $data['agent_password'] = md5($data['agent_password']);
            $map['agent_password'] = 'password';
        }

        $ds = _bindArray($data, $map);
        $condition = " id = " . $id;
        return qu('agent_users', $ds, $condition);
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
        $data['agent_password'] = md5($password);
        $map['agent_password'] = 'password';
        $ds = _bindArray($data, $map);
        $condition = " user_name = '" . $email . "'";
        return qu('agent_users', $ds, $condition);
    }

    /**
     * Checks the login
     * @param String $user_name
     * @param String $password
     * @return boolean
     */
    public static function doLogin($user_name, $password) {
        self::$agent_data = qs(sprintf("select * from agents where agent_login = '%s' and password_login	 = '%s'", $user_name, $password));
        if (!empty(self::$agent_data)) {
            self::$agent_data['user_type'] = 'agent';
        }
        return empty(self::$agent_data) ? false : true;
    }

    /**
     * Checks the email
     * @param String $user_name
     * @return boolean
     */
    public static function ForgotPassword($user_name) {
        return qs(sprintf("select * from agents where user_name = '%s'", $user_name));
    }

    /**
     *
     * @param String $user_name
     */
    public static function setSession($user_name) {
        // d(self::$user_data);
        $_SESSION['agent'] = self::$agent_data;
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
        self::$agent_data = qs("select * from agents  where agent_login = '{$user_name}'");
        self::$agent_data['user_type'] = 'agent';
        Agent::setSession($agent_login);
        session_regenerate_id();
    }

}

?>