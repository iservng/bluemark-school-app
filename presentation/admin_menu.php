<?php
class AdminMenu
{
    public $mLinkToStoreAdmin;
    public $mLinkToStoreFront;
    public $mLinkToCartsAdmin;
    public $mLinkToOrdersAdmin;
    public $mLinkToLogout;
    public $mLinkToAttributesAdmin;

    public function __construct()
    {
        $this->mLinkToStoreAdmin = Link::ToAdmin();
        $this->mLinkToAttributesAdmin = Link::ToAttributesAdmin();
        $this->mLinkToStoreFront = Link::ToIndex();
        $this->mLinkToCartsAdmin = Link::ToCartsAdmin();
        $this->mLinkToOrdersAdmin = Link::ToOrdersAdmin();
        $this->mLinkToAdminSettings = Link::ToAdminSetting();
        $this->mLinkToListStaffAndSettings = Link::ToListStaffAndSetting();

        if(isset($_SESSION['link_to_store_front']))
            $this->mLinkToStoreFront = $_SESSION['link_to_store_front'];
        else 
            $this->mLinkToStoreFront = Link::ToIndex();

        $this->mLinkToLogout = Link::ToLogout();
    }
}
?>