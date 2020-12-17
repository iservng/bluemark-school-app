<?php

//Business tier class for shopping cart 
class ShoppingCart 
{
    //Stores the visitor's Cart ID 
    private static $_mCartId;

    //Privatr constructor to prevent direct creation of object 
    private function __construct(){}


    /*This will be call by GetCartId to ensure we have the 
    visitor's cart ID in the visitor's session in case 
    $_mCartId has no value set*/
    public static function SetCartId()
    {
        //If the cart Id has'nt already been set ... 
        if(self::$_mCartId == '')
        {
            //If the visitor's cart ID is in the session, get it from there
            if(isset($_SESSION['cart_id']))
            {
                self::$_mCartId = $_SESSION['cart_id'];
            }
            //If not check whether the card ID was saved as a cookie 
            elseif(isset($_COOKIE['cart_id']))
            {
                //Save the card ID from the cookie 
                self::$_mCartId = $_COOKIE['cart_id'];
                $_SESSION['cart_id'] = self::$_mCartId;

                //Regenarate cookie to be valid for 7 days (604800 seconds)
                setcookie('card_id', self::$_mCartId, time()+604800);

            }
            else 
            {
                /*Generate cart id and save it to the $_mCartId class member,
                the session and a cookie (on subsequent request $_mCartId
                will be populated from the session)*/
                self::$_mCartId = md5(uniqid(rand(), true));

                //Store cart id in session 
                $_SESSION['cart_id'] = self::$_mCartId;

                //Cookie will be valid for 7 days 
                setcookie('cart_id', self::$_mCartId, time()+604800);
            }
        }
    }



    //Returns the current visitor's cart id
    public static function GetCartId()
    {
        //Ensure we have a cart id for the current visitor
        if(!isset(self::$_mCartId))
            self::SetCartId();

        return self::$_mCartId;
    }



    //Adds product to the shopping cart 
    public static function AddProduct($productId, $attributes)
    {
        //Build the sql query 
        $sql = 'CALL shopping_cart_add_product(:cart_id, :product_id, :attributes)';
        //Build the parameter array 
        $params = array(
            ':cart_id' => self::GetCartId(),
            ':product_id' => $productId,
            ':attributes' => $attributes
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);
    }


    //Updates the shopping cart with new product quantity
    public static function Update($itemId, $quantity)
    {
        //Build the SQL query 
        $sql = 'CALL shopping_cart_update(:item_id, :quantity)';
        //Build the parameter array
        $params = array(
            ':item_id' => $itemId,
            ':quantity' => $quantity
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);
    }



    //Remove product from shopping cart 
    public static function RemoveProduct($itemId)
    {
        //Build the SQL query
        $sql = 'CALL shopping_cart_remove_product(:item_id)';
        //Build the parameter array 
        $params = array(
            ':item_id' => $itemId
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);
    }



    //Gets shopping cart products 
    public static function GetCartProducts($cartProductsType)
    {
        $sql = '';
        //If retriving "active" shopping cart products ... 
        if($cartProductsType == GET_CART_PRODUCTS)
        {
            //Build the SQL query
            $sql = 'CALL shopping_cart_get_products(:cart_id)';
        }
        //If retriving poducts saved for later 
        elseif($cartProductsType == GET_CART_SAVED_PRODUCTS)
        {
            //Build the SQL query 
            $sql = 'CALL shopping_cart_get_saved_products(:cart_id)';
        }
        else 
            trigger_error($cartProductsType . ' value unknown', E_USER_ERROR);

        //Build the parameter array 
        $params = array(
            ':cart_id' => self::GetCartId()
        );
        //Execute the query and return the results
        return DatabaseHandler::GetAll($sql, $params);
    }



    /*Gets the total amount of shopping cart products before tax and/or 
    shipping charges (not including the ones that are being saved for later)*/
    public static function GetTotalAmount()
    {
        //Build the SQL query 
        $sql = 'CALL shopping_cart_get_total_amount(:cart_id)';
        //Build the parameter array
        $params = array(
            ':cart_id' => self::GetCartId()
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetOne($sql, $params);
    }


    //Save product for the save for later list 
    public static function SaveProductForLater($itemId)
    {
        //Build the SQL query 
        $sql = 'CALL shopping_cart_save_product_for_later(:item_id)';
        //Build the parameter array 
        $params = array(
            ':item_id' => $itemId
        );
        //Execute the  query 
        DatabaseHandler::Execute($sql, $params);
    }



    //Get products from the saved fro leter list back to the cart
    public static function MoveProductToCart($itemId)
    {
        //Build the SQL query 
        $sql = 'CALL shopping_cart_move_product_to_cart(:item_id)';
        //Build the parameter array
        $params = array(
            ':item_id' => $itemId
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);
    }



    //Counts old shopping carts 
    public static function CountOldShoppingCarts($days)
    {
        //Build the SQL query 
        $sql = 'CALL shopping_cart_count_old_carts(:days)';
        //Build the parameter array 
        $params = array(
            ':days' => $days
        );
        //Execute the query and return the results 
        return DatabaseHandler::GetOne($sql, $params);
    }



    //Delete old shopping carts 
    public static function DeleteOldShoppingCarts($days)
    {
        //Build the SQL query 
        $sql = 'CALL shopping_cart_delete_old_carts(:days)';
        //Build the parameter array 
        $params = array(
            ':days' => $days
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);
    }




    //Create a new order 
    public static function CreateOrder($customerId, $shippingId, $taxId)
    {
        //Build the sql query 
        $sql = 'CALL shopping_cart_create_order(:cart_id, :customer_id, :shipping_id, :tax_id)';
        //Buld the parameter array 
        $params = array(
            ':cart_id' => self::GetCartId(),
            ':customer_id' => $customerId,
            ':shipping_id' => $shippingId,
            ':tax_id' => $taxId
        );
        //Execute the query and return the results 
        return DatabaseHandler::GetOne($sql, $params);
    }



    //Get product recommendstions from the shopping cart
    public static function GetRecommendations()
    {
        //Build the SQL query 
        $sql = 'CALL shopping_cart_get_recommendations(:cart_id, :short_product_description_length)';
        //Build the parameter array 
        $params = array(
            ':cart_id' => self::GetCartId(),
            ':short_product_description_length' => SHORT_PRODUCT_DESCRIPTION_LENGTH
        );
        //Execute the query and return the results 
        return DatabaseHandler::GetAll($sql, $params);
    }
}
?>