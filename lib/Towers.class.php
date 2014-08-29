<?php

/**
 * Task Class
 * 
 * @author Shah Hardik 
 * @version 1.0
 *
 * 
 */
class Towers {
    # constructor

 public static function add($fields) {
        
        
        
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['location_name'] = 'location_name';
        $map['tower_height'] = 'tower_height';
        $map['energy_mode'] = 'energy_mode';
        $map['owner_name'] = 'owner_name';
        $map['owner_phone'] = 'owner_phone';
        $map['latitude'] = 'latitude';
        $map['longitude'] = 'longitude';
       
        $ds = _bindArray($data, $map);
        return qi('towers', $ds);
    }

    public static function update($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);
        $map = array();

   
         $map['location_name'] = 'location_name';
        $map['tower_height'] = 'tower_height';
        $map['energy_mode'] = 'energy_mode';
        $map['owner_name'] = 'owner_name';
        $map['owner_phone'] = 'owner_phone';
        $map['latitude'] = 'latitude';
        $map['longitude'] = 'longitude';
        
        $ds = _bindArray($data, $map);

        $condition = "id = " . $id;
        return qu('towers', $ds, $condition);
    }

    
    public static function delete($id) {
        $condition = "id =" . $id;
            return qd('towers', $condition);
    }
    
    public static function getListTower($id = '') {
        $where = '';
        if ($id != '') {
            $where.=" AND id = " . $id;
        }
        return q("SELECT * FROM towers WHERE 1=1 " . $where);
    }
    
    

    public static function gettowerDetail($id) {
        return qs("SELECT * FROM towers WHERE id = " . $id);
    }

    public static function gettowerList() {
        return q("SELECT * FROM towers");
    }

}

?>
