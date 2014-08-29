<?php

/**
 * Task Class
 * 
 * @author Shah Hardik 
 * @version 1.0
 * 
 * 
 */
class Category {
    # constructor

    public static function add($fields) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['name'] = 'name';
        

        $ds = _bindArray($data, $map);
        return qi('category', $ds);
    }

    public static function update($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);
        $map = array();

        $map['name'] = 'name';
       
        $ds = _bindArray($data, $map);

        $condition = "id = " . $id;
        return qu('category', $ds, $condition);
    }

    public static function delete($id) {
        $condition = "id =" . $id;
        return qd('category', $condition);
    }

    public static function getcategoryDetail($id) {
        return qs("SELECT * FROM category WHERE id = " . $id);
    }

    public static function getcategoryList() {
        return q("SELECT * FROM category");
    }

}

?>
