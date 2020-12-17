<?php
//Class providing generic data acces functionality
class DatabaseHandler
{
    //Hold an instance of the PDO class
    private static $_mHandler;

    //Private constuctor to prevent direct creation of objects
    private function __construct(){}

    //Return an initialized database handler 
    private static function GetHandler()
    {
        if(!isset(self::$_mHandler))
        {
            try {
                //Create a new PDO class instance 
                self::$_mHandler = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_PERSISTENT => DB_PERSISTENCY));

                //Configure PDO to throw exceptions
                self::$_mHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                //Close the database handler and trigger an error
                self::Close();
                trigger_error($e->getMessage(), E_USER_ERROR);
            }
        }
        //Return the database handler 
        return self::$_mHandler;
    }

    //Clear the PDO class instance 
    public static function Close()
    {
        self::$_mHandler = null;
    }

    //Wrapper function to the PDOStatement::execute()
    public static function Execute($sqlQuery, $params = null)
    {
        //Try to execute and sql query or a stored procedure
        try {
            //Get the database handler 
            $database_handler = self::GetHandler();
            //Prepare the SQL query
            $statement_handler = $database_handler->prepare($sqlQuery);
            //Execute query
            $statement_handler->execute($params);
        } catch (PDOException $e) {
            //Close the database handler and trigger an error
            self::Close();
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
    }


    //Wrapper method for the PDOStatement::fetchAll()
    public static function GetAll($sqlQuery, $params = null, $fetchStyle = PDO::FETCH_ASSOC) 
    {
        //Initialize the return value to null
        $results = null;
        //Try to execute an sql query or a stored procedure
        try {
            //Get the database handler 
            $database_handler = self::GetHandler();
            //Prepare sql
            $statement_handler = $database_handler->prepare($sqlQuery);
            //Execute the sql 
            $statement_handler->execute($params);
            //Fetch results
            $results = $statement_handler->fetchAll($fetchStyle);
        } catch (PDOException $e) {
            //close the database handler and trigger and error
            self::Close();
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
        //Return the query results
        return $results;
    }


    //Wrapper method for the PDOStatement::fetch()
    public static function GetRow($sqlQuery, $params = null, $fetchStyle = PDO::FETCH_ASSOC)
    {
        //Initialize the return valu to null 
        $result = null;
        //Try to execute an sql query or a stored procedure
        try {
            //Get the database handler
            $database_handler = self::GetHandler();
            //Prepare the query for execution
            $statement_handler = $database_handler->prepare($sqlQuery);
            //Execute the query 
            $statement_handler->execute($params);
            //Fetch result
            $result = $statement_handler->fetch($fetchStyle);
        } catch (PDOException $e) {
            //Close the database handler and trigger an error
            self::Close();
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
        //Return results
        return $result;
    }



    //Return the first column value from a row 
    public static function GetOne($sqlQuery, $params = null)
    {
        //Initialize the return value to null
        $result = null;
        //Try to execute an sql query or a stord procedure
        try {
            //Get the database handler 
            $database_handler = self::GetHandler();
            //prepare the sql query for execution
            $statement_handler = $database_handler->prepare($sqlQuery);
            //Execute the query
            $statement_handler->execute($params);
            //Fetch result 
            $result = $statement_handler->fetch(PDO::FETCH_NUM);
            /*Save the first value of the result set(first column of the first row) to $result
            */
            $result = $result[0];
        } catch (PDOException $e) {
            //close the database handler and trigger an error
            self::Close();
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
        //Return the result 
        return $result;
    }


}
 ?>
