<?php
$urlArgs = _cg("url_vars");


if (isset($_REQUEST['fields']) && $_REQUEST['fields']['customer_id'] == '') {
    
 
  
    $new_customer_id = Customer::addapi($_REQUEST[fields]);
    if ($new_customer_id > 0) {
        $greetings = "New Api inserted successfully";
    } else {
        $error = "Unable to add new Api";
    }
}

$addIcon = "plus";
$addLabel = "Add Customer";
$action_type = "add";
$type = '';
$question = '';
$options = '';
$group_name = '';
$answer_type = '';
$id_val = '';
$vehicleIds = '';
$help = '';


switch ($urlArgs[0]) {
   
    
    case "delete":
        $delete_data = Customer::delete($urlArgs[1]);
        if ($delete_data) {
            $greetings = "Customer deleted successfully";
            $_SESSION['greetings_msg'] = $greetings;
        } else {
            $error = "Unable to delete Customer";
            $_SESSION['error_msg'] = $error;
        }
        _R(lr('api_detail'));
        break;
    default:
        $customer = Customer::getcustomerList();

}


$jsInclude = "customer.js.php";
_cg("page_title", "Api Detail");
?>
