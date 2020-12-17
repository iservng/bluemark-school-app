{*pin_form.tpl*}
{* {load_presentation_object filename="pin_form" assign="obj"} *}

<form method="post" action="{$obj->mSiteUrl}" id="teacher-form" class="mfp-hide white-popup-block white-popup" enctype="multipart/form-data">
	<h3><b>Apply Now</b></h3>
    <hr>
	<fieldset style="border:0;" id="checkinglinee">
		
		<ol>
			<li>
				<label for="name">&nbsp;</label>
                
				<input class="single-input-primary" id="fullname" name="fullname" type="text" placeholder="Enter your full Name" required="" style="border: 1px solid #f7631b;">

                
			</li>
			<li>
				<label for="phoneNumber">&nbsp;</label>
                
				<input class="single-input-primary" id="phoneNumber" name="phoneNumber" type="text" placeholder="Enter your phone number" required="" style="border: 1px solid #f7631b;">

                
			</li>
			<li>
				<label for="emailaddress">&nbsp;</label>
                
				<input class="single-input-primary" id="emailaddress" name="emailaddress" type="email" placeholder="Enter your Email" required="" style="border: 1px solid #f7631b;">

                
			</li>
			
			<li>
				<br>
                <label for="cv"> <b>Upload your well documented CV.</b> </label>
				<input class="single-input-primary" id="cv" name="cv" type="file" placeholder="" required="" style="">
				
                
			</li>
			<br>
            
				<label for="name">&nbsp;</label>
				<input class="genric-btn primary" name="become_teacher" type="submit" value="Submit">
			
			
		</ol>
	</fieldset>
</form>