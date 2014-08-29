<?php

/**
 * Task Class
 * 
 * @author Shah Hardik 
 * @version 1.0
 * 
 * 
 */
class Customer {
    # constructor

    public static function add($fields) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['name'] = 'name';
        $map['email'] = 'email';
        $map['phone'] = 'phone';

        $ds = _bindArray($data, $map);
        return qi('customers', $ds);
    }

    public static function update($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);
        $map = array();

        $map['name'] = 'name';
        $map['email'] = 'email';
        $map['phone'] = 'phone';
        
        $ds = _bindArray($data, $map);

        $condition = "id = " . $id;
        return qu('customers', $ds, $condition);
    }

    public static function delete($id) {
        $condition = "id =" . $id;
        return qd('customers', $condition);
    }

    public static function getcustomerDetail($id) {
        return qs("SELECT * FROM customers WHERE id = " . $id);
    }

    public static function getcustomerList() {
        return q("SELECT * FROM customers");
    }

}

?>
