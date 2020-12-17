{*smarty*}
{config_load file="site.conf"}
{load_presentation_object filename="store_front" assign="obj"}
<!DOCTYPE html>
<html lang="en" class="no-js">
  {include file="head_tag.tpl"}
  <body>


    <!-- header stars here  -->
   {include file="header_tag.tpl"} 
    {*header_tag.tpl*}

   
{if !$obj->mHideBoxes}
    <!-- start banner Area -->
    {include file="main_banner_area.tpl"}
    <!-- End banner Area -->

    <!-- Start feature Area -->
    {include file="feature_area.tpl"}
    <!-- End feature Area -->
{/if}
    <!-- Start popular-course Area -->
    {* {include file="products_list_area.tpl"} *}
    {include file=$obj->mContentsCell}
    <!-- End popular-course Area -->

{if !$obj->mHideBoxes}
    <!-- Start search-course Area -->
    {include file="customer_login.tpl"}
    <!-- End search-course Area -->


    <!-- Start upcoming-event Area start here tt-->
    {include file="upcoming_events_area.tpl"}
    <!-- End upcoming-event Area -->

    <!-- Start review/testimonial Area -->
    {include file="parent_testimonial_area.tpl"}
    <!-- End review Area -->

    <!-- Start become an instructor Area -->
    {include file="become_an_instructor_area.tpl"}
    <!-- End cta-one Area -->

    <!-- Start blog Area -->
    {include file="blog.tpl"}
    <!-- End blog Area -->

    <!-- Start brochure Area -->
    {include file="brochure.tpl"}
    <!-- End brochure Area -->
{/if}
<!-- form itself -->
    {include file="pin_form.tpl"}
    {include file="teacher_apply_form.tpl"}
    {include file="check_admission_status_form.tpl"}
    <!-- start footer Area -->
    {include file="footer.tpl"}
   
    <!-- End footer Area -->

    {include file="js_files.tpl"}
  </body>
</html>
