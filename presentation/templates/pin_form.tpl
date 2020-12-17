{*pin_form.tpl*}
{* {load_presentation_object filename="pin_form" assign="obj"} *}

<form method="post" action="{$obj->mSiteUrl}" id="test-form" class="mfp-hide white-popup-block white-popup">
	<h3><b>Admission PIN</b></h3>
    <hr>
	<fieldset style="border:0;">
		
		<ol>
			<li>
				<label for="name">Scratch and carefully enter your PIN</label>
                
				<input class="single-input-primary" id="name" name="pin_number" type="text" placeholder="Enter PIN here" required="" style="border: 1px solid #f7631b;">
			</li><br>
            
				<label for="name">&nbsp;</label>
				<input class="genric-btn primary" name="submitted_pin" type="submit" value="Submit">
			
			
		</ol>
	</fieldset>
</form>