
{load_presentation_object filename="admin_menu" assign="obj"}
<li>
                            <a href="{$obj->mLinkToStoreAdmin}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{$obj->mLinkToAttributesAdmin}"><i class="fa fa-dashboard fa-fw"></i> Product Attributes</a>
                        </li>
                        <li>
                            <a href="{$obj->mLinkToCartsAdmin}"><i class="fa fa-dashboard fa-fw"></i> Carts</a>
                        </li>
                        <li>
                            <a href="{$obj->mLinkToOrdersAdmin}"><i class="fa fa-dashboard fa-fw"></i> Orders</a>
                        </li>
                        <li>
                            <a href="{$obj->mLinkToStoreFront}"><i class="fa fa-dashboard fa-fw"></i> Front Page</a>
                        </li>

                        <li>
                            <a href="{$obj->mLinkToListStaffAndSettings}"><i class="fa fa-dashboard fa-fw"></i>List Staff</a>
                        </li>


                        <li>
                            <a href="{$obj->mLinkToAdminSettings}"><i class="fa fa-dashboard fa-fw"></i> Settings</a>
                        </li>
                        <li>
                            <a href="{$obj->mLinkToLogout}"><i class="fa fa-dashboard fa-fw"></i> Logout</a>
                        </li>
