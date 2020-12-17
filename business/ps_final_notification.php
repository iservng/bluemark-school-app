<?php

class PsFinalNotification 
{
    private $_mProcessor;

    public function Process($processor)
    {
        //Set processor reference 
        $this->_mProcessor = $processor;

        //Audit 
        $processor->CreateAudit('PsFinalNotification started.', 20700);

        //Send mail to customer 
        $processor->MailCustomer(STORE_NAME . ' order dispatched.', $this->GetMailBody());

        //Audit 
        $processor->CreateAudit('Dispatch email sent to customer.', 20702);

        //Update order status
        $processor->UpdateOrderStatus(8);

        //Audit 
        $processor->CreateAudit('PsFinalNotification finished.', 20701);
    }



    private function GetMailBody()
    {
        $body = 'Your order has now been dispatched! ' . ' The following products have been shipped: ';
        $body .= "\n\n";

        $body .= $this->_mProcessor->GetOrderAsString(false);
        $body .= "\n\n";

        $body .= 'Your order have been shipped to:';
        $body .= "\n\n";

        $body .= $this->_mProcessor->GetCustomerAddressAsString();
        $body .= "\n\n";

        $body .= 'Order reference number: ';
        $body .= $this->_mProcessor->mOrderInfo['order_id'];

        $body .= "\n\n";

        $body .= 'Thank you for shopping at ' . STORE_NAME . '!';
        return $body;
    }
    
}
?>