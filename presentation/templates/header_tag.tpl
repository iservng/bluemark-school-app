{*header_tag.tpl*}
 <header id="header" id="home">

      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
              <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              </ul>
            </div>
            <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
              <a href="tel:+953 012 3654 896"><span class="lnr lnr-phone-handset"></span> <span class="text">+234 813 489 9043</span></a>
              <a href="mailto:support@colorlib.com"><span class="lnr lnr-envelope"></span> <span class="text">BlueMark</span></a>
            </div>
          </div>
        </div>
    </div>
      <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
          <div id="logo">
            <a href="{$obj->mSiteUrl}"><img src="{$obj->mSiteUrl}img/logo.png" alt="" title="BlueMark" /></a>
          </div>
          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li><a href="{$obj->mSiteUrl}">Home</a></li>
              <li><a href="{$obj->mLinkToAboutUs}">About</a></li>
           
             
           

              <li class="menu-has-children"><a href="">Section</a>
                <ul>
                  {include file="departments_list.tpl"}
                </ul>
              </li>

             {*cart summary*}
             {include file="cart_summary.tpl"}

             {*click_to_student_login *}
             {include file=$obj->mClickOrLoggedCell}

               {*staff_login *}
             {include file=$obj->mStaffLoginLink}

            
              <li><a href="#search_in_the_footer">Search</a></li>
            </ul>
          </nav><!-- #nav-menu-container -->
        </div>
      </div>
    </header><!-- #header -->