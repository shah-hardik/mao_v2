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
         
        echo '<div class="hover col-xs-12 col-sm-6 col-md-4 col-lg-3" style="height:300px;width:550px;background-color:#f4f4f4;margin-bottom: 30px;margin-left:40px">';
        echo '<div style="margin-top:35px">
            <input type="checkbox" class="chk" value="print $Categorie"/>&nbsp;&nbsp;
            <span style="font-size: 17px;">';
        echo $Categorie; 
        echo '</span>';

       echo  '</div></br>';
       
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
     echo '<b>Already imported</b> -';
    echo $product->name; echo '&nbsp;&nbsp;';
    
    echo '</br>';
        //include _PATH . "instance/front/tpl/categories_import_data.php";
       //include _PATH . "instance/front/tpl/import_list.php";
    }
    }
    echo '</div>';
    }
    
    die();
}

$jsInclude = "category.js.php";
_cg("page_title", "Category Import");
?>
