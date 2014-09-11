<?php

/**
 * Task Class
 * 
 * @author Shah Hardik 
 * @version 1.0
 * 
 * 
 */
class Product {
    # constructor

  public static function GetdataFromdb($array) {
        $counter = 0;
        for ($i = 0, $e = count($array); $i < $e; $i++) {
            if (!empty($array[$i])) {
                $counter += 1;
            }
        }
        return $counter;
    }
    public static function delete($id) {
        $condition = "id =" . $id;
        return qd('product', $condition);
    }

    public static function getproductDetail($id) {
        return qs("SELECT * FROM product WHERE id = " . $id);
    }
    public static function checkproductId($id) {
        return qs("SELECT * FROM product WHERE product_id = " . $id);
    }

    public static function getproductList() {
        return q("SELECT * FROM product order by id DESC LIMIT 0,10");
    }
    public static function getproductAutoComplete($term) {
        $term = strtolower($term);
        $query = "SELECT * FROM product where lower(name) LIKE '%{$term}%'  ";
        return q($query);
    }


}

?>
