<div class="listAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div style="float:left;padding-top:8px"><b>List of Product</b>
            
            <span id="next_page_no" class="hide">0</span>
            <span id="countdata" class="hide"><?php print $length; ?></span>

            <span id="prebtn" class="btn btn-default" onclick="getPrerecord();"><i class="fa fa-chevron-left"></i></span>
	    <span id="nextbtn" class="btn btn-default" onclick="getNextrecord();"><i class="fa fa-chevron-right"></i></span>&nbsp;

            
            </div> 
            <div style="float:right">
                
                <input type="text" class="form-control" onclick="" id="search" onkeyup="auto()" name="search" placeholder="Search Product"/> 
            </div> 
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
	    <?php
	    $cr = 1;
	    if (!empty($product)):
		?>
    	    <table class="table table-hover" id="table" >
    		<thead>
    		    <tr>
    			<th></th>
    			<th>#</th>
    			<th>Product Name</th>
    			<th>Product Price</th>
    			<th>Category Id</th>
                       
    			<th>Action</th>
   
    		    </tr>
    		</thead>
    		<tbody id="productlist">
			<?php foreach ($product as $each_product): ?>
			    <tr id="<?php print $each_product['id']; ?>">
				<td></td>
				<td><?php print $cr; ?></td>
				
				<td><?php print $each_product['name']; ?> </td>
				<td><?php print $each_product['price']; ?> </td>
				<td><?php print $each_product['category_id']; ?> </td>
				<td>
				    <a href="javascript:void(0);" onclick="return Deleteproduct('product/delete/<?php print $each_product['id']; ?>')"><i class="glyphicon glyphicon-trash" title="Delete"></i></a>
				    
				</td>
		
			    </tr>
			    <?php $cr++; ?>    
			<?php endforeach; ?>
    		</tbody>
    	    </table>
	    <?php else: ?>
    	    <div>No Product available</div>
	    <?php endif; ?>
        </div>
    </div>
</div>