<?php 
class StaffLinks 
{
    public $mLinkToCheckEmploymentStatus;
    public $mLinkToLoginLink;
    public $mLinkToUploadCredentials;

    //some private

    //class construct 
    public function __construct()
    {
        $this->mLinkToCheckEmploymentStatus = Link::ToCheckEmploymentStatus();
        $this->mLinkToLoginLink = Link::ToStaffLoginPage();
        $this->mLinkToUploadCredentials = Link::ToUploadCredentials();
    }

}
?>