

{if $obj->mConfirmatoryListCount > 0 && $obj->mWeeklyPercentagezCount > 0 && $obj->mEachStudentAttTotalCount > 0}
    <form method="post" action="{$obj->mLinkToTeacherPage}"> 
   <div class="col-lg-12">
        <div class="" style="">
        
        
            <div class="" style="">
                <h3><b style="color: green; padding: 20px;"> {$obj->mClass_name} Attendance-Report </b></h3>

                <h4><b style="color: #337ab7; padding: 20px;">
                    Male [{$obj->mMaleClassCount}] 
                        <span>&nbsp;</span>
                    Female[{$obj->mFemaleClassCount}]
                    <span>&nbsp;</span>
                    Total[{$obj->mConfirmatoryListCount}]
                </b></h4>
                
                <p style="padding-left: 20px;">
                    Please not that the report below reflects weekly percentages, attendance totals for each student current member of this class and computations based on previously entered data.
                </p>
            </div>

            <div class="panel-heading">
                <h4>
                    <b style="color: #337ab7;"> 
                        Weekly Percentages for {$obj->mClass_name}
                    </b>  
                </h4>
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
            
        
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Week</th>
                                <th>Date</th>
                                <th>Percentage (%)</th>
                            </tr>
                        </thead>
                        <tbody> 
                        {section name=k loop=$obj->mAllWeeksPercentage}

                            <tr>

                                <td>{$obj->mAllWeeksPercentage[k].week_what}</td>
                                <td>{$obj->mAllWeeksPercentage[k].week_stop}</td>
                                <td> {$obj->mAllWeeksPercentage[k].allpercent} </td>

                            </tr> 

                        {/section}    
                        </tbody>
                    </table> 
                </div>  
                
            <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->

{* This portion below is used for reflecting the attendance totals  *}
        
            <div class="panel-body">
                <h4> <b style="color: #337ab7;">Student's Attendance Totals for {$obj->mClass_name}</b></h4>
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Attendance Totals</th>
                            </tr>
                        </thead>
                        <tbody> 
                        {section name=i loop=$obj->mEachStudentAttTotal}

                            <tr>
                                <td>{$obj->mEachStudentAttTotal[i].firstname}</td>
                                <td>{$obj->mEachStudentAttTotal[i].surname}</td>
                                <td>{$obj->mEachStudentAttTotal[i].eachTotal}</td>
                            </tr> 

                        {/section}    
                        </tbody>
                    </table> 
                </div> 
            </div>
        
        


            <div class="panel-heading" style="padding-bottom: 45px;">
                <a href="{$obj->mLinkToTeacherPage}" class="btn btn-outline btn-danger">Close   </a>
            </div> 
            </div>
        
        <!-- /.panel -->
    </div>
</form>
{else}
    <div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-heading">
                <b style="color: red;">No record found for attendance percentage!</b>
                <a href="{$obj->mLinkToTeacherPage}" class="btn btn-outline btn-primary">Got It</a>
            </div>
        </div>
    </div>
</div>
{/if}