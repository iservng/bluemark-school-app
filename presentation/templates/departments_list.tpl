{*departments_list.tpl*}
{load_presentation_object filename="departments_list" assign="obj"}
{* Start department list *}


  {*Loop through the list of departments*}
  {section name=i loop=$obj->mDepartments}
            {* {assign var=selected value=""} *}
            {*Verify if the department is selected to decide what CSS style to to use*}
            {* {if ($obj->mSelectedDepartment == $obj->mDepartments[i].department_id)}
              {assign var=selected value="class=\"selected\""}
            {/if} *}
    <li>
              {*Generate a link for a new department in the list*}
      <a href="{$obj->mDepartments[i].link_to_department}">
                {$obj->mDepartments[i].name}
              </a>
    </li>
  {/section}
 
