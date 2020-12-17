{*admin_carts.tpl*}
{load_presentation_object filename="admin_carts" assign="obj"}

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard <small>shopping carts</small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
            {* {include file="admin_departments.tpl"} *}
        <form action="{$obj->mLinkToCartsAdmin}" method="post">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
           Admin Users&#039; shopping carts: 
        </div>
                        <!-- /.panel-heading -->
    <div class="panel-body">
     {if $obj->mMessage}
        <p>{$obj->mMessage}</p>
    {/if}



             
        <div class="well">
           <h4>  Select Cart:</h4>
           <p>

           {html_options class="form-control" name="days" options=$obj->mDaysOptions selected=$obj->mSelectedDaysNumber}
<br>

            <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit_count" value="Count Old Shopping Carts">
            
      
           </p>
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit_delete" value="Delete Old Shopping Carts">
          </div>              <!-- /.table-responsive -->
        </div>
                        <!-- /.panel-body -->
    </div>
                    <!-- /.panel -->
</div>
</form>

            </div>
            
            </div>