{*cart_summary.tpl*}
{load_presentation_object filename="cart_summary" assign="obj"}
{*Start cart summary*}

<li class="menu-has-children"><a href="">Cart</a>
    <ul>
    {if $obj->mEmptyCart}
        <li><a href="">Your cart is empty!</a></li>
    {else}
        {section name=i loop=$obj->mItems} 
            <li><a href="">{$obj->mItems[i].quantity} x {$obj->mItems[i].name} ({$obj->mItems[i].attributes})</a></li>
        {/section}
        <li><a href="" id="updating"></a></li>
        <li><a href=""><b>N {$obj->mTotalAmount}</b></a></li>
        <li><a href="{$obj->mLinkToCartDetails}"><b style="color: blue;">View Details</b></a></li>
    {/if}
        
       
    </ul>
</li>