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
   
   //$optionsets = Bigcommerce::getOptionSetsCount();
 
 //d($optionsets);
  echo '<div style="padding-top:50px;">';
foreach ($option as $options){
    
    echo '<div class="hover col-xs-12 col-sm-6 col-md-4 col-lg-3" style="height:100px;width:200px;background-color:#f4f4f4;margin-bottom: 30px;margin-left:40px">';
        echo '<div style="margin-top:35px">
            
            <span style="font-size: 17px;">';
        echo $options->name; 
        echo '</span>';

       echo  '</div></br>';
        $filter = array("OptionValue" => $options->id);
    
   $optionsets = Bigcommerce::getOptionValues($filter);
       foreach ($optionsets as $optionset){
         echo '<div style="margin-top:35px">
            
            <span style="font-size: 17px;">';
        echo $optionset->name; 
        echo '</span>';

       echo  '</div></br>';  
       }
       
 echo '</div>';
 
}
echo '</div>';
?>
