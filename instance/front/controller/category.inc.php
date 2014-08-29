<?php
$urlArgs = _cg("url_vars");


if (isset($_REQUEST['fields']) && $_REQUEST['fields']['category_id'] == '') {
    
 
  
    $new_category_id = Category::add($_REQUEST[fields]);
    if ($new_category_id > 0) {
        $greetings = "New Category inserted successfully";
    } else {
        $error = "Unable to add new Category";
    }
}
if (isset($_REQUEST['fields']) && $_REQUEST['fields']['category_id'] > 0) {
   
    $new_category_id = Category::update($_REQUEST['fields'], $_REQUEST['fields']['category_id']);
    if ($new_category_id > 0) {
        $greetings = "Category updated successfully";
        unset($_REQUEST['fields']);
    }
}

$addIcon = "plus";
$addLabel = "Add Category";
$action_type = "add";
$name = '';

$id_val = '';

switch ($urlArgs[0]) {
    case "edit":
        $subTpl = "category_add.php";
        $addIcon = "edit";
        $addLabel = "Edit Category";
        $action_type = "edit";
        $activeMenuAdd = "active";
        if ($urlArgs[1] > 0) {

            $view_data = Category::getcategoryDetail($urlArgs[1]);
            $name = $view_data['name'];
           
            $id_val = $urlArgs[1];
        }

        break;
    case "add":
        $subTpl = "category_add.php";
        $activeMenuAdd = "active";
        break;
    case "delete":
        $delete_data = Category::delete($urlArgs[1]);
        if ($delete_data) {
            $greetings = "Category deleted successfully";
            $_SESSION['greetings_msg'] = $greetings;
        } else {
            $error = "Unable to delete Category";
            $_SESSION['error_msg'] = $error;
        }
        _R(lr('category/list'));
        break;
    default:
        $category = Category::getcategoryList();

        $subTpl = "category_list.php";
        $activeMenuList = "active";
}


$jsInclude = "category.js.php";
_cg("page_title", "Category");
?>
