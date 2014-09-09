<?php
$urlArgs = _cg("url_vars");



$addIcon = "plus";
$addLabel = "Add Product";
$action_type = "add";
$name = '';

$id_val = '';

switch ($urlArgs[0]) {
    
    case "delete":
        $delete_data = Product::delete($urlArgs[1]);
        if ($delete_data) {
            $greetings = "Product deleted successfully";
            $_SESSION['greetings_msg'] = $greetings;
        } else {
            $error = "Unable to delete Product";
            $_SESSION['error_msg'] = $error;
        }
        _R(lr('product/list'));
        break;
    default:
        $product = Product::getproductList();

        $subTpl = "product_list.php";
        $activeMenuList = "active";
}
if($_REQUEST['searchrecord']){
    $name = $_REQUEST['searchval'];
    
     $product = q("SELECT * FROM product where lower(name) LIKE '%{$name}%'");
    
     include _PATH . "instance/front/tpl/product_data.php";
     die;
}

if ($_REQUEST['term'] != '') {
    $term = _escape($_REQUEST['term']);
    $data = Product::getproductAutoComplete($term);
   
    $return = array();
    foreach ($data as $each_data) {
        $return[] = array("id" => $each_data['id'], "value" => $each_data['name'], "label" => $each_data['name']);
    }
    print json_encode($return);
    die;
}

#Get Next Pre data
if ($_REQUEST['Nextrecord']) {
    $limit = $_REQUEST['Limit'];
  $product = q("SELECT * FROM product order by id DESC LIMIT {$limit},10");

    include _PATH . "instance/front/tpl/product_data.php";

    die;
}
#Count data in database
$data = q("SELECT * FROM product order by id DESC");
$length = Product::GetdataFromdb($data);


$jsInclude = "product.js.php";
_cg("page_title", "Product");
?>
