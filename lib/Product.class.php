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

    public static function add($fields) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['product_name'] = 'product_name';
        $map['measure_unit'] = 'measure_unit';
        $map['cost_price'] = 'cost_price';
        $map['sales_price'] = 'sales_price';
        $map['vat'] = 'vat';
        
        $ds = _bindArray($data, $map);
        return qi('products', $ds);
    }

    public static function update($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);
        $map = array();
        $map['product_name'] = 'product_name';
        $map['measure_unit'] = 'measure_unit';
        $map['cost_price'] = 'cost_price';
        $map['sales_price'] = 'sales_price';
        $map['vat'] = 'vat';
        
        $ds = _bindArray($data, $map);

        $condition = "id = " . $id;
        return qu('products', $ds, $condition);
    }

    public static function delete($id) {
        $condition = "id =" . $id;
        return qd('products', $condition);
    }

    public static function getproductsDetail($id) {
        return qs("SELECT * FROM products WHERE id = " . $id);
    }

    public static function getproductList() {
        return q("SELECT * FROM products");
    }

}

?>
