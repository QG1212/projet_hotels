<?php
  // Database constants.
  define('DB_USER', 'dev');
  define('DB_PASSWORD', 'isen');
  define('DB_NAME', 'projet_hotel');
  define('DB_SERVER', 'localhost');
  define('DB_PORT', '5432');
//----------------------------------------------------------------------------
//--- dbConnect --------------------------------------------------------------
//----------------------------------------------------------------------------
// Create the connection to the database.
// \return False on error and the database otherwise.
function dbConnect()
{
    try
    {
        $db = new PDO('pgsql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $exception)
    {
        error_log('Connection error: '.$exception->getMessage());
        return false;
    }
    return $db;
}
?>