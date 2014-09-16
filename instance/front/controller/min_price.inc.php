<?php
$urlArgs = _cg("url_vars");


if (isset($_REQUEST['fields']) && $_REQUEST['fields']['price_id'] == '') {
    
 
  
    $new_customer_id = Customer::addprice($_REQUEST[fields]);
    if ($new_customer_id > 0) {
        $greetings = "New Price inserted successfully";
    } else {
        $error = "Unable to add new Price";
    }
}

$jsInclude = "customer.js.php";
_cg("page_title", "Mini Price");
?>
