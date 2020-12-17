
{load_presentation_object filename="store_admin" assign="obj"}
{include file="admin_head_tag.tpl"}

<body>

    <div id="wrapper">
        {include file=$obj->mMenuCell}

        {include file=$obj->mContentCell}
    </div>
      
    
    <!-- /#wrapper 8-->
   {include file="admin_js.tpl"}

</body>

</html>
