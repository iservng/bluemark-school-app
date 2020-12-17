<?php 

//The class that redirect to section registration form
class SelectSection 
{
    //Public properties 
    public $mLinkToPrimaryForm;
    public $mLinkToSecondaryForm;
    public $mLinkToNurseryForm;
    public $mSiteUrl;

    public $mSelectedSection;
    public $mShowPrimaryCertificateField;

    public function __construct()
    {
        $this->mSiteUrl = Link::Build('');

        if(!isset($_SESSION['pin_on_valid']) || !isset($_SESSION['pin_onyeka_valid']) || $_SESSION['pin_on_valid'] == false || $_SESSION['pin_onyeka_valid'] != 1)
        {
            $this->mSiteUrl = Link::Build('');
            header('Location: ' . $this->mSiteUrl);
            exit();
        }
        else 
        {
            $_SESSION['show_onyeka_form'] = true;
            $this->mLinkToPrimaryForm = Link::ToPrimaryForm();
            $this->mLinkToSecondaryForm = Link::ToSecondaryForm();
            $this->mLinkToNurseryForm = Link::ToNurseryForm();
        
        

        if(isset($_SESSION['link_to_store_front']))
            $this->mLinkToStoreFront = $_SESSION['link_to_store_front'];
        else 
            $this->mLinkToStoreFront = Link::ToIndex();

        $this->mLinkToLogout = Link::ToLogout();

        }

        
    }


}
?>