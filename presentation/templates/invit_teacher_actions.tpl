{* {load_presentation_object filename="invite_options" assign="obj"} *}

<ul class="dropdown-menu pull-right" role="menu" style="padding: 20px;">
    <form action="{$obj->mLinkToTeacherProfile}" method="post">
    <input type="hidden" name="teacher_id" value="{$obj->mTeacher_Id}">
        <li><b>Set Interview Date</b></li>
        {if $obj->mInterviewDateError == 1}
            <li><small style="color: red;">Select an interview date</small></li>
        {/if}
        <li><input type="date" name="inteview_date" required class="form-control"></li><br>



        <li><b>Set Interview Time</b></li>
        {if $obj->mInterviewTimeError == 1}
            <li><small style="color: red;">Set an interview time</small></li>
        {/if}
        <li><input type="time" name="inteview_time" required class="form-control"></li>
        
        <li class="divider"></li>
        
        <li><input type="submit" name="inviteTeacher" value="SeT Interview" class="btn btn-success"></li>
    </form>
</ul>