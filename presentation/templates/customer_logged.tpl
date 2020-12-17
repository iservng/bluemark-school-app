{*customer_logged.tpl*}
{load_presentation_object filename="customer_logged" assign="obj"}
{* jjjj *}
<li class="menu-has-children"><a href="">{$obj->mCustomerName}</a>
    <ul>
        <li>
            <a {if $obj->mSelectedMenuItem eq 'profile'} class="selected" {/if} href="{$obj->mMyProfilePage}">Profile</a>
        </li>
    
        <li>
            <a {if $obj->mSelectedMenuItem eq 'account'} class="selected" {/if} href="{$obj->mLinkToAccountDetails}">Change Account</a>
        </li>
        <li>
            <a {if $obj->mSelectedMenuItem eq 'credit-card'} class="selected" {/if} href="{$obj->mLinkToCreditCardDetails}"> 
                {$obj->mCreditCardAction} CC Details 
            </a>
        </li>
        <li> 
            <a {if $obj->mSelectedMenuItem eq 'address'} class="selected" {/if} href="{$obj->mLinkToAddressDetails}">
                {$obj->mAddressAction} Address 
            </a>
        </li>
        <li>
            <a href="{$obj->mLinkToLogout}">Logout</a>
        </li>
    </ul>
</li>