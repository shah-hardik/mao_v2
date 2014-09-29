<?php
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
                           
 $option = Bigcommerce::getOptions(); 
   //d($option[0]->Colors);
   
 $filter = array("Product" => $option[0]->Colors);
 $products = Bigcommerce::getProducts($filter);
// $op = Bigcommerce::options();
 $op = Bigcommerce::getOption(32);
 d($op[0]);
 //d($products[0]);
  foreach ($products as $product){
      //d($product->options);
  }
 
  echo '<div style="padding-top:50px;">';
foreach ($option as $options){
    
    echo '<div class="hover col-xs-12 col-sm-6 col-md-4 col-lg-3" style="height:525px;width:200px;background-color:#f4f4f4;margin-bottom: 30px;margin-left:40px">';
        echo '<div style="margin-top:35px">
            
            <label class="control-label" style="font-size: 17px;">';
        echo $options->name; 
        echo '</label>';

       echo  '</div></br>';
       $id = $options->id;
        $filter = array("OptionValue" => $options->name);
    
   $optionsets = Bigcommerce::getOptionValues($filter);
   
       foreach ($optionsets as $optionset){
        
            
           echo '<span style="font-size: 17px;">';
        echo $optionset->label; echo '&nbsp (';
        echo $optionset->value; echo ')';
        echo '</span>';

       echo  '</br>';  
       }
       
 echo '</div>';
 
}
echo '</div>';
?>
