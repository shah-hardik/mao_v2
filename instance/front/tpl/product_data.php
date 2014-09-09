
<?php  $cr = 1;?>

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