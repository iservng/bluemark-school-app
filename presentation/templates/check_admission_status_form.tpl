{*pin_form.tpl*}
{* {load_presentation_object filename="pin_form" assign="obj"} *}

<form method="post" action="{$obj->mSiteUrl}" id="check-admission-form" class="mfp-hide white-popup-block white-popup">
	<h3><b>Check Admission Status</b></h3>
    <hr>
	<fieldset style="border:0;" id="checkingline">
		
		<ol>
			<li>
				<label for="chech_status_email">Enter your Email Address</label>
                
				<input class="single-input-primary" id="chech_status_email" name="chech_status_email" type="email" required style="border: 1px solid #f7631b;"><br>

				<label for="chech_status_paswd">Enter your Password</label>
                
				<input class="single-input-primary" id="chech_status_paswd" name="chech_status_paswd" type="password" required="" style="border: 1px solid #f7631b;">
			</li><br>
            
				<label for="">&nbsp;</label>
				<input class="genric-btn primary" id="" name="admissionStatusCheckBtn" type="submit" value="Submit">
			
			
		</ol>
	</fieldset>
</form>