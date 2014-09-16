<!--
    <div class="hover col-xs-12 col-sm-6 col-md-4 col-lg-3" style="height:90px;width:180px;background-color:#f4f4f4;margin-bottom: 30px;margin-left:40px">

        <div style="margin-top:35px">
            <input type="checkbox" class="chk" value="<?php print $Categorie; ?>"/>&nbsp;&nbsp;
            <span style="font-size: 17px;"><?php echo $Categorie; ?></span>

        </div>
    

    <?php
    echo '<b>Already imported</b> -';
    echo $product->name;
    echo '</br>';
    ?>
   </div>
-->

<div class="clearfix visible-xs" style="height:10px"></div>
<div class="listAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div style="float:left;padding-top:8px"><b>Selected Category Imported</b>
            
            </div> 
            <div style="float:right">
                
                <input type="text" class="form-control" onclick="" id="search" onkeyup="auto()" name="search" placeholder="Search Product"/> 
            </div> 
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
    	    <table class="table table-hover" id="table" >
    		<thead>
    		    <tr>
    			<th></th>
    			<th>#</th>
                        <th>Category</th>
    			<th>Product Name</th>
    			<th>Product Price</th>
    			<th>Action</th>
   
    		    </tr>
    		</thead>
    		<tbody id="productlist">
			
			    <tr id="<?php ?>">
				<td></td>
				<td><b>Already imported</b> </td>
				
				<td><?php echo $product->name; ?> </td>
				<td><?php echo $product->price; ?> </td>
				<td><?php print $Categorie; ?> </td>
				<td>
				   
				</td>
		
			    </tr>
			   
    		</tbody>
    	    </table>
	   
        </div>
    </div>
</div>