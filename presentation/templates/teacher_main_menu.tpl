 {* {load_presentation_object filename="teacher_menu" assign="obj"} *}
 <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href=""><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>



                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i>Lesson Plan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                {section name=i loop=$obj->mAssignedClasses}
                                    <li>
                                        <a href="{$obj->mAssignedClasses[i].class_id}">{$obj->mAssignedClasses[i].class_name} <span class="fa arrow"></span> </a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#mylessonplan_{$obj->mAssignedClasses[i].class_id}">Write Lesson Plan</a>
                                            </li>

                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#myViewlessonplan_{$obj->mAssignedClasses[i].class_id}"> View Lesson Note</a>
                                            </li>

                                        </ul>
                                    </li>
                                {/section}
                            
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>





                        {* <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li> *}









                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> My Class<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            
                                {section name=j loop=$obj->mAssignedClasses}
                                <li>
                                    <a href="{$obj->mAssignedClasses[j].class_id}"> {$obj->mAssignedClasses[j].class_name} <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myAddStudentModal_{$obj->mAssignedClasses[j].class_id}">Add Student</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myDeleteStudentModal_{$obj->mAssignedClasses[j].class_name}">
                                                Delete Student
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myAddSubjectModal_{$obj->mAssignedClasses[j].class_id}">
                                                Add Subject
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{$obj->mAssignedClasses[j].list_out_link}">
                                                Show Subjects
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{$obj->mAssignedClasses[j].list_out_members}">Take Attendance</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myAddFirstCAModal_{$obj->mAssignedClasses[j].class_id}">
                                                Record First CA
                                            </a>
                                            
                                        </li>
                                        <li>
                                        
                                            <a href="#" data-toggle="modal" data-target="#myAddSecondCAModal_{$obj->mAssignedClasses[j].class_id}">
                                                Record Second CA
                                            </a>
                                        </li>
                                        <li>
                                        
                                            <a href="#" data-toggle="modal" data-target="#myAddThirdCAModal_{$obj->mAssignedClasses[j].class_id}">
                                                Record Third CA
                                            </a>
                                        </li>
                                        <li>
                                            {* <a href="#">Record Exam Score</a> *}
                                            <a href="#" data-toggle="modal" data-target="#myAddExamsCAModal_{$obj->mAssignedClasses[j].class_id}">
                                                Record Exam Score
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                {/section}
{*THE END OF MODAL*}
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>




















                        
                        {* <li class="active">
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="active" href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li> *}
                    </ul>
                </div>