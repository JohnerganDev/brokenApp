
<?php if (isset($flashMessage) && strlen(trim($flashMessage)) > 0 ) : ?>
<div class="alert">
	<button type="button" class="close" data-dismiss="alert">�</button>
	<strong>Message</strong>
	<?php echo $flashMessage ?>
</div>

<?php endif;  ?>
<form class="form-horizontal" method="post" action="insert.php" enctype="multipart/form-data" >
	
    <input type="hidden" name="product_id" placeholder="Description"
		value="<?php echo $mfs['mf_id']; ?>" />
	<div class="control-group">
		<label class="control-label" for="inputproductTitle">Product</label>
		<div class="controls">
			<input type="text" id="inputproductTitle" name="title"
				placeholder="Title" value=<?php echo $mfs['mf_title']; ?>>
                        
		</div>
	</div>

	<div class="control-group">
		<div class="controls">

			<input type="submit" class="btn" />

		</div>
	</div>
</form>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

