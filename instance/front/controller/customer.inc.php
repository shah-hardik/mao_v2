<?php
$urlArgs = _cg("url_vars");


if (isset($_REQUEST['fields']) && $_REQUEST['fields']['customer_id'] == '') {
    
 
  
    $new_customer_id = Customer::add($_REQUEST[fields]);
    if ($new_customer_id > 0) {
        $greetings = "New Customer inserted successfully";
    } else {
        $error = "Unable to add new Customer";
    }
}
if (isset($_REQUEST['fields']) && $_REQUEST['fields']['customer_id'] > 0) {
   
    $new_customer_id = Customer::update($_REQUEST['fields'], $_REQUEST['fields']['customer_id']);
    if ($new_customer_id > 0) {
        $greetings = "Customer updated successfully";
        unset($_REQUEST['fields']);
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
    case "edit":
        $subTpl = "customer_add.php";
        $addIcon = "edit";
        $addLabel = "Edit Customer";
        $action_type = "edit";
        $activeMenuAdd = "active";
        if ($urlArgs[1] > 0) {

            $view_data = Customer::getcustomerDetail($urlArgs[1]);
            $name = $view_data['name'];
            $email = $view_data['email'];
            $phone = $view_data['phone'];
            
            $id_val = $urlArgs[1];
        }

        break;
    case "add":
        $subTpl = "customer_add.php";
        $activeMenuAdd = "active";
        break;
    case "delete":
        $delete_data = Customer::delete($urlArgs[1]);
        if ($delete_data) {
            $greetings = "Customer deleted successfully";
            $_SESSION['greetings_msg'] = $greetings;
        } else {
            $error = "Unable to delete Customer";
            $_SESSION['error_msg'] = $error;
        }
        _R(lr('customer/list'));
        break;
    default:
        $customer = Customer::getcustomerList();

        $subTpl = "customer_list.php";
        $activeMenuList = "active";
}


$jsInclude = "customer.js.php";
_cg("page_title", "Customer");
?>
