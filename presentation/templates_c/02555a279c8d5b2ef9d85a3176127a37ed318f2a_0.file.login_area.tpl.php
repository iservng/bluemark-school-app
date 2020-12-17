<?php
/* Smarty version 3.1.33, created on 2020-02-24 01:43:10
  from 'C:\xampp\htdocs\bluemark\presentation\templates\login_area.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e531c1e510640_00643034',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02555a279c8d5b2ef9d85a3176127a37ed318f2a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\login_area.tpl',
      1 => 1582504986,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e531c1e510640_00643034 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="search-course-area relative" id="student_login">
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
                  Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 search-course-right section-gap">
            <form class="form-wrap" action="#">
              <h4 class="text-white pb-20 text-center mb-30">Student LOGIN below</h4>
              <input type="text" class="form-control" name="name" placeholder="Your Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'" >
              <input type="phone" class="form-control" name="phone" placeholder="Your Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Phone Number'" >
              <input type="email" class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'" >
              <div class="form-select" id="service-select">
                <select>
                  <option datd-display="">Choose Course</option>
                  <option value="1">Course One</option>
                  <option value="2">Course Two</option>
                  <option value="3">Course Three</option>
                  <option value="4">Course Four</option>
                </select>
              </div>
              <button class="primary-btn text-uppercase">Submit</button>
            </form>
          </div>

        </div>
      </div>
    </section><?php }
}
