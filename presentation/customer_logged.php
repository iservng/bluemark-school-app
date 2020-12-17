<?php

class CustomerLogged
{
    //Public attributes 
    public $mCustomerName;
    public $mCreditCardAction = 'Add';
    public $mAddressAction = 'Add';
    public $mLinkToAccountDetails;
    public $mLinkToCreditCardDetails;
    public $mLinkToAddressDetails;
    public $mLinkToLogout;
    public $mSelectedMenuItem;

    //class constructor trtrt
    public function __construct()
    {

        $this->mLinkToAccountDetails = Link::ToAccountDetails();
        $this->mLinkToCreditCardDetails = Link::ToCreditCardDetails();
        $this->mLinkToAddressDetails = Link::ToAddressDetails();
        $this->mMyProfilePage = Link::ToStudentProfile();


        $this->mLinkToLogout = Link::Build('index.php?Logout');

        if(isset($_GET['AccountDetails']))
            $this->mSelectedMenuItem = 'account';
        elseif(isset($_GET['CreditCardDetails']))
            $this->mSelectedMenuItem = 'credit-card';
        elseif(isset($_GET['AddressDetails']))
            $this->mSelectedMenuItem = 'address';
        elseif(isset($_GET['MyProfile']))
            $this->mSelectedMenuItem = 'my-profile';
    }


    public function init()
    {
        if(isset($_GET['Logout']))
        {
            Customer::Logout();
            header('Location: ' . Link::Build('index.php'));
            exit();
        }

        $customer_data = Customer::Get();
        $this->mCustomerName = $customer_data['name'];

        if(!(empty($customer_data['crdit_card'])))
            $this->mCreditCardAction = 'Change';

        if(!(empty($customer_data['address_1'])))
            $this->mAddressAction = 'Change';
    }

}
?>