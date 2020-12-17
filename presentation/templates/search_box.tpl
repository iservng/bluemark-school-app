{*search_box.tpl*}
{load_presentation_object filename="search_box" assign="obj"}
{*Start search box*}
 <div class="" id="mc_embed_signup">
    <form action="{$obj->mLinkToSearch}" method="post">
        <div class="input-group">

        <input type="text" 
        class="form-control" 
        name="search_string" 
        placeholder="Enter your search" 
        onfocus="this.placeholder = ''" 
        onblur="this.placeholder = 'Enter your search '" 
        required="" 
        maxlength="100" id="search_string" 
        value="{$obj->mSearchString}" 
        maxlength="100">

        <div class="input-group-btn">
        <button class="btn btn-default" type="submit">
            <span class="lnr lnr-arrow-right"></span>
        </button>
        </div>
        <p><br>
        <input type="checkbox" id="all_words" name="all_words" {if $obj->mAllWords == "on"} checked="checked" {/if}>
            Search for all words
        </p>
        
        {* <div class="info"></div> *}
        </div>
    </form>
                
</div>