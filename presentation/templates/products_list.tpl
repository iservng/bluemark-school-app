{*products_list.tpl*}
{load_presentation_object filename="products_list" assign="obj"}






{if $obj->mProducts}
  {section name=k loop=$obj->mProducts}
            <div class="single-popular-carusel">

            {if $obj->mProducts[k].thumbnail neq ""}
              <div class="thumb-wrap relative">
                <div class="thumb relative">
                  <div class="overlay overlay-bg"></div>
                  <img class="img-fluid" src="{$obj->mProducts[k].thumbnail}" alt="{$obj->mProducts[k].name}">
                </div>
                <div class="meta d-flex justify-content-between">
                  <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>

                  {if $obj->mProducts[k].discounted_price != 0}
                  <h4>N{$obj->mProducts[k].discounted_price}</h4>
                  {else}
                  <h4>N{$obj->mProducts[k].price}</h4>
                  {/if}

                </div>
              </div>
              {/if}

              <div class="details">
                <a href="{$obj->mProducts[k].link_to_product}">
                  <h4>
                    {$obj->mProducts[k].name}
                  </h4>
                </a>
                <p>
                  {$obj->mProducts[k].description}
                </p>

                <p>
                {*The Add to Cart form*}
                <form class="add-product-form" target="_self" method="post" action="{$obj->mProducts[k].link_to_add_product}" onclick="return addProductToCart(this);">

                {*Generate the list of attributes values *}
                  <p>
                    {*Parse the list of attributes and attributes values*}
                      {section name=l loop=$obj->mProducts[k].attributes}

                    {*Genarate a new select tag?*}
                    {if $smarty.section.l.first || $obj->mProducts[k].attributes[l].attribute_name !== $obj->mProducts[k].attributes[l.index_prev].attribute_name}
<div class="form-select">
                    {$obj->mProducts[k].attributes[l].attribute_name}:
                      <select name="attr_{$obj->mProducts[k].attributes[l].attribute_name}">
                    {/if}

                    {*Genarate new option tag*}
                      <option value="{$obj->mProducts[k].attributes[l].attribute_value}">
                        {$obj->mProducts[k].attributes[l].attribute_value}
                      </option>

                    {*Close the select tag*}
                    {if $smarty.section.l.last || $obj->mProducts[k].attributes[l].attribute_name !== $obj->mProducts[k].attributes[l.index_next].attribute_name}
                      </select>
                    {/if}
</div>
                    {/section}
                    </p>

                    {*Add the submit button and close the form*}
                    <p>
                      <input class="genric-btn success small" type="submit" name="add_to_cart" value="Add to Cart">
                    </p>
                </form>
                </p>

                <p>
                {*Show edit button for administrators*}
                {if $obj->mShowEditButton}
                <form action="{$obj->mEditActionTarget}" target="_self" method="post" class="edit-form">
                  <input type="hidden" name="product_id" value="{$obj->mProducts[k].product_id}">
                  <input type="submit" name="submit" value="Edit Product Details">
                </form>
                {/if}
                </p>



                {*end of single*}
              </div>
            </div>
  {/section}
{/if}



