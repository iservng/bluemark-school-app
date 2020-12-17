{*customer_login.tpl*}
{load_presentation_object filename="customer_login" assign="obj"}

{*login_area.tpl*}
<section class="search-course-area relative" id="student_login">
      <div class="overlay overlay-bg"></div>
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col-lg-6 col-md-6 search-course-left">
            <h1 class="text-white">
              Get reduced fee <br>
              during this Summer!
            </h1>
            <p>
              inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
            </p>
            <div class="row details-content">
              <div class="col single-detials">
                <span class="lnr lnr-graduation-hat"></span>
                <a href="#"><h4>Expert Instructors</h4></a>
                <p>
                  Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                </p>
              </div>
              <div class="col single-detials">
                <span class="lnr lnr-license"></span>
                <a href="#"><h4>Certification</h4></a>
                <p>
                  Usage of the Internet is so becoming more common due to rapid advancement of technology and power.
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 search-course-right section-gap">
          
            <form class="form-wrap" method="post" action="{$obj->mLinkToLogin}">
              <h4 class="text-white pb-20 text-center mb-30">Student LOGIN below</h4>

              {if $obj->mErrorMessage}
            <p style="color: red;">{$obj->mErrorMessage}</p>
            {/if}

              <input type="email" class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'" size="22" value="{$obj->mEmail}" maxlength="50">

              <input type="password" class="form-control" name="password" placeholder="Your Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Password'" maxlength="50" size="22">

              <input type="submit" class="primary-btn text-uppercase" name="Login" value="Login">

              
            </form>
          </div>

        </div>
      </div>
    </section>