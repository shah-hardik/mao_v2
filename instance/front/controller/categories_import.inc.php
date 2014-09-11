<?php

$urlArgs = _cg("url_vars");
include _PATH . "instance/front/tpl/bigcommerce.php";

//require_once 'bigcommerce.php';
use Bigcommerce\Api\Client as Bigcommerce;

Bigcommerce::configure(array(
    'store_url' => 'https://store-r8x2rgt2.mybigcommerce.com',
    'username' => 'hcibrent@gmail.com',
    'api_key' => '884a445038d9b2207dd168e5245c006f5ab94e3c'
));
Bigcommerce::setCipher('RC4');
Bigcommerce::verifyPeer(FALSE);
                           
  
$Categories = Bigcommerce::getCategories();

if ($_REQUEST['doImport'] == 1) {
    
    $Categories = $_REQUEST['categoreIds'];
   
    foreach ($Categories as $Categorie){
        print $Categorie;echo '</br>';
        
    $filter = array("category" => $Categorie);
    $products = Bigcommerce::getProducts($filter);
    
    foreach ($products as $product){
        $prId = Product::checkproductId($product->id);
        if($prId == ''){
        qi('product', array(
                    'product_id' => _escape($product->id),
                    'name' => _escape($product->name),
                    'price' => _escape($product->price),
                    'category_id' => _escape($Categorie)
                        ), 'REPLACE');
        
        echo $product->name; 
        echo '</br>';
        }
 else {
       echo '<b>This Product already imported</b> -';
        echo $product->name; 
        echo '</br>';
      }
    }
    }
     include _PATH . "instance/front/tpl/categories_import_data.php";
    die();
}

$jsInclude = "category.js.php";
_cg("page_title", "Category Import");
?>
