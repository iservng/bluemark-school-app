<?php

//Class that support the checkout page
class CheckoutInfo
{
    //Public attributes
    public $mCartItems;
    public $mTotalAmount;
    public $mCreditCardNote;
    public $mOrderButtonVisible;
    public $mNoShippingAddress = 'no';
    public $mNoCreditCard = 'no';
    public $mPlainCreditCard;
    public $mShippingRegion;
    public $mShippingInfo;

    public $mLinkToCheckout;
    public $mLinkToContinueShopping;
    public $mLinkToCart;

    //class construct 
    public function __construct()
    {
        $this->mLinkToCheckout = Link::ToCheckout();
        $this->mLinkToCart = Link::ToCart();
        $this->mLinkToContinueShopping = $_SESSION['link_to_last_page_loaded'];
    }

    public function init()
    {
        //Set members  for use in the smarty template 
        $this->mCartItems = ShoppingCart::GetCartProducts(GET_CART_PRODUCTS);
        $this->mTotalAmount = ShoppingCart::GetTotalAmount();
        $this->mCustomerData = Customer::Get();

        //If the "place_order" button was clicked 
        if(isset($_POST['place_order']))
        {
            $this->mCustomerData = Customer::Get();
            $tax_id = '';

            switch ($this->mCustomerData['shipping_region_id']) {
                case 2:
                    $tax_id = 1;
                    break;
                
                default:
                    $tax_id = 2;
                    break;
            }


            //Create the order and get the order ID
            $order_id = ShoppingCart::CreateOrder($this->mCustomerData['customer_id'], (int)$_POST['shipping'], $tax_id);

            //On success head to an order successfull page 
            $redirect_to = Link::ToOrderDone();

            //Create new OrderProcessor instance
            $processor = new OrderProcessor($order_id);

            try 
            {
                $processor->Process();
            } 
            catch (Exception $e) 
            {
                //If an error occures, head to an error page
                $redirect_to = Link::ToOrderError();

            }

            //Redirect to the order processing result page
            header('Location: ' . $redirect_to);
            exit();

        }


        //We allow placing order only if we have complete customer details
        if(empty($this->mCustomerData['credit_card']))
        {
            $this->mOrderButtonVisible = 'disabled="disabled"';
            $this->mNoCreditCard = 'yes';
        }
        else 
        {
            $this->mPlainCreditCard = Customer::DecryptCreditCard($this->mCustomerData['credit_card']);

            $this->mCreditCardNote = 'Credit card to use: ' . 
                                    $this->mPlainCreditCard['card_type'] . 
                                    '<br>Card number: ' . 
                                    $this->mPlainCreditCard['card_number_x'];
        }

        if(empty($this->mCustomerData['address_1']))
        {
            $this->mOrderButtonVisible = 'disabled="disabled"';
            $this->mNoShippingAddress = 'yes';
        }
        else 
        {
            $shipping_regions = Customer::GetShippingRegions();

            foreach($shipping_regions as $item)
                if($item['shipping_region_id'] == $this->mCustomerData['shipping_region_id'])
                    $this->mShippingRegion = $item['shipping_region'];

            if($this->mNoCreditCard == 'no' && $this->mNoShippingAddress == 'no')
            {
                $this->mShippingInfo = Orders::GetShippingInfo($this->mCustomerData['shipping_region_id']);
            }
        }
    }
}
?>