
{*search_results.tpl*}






{*product_list_area.tpl*}
{* {include file="small_banner_area.tpl"} *}
<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
							Search Results
			</h1>	
		{* 	<p class="text-white link-nav">
				<a href="index.html"> </a>  
				<span class="lnr lnr-arrow-right"></span>  
				<a href="events.html"> </a>
			</p> *}
		 </div>	
	</div>
</div>
</section>


<section class="popular-course-area section-gap">
      <div class="container">

        <div class="row d-flex justify-content-center">
          <div class="menu-content pb-70 col-lg-8">
            <div class="title text-center">
              <h1 class="mb-10">Your search results</h1>
              <p></p>
              
            </div>
          </div>
        </div>

        <div class="row">
          <div class="active-popular-carusel">

          {include file="products_list.tpl"}

          </div>
        </div>
      </div>
    </section>