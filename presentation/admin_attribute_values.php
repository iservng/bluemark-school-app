<?php

//class that deal with attribute values admin
class AdminAttributeValues
{
    //Publlic variables available in smarty template 
    public $mAttributeValuesCount;
    public $mAttributeValues;
    public $mErrorMessage;
    public $mEditItem;
    public $mAttributeId;
    public $mAttributeName;
    public $mLinkToAttributeAdmin; //get so issues
    // public $mLinkToAttributesAdmin;
    public $mLinkToAttributeValuesAdmin;

    //Private Members
    private $_mAction;
    private $_mActionedAttributeValueId;

    //class constructor
    public function __construct()
    {
        if(isset($_GET['AttributeId']))
            $this->mAttributeId = (int)$_GET['AttributeId'];
        else 
            trigger_error('Attribute id is not set');


        $attribute_details = Catalog::GetAttributeDetails($this->mAttributeId);
        $this->mAttributeName = $attribute_details['name'];

        foreach($_POST as $key => $value)
            //If the submit button is clicked
            if(substr($key, 0, 6) == 'submit')
            {
                /*Get the position of the last '_', underscore from submit
                button  name. eg strtpos('submit_edit_val_1', '_') id 16*/
                $last_underscore = strrpos($key, '_');

                /*Get the scope of submit button
                (eg 'edit_val' from 'submit_edit_1')*/
                $this->_mAction = substr($key, strlen('submit_'), $last_underscore - strlen('Submit_'));

                /*Get the attribute value id targeted by the submit button
                (the number at the end of submit button name)
                eg '1' from 'submit_edit_val_1'*/
                $this->_mActionedAttributeValueId = (int)substr($key, $last_underscore+1);
            break;

            }
        $this->mLinkToAttributesAdmin = Link::ToAttributesAdmin();
        $this->mLinkToAttributeValuesAdmin = Link::ToAttributeValuesAdmin($this->mAttributeId);
    }



    public function init()
    {
        //If adding a new attribute value 
        if($this->_mAction == 'add_val')
        {
            $attribute_value = $_POST['attribute_value'];

            if($attribute_value == null)
                $this->mErrorMessage = 'Attribute value id required';

            if($this->mErrorMessage == null)
            {
                Catalog::AddAttributeValue($this->mAttributeId, $attribute_value);
                header('Location: ' . htmlspecialchars_decode($this->mLinkToAttributeValuesAdmin));
            }
        }


        //If editing an existing attribute value admin ... 
        if($this->_mAction == 'edit_val')
        {
            $this->mEditItem = $this->_mActionedAttributeValueId;
        }


        //If updating an attribute value ... 
        if($this->_mAction == 'update_val')
        {
            $attribute_value = $_POST['value'];
            if($attribute_value == null)
                $this->mErrorMessage = 'Attribute value is required';

            if($this->mErrorMessage == null)
            {
                Catalog::UpdateAttributeValue($this->_mActionedAttributeValueId, $attribute_value);
                header('Location: ' . htmlspecialchars_decode($this->mLinkToAttributeValuesAdmin));
            }
        }



        //If deleting an attribute value 
        if($this->_mAction == 'delete_val')
        {
            $status = Catalog::DeleteAttributeValue($this->_mActionedAttributeValueId);
            if($status < 0)
                $this->mErrorMessage = 'Cannot delete this attribute value' . 'one or more product is using it';
            else 
                header('Location: ' . htmlspecialchars_decode($this->mLinkToAttributeValuesAdmin));
        }


        //Load the list of attribute values 
        $this->mAttributeValues = Catalog::GetAttributeValues($this->mAttributeId);
        $this->mAttributeValuesCount = count($this->mAttributeValues);
    }
}
?>