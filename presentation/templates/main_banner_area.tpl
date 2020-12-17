{*main_banner_area.tpl*}
<section class="banner-area relative" id="home">
      <div class="overlay overlay-bg"></div>
      <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-between">
          <div class="banner-content col-lg-9 col-md-12">
            <h1 class="text-uppercase">
              {$obj->mIsPageMassage}
            </h1>
            <h4 class="pt-10 pb-10" style="color: #fff;">
              {if $obj->mSubPageMassage}
                {$obj->mSubPageMassage}<hr style="color: #fff;">
              {/if}
              {* <h4 style="color: white;"><a href="#">Buy Admission cratch card here</a></h4> *}
            </h4>

            {if $obj->mShowHideAdmissionStatusBtn == true}
             <a href="#check-admission-form" class="genric-btn info radius popup-with-form">Check Admission Status</a>
            {/if}
            
            <br><br>
            {* llpvvvv check-admission-form *}

            
            {* ---------------------- *}
            {if $obj->mPrintAdmissionLetterBtn == true}

              <form method="post" action="{$obj->mSiteUrl}" target="_blank">
                <input type="submit" name="print_admission_letter" value="Print Admission Letter" class="genric-btn info radius">
              </form>
              
            {else}
              <a href="#test-form" class="primary-btn text-uppercase popup-with-form">Apply for Admission</a> 
            {/if}
            {* ---------------------------- *}
          </div>
        </div>
      </div>
</section>