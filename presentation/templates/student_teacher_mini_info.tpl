
 <form method="post" action="{$obj->mLinkToTeacherPage}"> 
   <div class="col-lg-12">
        <div class="" style="">
        {if $obj->mConfirmatoryListCount > 0}
            <div class="" style="">
                <h3><b style="color: #337ab7;">{$obj->mStudentName}</b></h3>
                
                <p style="">Teacher's student profile information</p>
            </div>

            <div class="panel-heading">
                <h4>
                    <b style="color: #337ab7;"> 
                   
                    </b>  
                </h4>
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
        
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                
                                <th><b style="color: #337ab7;">Passport</b></th>
                                <th><b style="color: #337ab7;">Bio-Data</b></th>

                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                
                                <td>
                                    <div style="width: 100px; height: 120px; border: 1px solid #ccc; box-shadow: 2px 2px 12px 0px #333;" >
                                        <img src="{$obj->mPassportUrl}" style="width: 100%; height: 100%;">
                                    </div>
                                </td>
                                <td>
                                    <b>First Name:</b> {$obj->mStudentsDetails['firstname']}<br>
                                    <b>Date of Birth:</b> {$obj->mStudentsDetails['dob']}<br>
                                    <b>Surname:</b> {$obj->mStudentsDetails['surname']}<br>
                                    <b>Middle Name:</b> {$obj->mOthername}<br>
                                    <b>Gender:</b> {$obj->mGender}<br>

                                    <b>Email:</b> {$obj->mStudentsDetails['email']}<br>
                                    <b>Reg Number:</b> {$obj->mStudentsDetails['reg_number']}<br>
                                    <b>Address 1:</b> {$obj->mStudentsDetails['f_address']}<br>
                                    <b>Address 2:</b> {$obj->mStudentsDetails['m_address']}
                                    <br><br>
                                    <h4>
                                        <b style="color: #337ab7;"> 
                                            Class 
                                        </b>
                                        
                                    </h4>
                                    <hr>
                                    <b>Admitted Class:</b> {$obj->mClassName_admited['class_name']}<br>
                                    <b>Current Class:</b> {$obj->mClassName_admited['class_name']}<br>

                                    <br>
                                    <h4>
                                        <b style="color: #337ab7;"> 
                                            Parent 
                                        </b>

                                    </h4>
                                    <hr>
                                    <b>Father Name:</b> {$obj->mStudentsDetails['f_fname']}     {$obj->mStudentsDetails['f_lname']}<br>
                                    <b>Mother Name:</b> {$obj->mStudentsDetails['m_fname']} {$obj->mStudentsDetails['m_lname']}<br>
                                    
                                    <b>Mother Phone:</b> {$obj->mStudentsDetails['m_phone']} <br>
                                    <b>Address 1:</b> {$obj->mStudentsDetails['f_address']}<br>
                                </td>
                           
                                
                            </tr> 
   
                        </tbody>
                    </table> 
                </div>  
                
            <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body mShowAttendanceReportBtn-->

            <div class="panel-heading" style="padding-bottom: 60px;">
                <a href="{$obj->mLinkToTeacherPage}" class="btn btn-outline btn-danger">Close</a>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    
                    

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    


                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                   
                    
                    
            </div> 
            {else}

            <div class="panel-heading">
                <div class="panel-heading">
                    <b style="color: red;">No record found for attendance taking!</b>
                </div>
            </div>

            {/if}
        </div>
        <!-- /.panel -->
    </div>
</form> 