<?php
/* Smarty version 3.1.33, created on 2020-03-30 03:27:31
  from 'C:\xampp\htdocs\bluemark\presentation\templates\student_attestation_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e815913694277_41904086',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb56a7efc48696a9be5e898f8debef4cb72a83e5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\student_attestation_form.tpl',
      1 => 1585501104,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e815913694277_41904086 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"attestation_info",'assign'=>"obj"),$_smarty_tpl);?>



<div class="col-lg-8">
							<form class="form-area contact-form text-right" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkOnTheForm;?>
" method="post">
								<div class="row">

									<div class="col-lg-6 form-group">
										<h2 style="color:#f7631b;"> Attestation</h1><hr>

                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAttestationError == 1) {?>
										<span style="color: red;"> Attestation must be checked </span>
										<?php }?>
										<label for="attestation"><h4 style="color: green;">I Agree to the following</h4></label>

										<hr>

										<input type="checkbox" value="Agree" name="attestation" id="attestation"> I hereby apply for admission, and agree to abide by the rules and regulations of the school. I also declare that the information supplied above are correct to the best of my knowledge and would be liable for any falsehood detected hereafter.

									</div>





									<div class="col-lg-6 form-group">

										<h2 style="color: #f7631b;"> Information</h1>
										<hr>

										<p>
                                            <h6>mLinkToNurseryForm</h6>
                                        </p>
                                        I hereby apply for admission, and agree to abide by the rules and regulations of the school. I also declare that the information supplied above are correct to the best of my knowledge and would be liable for any falsehood detected hereafter.


										<p>
                                            <h6>mLinkToNurseryForm</h6>
                                        </p>
                                        I hereby apply for admission, and agree to abide by the rules and regulations of the school. I also declare that the information supplied above are correct to the best of my knowledge and would be liable for any falsehood detected hereafter.




                                        <br><br>
									</div>
									


									</div> 






                                    <input type="hidden" name="section" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSection4rmurl;?>
">
									<input type="hidden" name="formPart" value="userattestationinfo">
                                    
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<input type="submit" class="genric-btn primary small" value="Submit Information" name="user_attestation_info">
									</div>
								</div>
							</form>
						</div><?php }
}
