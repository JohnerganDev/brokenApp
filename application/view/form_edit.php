
<?php if (isset($flashMessage) && strlen(trim($flashMessage)) > 0 ) : ?>
<div class="alert">
	<button type="button" class="close" data-dismiss="alert">�</button>
	<strong>Message</strong>
	<?php echo $flashMessage ?>
</div>

<?php endif;  ?>
<form class="form-horizontal" method="post" action="admin.php" enctype="multipart/form-data" >
	
    <input type="hidden" name="product_id" placeholder="Description"
		value="<?php echo $product['product_id']; ?>" />
	<div class="control-group">
		<label class="control-label" for="inputproductTitle">Product</label>
		<div class="controls">
			<input type="text" id="inputproductTitle" name="title"
				placeholder="Title" value="<?php echo $product['title']; ?>">
		</div>
	</div>


	<div class="control-group">
		<label class="control-label" for="inputproductTitle">Description</label>
		<div class="controls">

			<textarea  type="text" id="inputproductDescription" name="Description"
				placeholder="Description" value="<?php echo $product['description']; ?>"></textarea>
		</div>
	</div>


	<div class="control-group">
		<label class="control-label" for="inputproductRunningTime">Price</label>
		<div class="controls">
			<input type="text" id="inputPrice" name="price"
				placeholder="Price"
				value="<?php echo $product['price']; ?>"
		</div>
	</div>
    </div>


	<div class="control-group">
		<label class="control-label" for="inputproductTitle">Manufacturer</label>
		<div class="controls">
			<?php 
				$records = mf_get_all();
	
				$arrayItems=array();

				$count = sizeof($records);
				for($i=0; $i < $count; $i++) {

				$arrayItems[$i]["label"]=$records[$i]['mf_title'];
				$arrayItems[$i]["id"]=$records[$i]['mf_id'];
	

				}


echo uihelperSelect('mf_id',$arrayItems,$product['mf_id']) ?>
		</div>
	</div>





	<div class="control-group">
		<label class="control-label" for="inputproductTitle">Taste</label>
		<div class="controls">
			<select id="taste" name="taste">
				<option value="Sweet"<?php echo output_selected($product['taste'],'Sweet') ?>>Sweet</option>
				<option value="Savoury"<?php echo output_selected($product['taste'],'Savoury') ?>>Savoury</option>
				<option value="Sour"<?php echo output_selected($product['taste'],'Sour') ?>>Sour</option>
			

			</select>
		</div>
	</div>
    
    	<div class="control-group">
		<label class="control-label" for="inputproductTitle">Country</label>
		<div class="controls">
			<select id="country" name="country">
				<option value="Ireland"<?php echo output_selected($product['country'],'Ireland') ?>>Ireland</option>
				<option value="UK"<?php echo output_selected($product['country'],'UK') ?>>UK</option>
				<option value="France"<?php echo output_selected($product['country'],'France') ?>>France</option>
			

			</select>
		</div>
	</div>


<!--  note, you cannot style file upload button, but folllowinglink is useful -->
<!--  http://www.quirksmode.org/dom/inputfile.html -->

	<div class="control-group">
	<label class="control-label" for="inputproductTitle">Upload Image</label>
		<div class="controls">

			<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                            <input name="uploadedfile" type="file" />
		</div>
	</div>
	<div class="control-group">
		<div class="controls">

                    <input type="submit" value='<?php echo $button_label;?>' class="btn" />

		</div>
	</div>
</form>


