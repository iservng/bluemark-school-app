
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            {include file="admin_all_record.tpl"}
            <!-- /.row -->
            <div class="row">
                {include file="primary_applicant_table.tpl"}
                <!-- /.col-lg-6 -->
                {include file="nursery_applicant_table.tpl"}
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            <div class="row">
                {include file="secondary_applicant_table.tpl"}
                <!-- /.col-lg-6 -->
                {include file="teacher_applicant_table.tpl"}
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            <div class="row">
            {include file="admin_departments.tpl"}
            </div>
            
            </div>