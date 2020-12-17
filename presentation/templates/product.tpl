{*product.tpl*}
{load_presentation_object filename="product" assign="obj"}

<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			 <h1 class="text-white">
				{$obj->mProduct.name}		
			</h1>	
			{*<p class="text-white link-nav">
				<a href="index.html"> </a>  
				<span class="lnr lnr-arrow-right"></span>  
				<a href="events.html"> </a>
			</p> *}
		 </div>	
	</div>
</div>
</section>

<section class="post-content-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 posts-list">
							<div class="single-post row">
								<div class="col-lg-3  col-md-3 meta-details">
									<ul class="tags">
										<li><a href="">&nbsp;</a></li>
										<li><a href="">&nbsp;</a></li>
										<li><a href="">&nbsp;</a></li>
										<li><a href="">&nbsp;</a></li>
									</ul>

	<div class="user-details row">
    {if $obj->mProduct.discounted_price != 0}
        <p class="view col-lg-12 col-md-12 col-6">Unbatable Price:
            <a href="">N{$obj->mProduct.discounted_price}</a> 
        </p>
    {else}
        <p class="view col-lg-12 col-md-12 col-6">Price:
            <a href="">N{$obj->mProduct.price}</a> 
        </p>
    {/if}
	

        {* <p class="view col-lg-12 col-md-12 col-6"> *}
            {*The Add to Cart form*}
<form class="" target="_self" method="post" action="{$obj->mProduct.link_to_add_product}" onclick="return addProductToCart(this);">

{* Generate the list of attribute values *}
<p class="">
  {*Parse the list of attributes and attribute values*}
    {section name=k loop=$obj->mProduct.attributes}
      {*Generate new select tag?*}
      {if $smarty.section.k.first || $obj->mProduct.attributes[k].attribute_name !== $obj->mProduct.attributes[k.index_prev].attribute_name}
      {$obj->mProduct.attributes[k].attribute_name}:
      <select name="attr_{$obj->mProduct.attributes[k].attribute_name}">
      {/if}

        {*Generate a new option tag *}
        <option value="{$obj->mProduct.attributes[k].attribute_value}">
          {$obj->mProduct.attributes[k].attribute_value}
        </option>

      {*Close the select tag*}
      {if $smarty.section.k.last || $obj->mProduct.attributes[k].attribute_name !== $obj->mProduct.attributes[k.index_next].attribute_name}
      </select>
      {/if}
    {/section}

</p>

{*Add the submit button and close the from*}
<p>
    <input class="genric-btn primary small" type="submit" name="add_to_cart" value="Add to Cart">
</p>
</form> 

{if $obj->mShowEditButton}
    <form action="{$obj->mEditActionTarget}" target="_self" method="post" class="edit-form">
        <p>
            <input class="genric-btn primary small" type="submit" name="submit_edit" value="Edit Product Details">
        </p>
    </form>
{/if}
        {* </p> *}

		{* <p class="view col-lg-12 col-md-12 col-6">
            <a href="#">1.2M Views</a> 
            <span class="lnr lnr-eye"></span>
        </p>

		<p class="comments col-lg-12 col-md-12 col-6">
            <a href="#">06 Comments</a> 
            <span class="lnr lnr-bubble"></span>
        </p>						 *}
	</div>










								</div>
								<div class="col-lg-9 col-md-9 ">

                                    <br>
									<div class="feature-img">
                                    {if $obj->mProduct.image}
										<img class="img-fluid" src="{$obj->mProduct.image}" alt="{$obj->mProduct.name} image">
                                        {/if}
									</div>
                                    

									<a class="posts-title" href="blog-single.html"><h3>{$obj->mProduct.name}</h3></a>
									<p class="excert">
										{$obj->mProduct.description}
									</p>

									

        {if $obj->mLinkToContinueShopping}
            <a class="primary-btn" href="{$obj->mLinkToContinueShopping}">Continue Shopping
            </a>
        {/if}


								</div>
							</div>
						</div>


						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">



                           {* {include file="review.tpl"} *}




                                <div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">View similar products</h4>
									<div class="popular-post-list">

                                    {section name=i loop=$obj->mLocations}
										<div class="single-post-list d-flex flex-row align-items-center">
											
											<div class="details">
                                            {strip}
												<a href="{$obj->mLocations[i].link_to_department}"><h6>{$obj->mLocations[i].department_name}</h6></a>
                                            {/strip}

                                            {strip}
                                            <a href="{$obj->mLocations[i].link_to_category}"><h6>{$obj->mLocations[i].category_name}</h6></a>
                                            
                                            {/strip}
												
											</div>
										</div>
                                    {/section}


										
										
																									
									</div>
								</div>
{if $obj->mRecommendations}
<div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">Customers also bought:</h4>
									<div class="popular-post-list">
{section name=m loop=$obj->mRecommendations}
										<div class="single-post-list d-flex flex-row align-items-center">
											{* <div class="thumb">
												<img class="img-fluid" src="img/blog/pp1.jpg" alt="">
											</div> *}
											<div class="details">
                                                {strip}
												<a href="{$obj->mRecommendations[m].link_to_product}"><h6>{$obj->mRecommendations[m].product_name}</h6></a>
                                                {/strip}
												<p>{$obj->mRecommendations[m].description}</p>
											</div>
										</div>
                                        {/section}
														
									</div>
								</div>
{/if}




								
							</div>
						</div>
					</div>
				</div>	
			</section>