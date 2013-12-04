<?php
class Connection{
	private static $dbhost="localhost";
	private static $dbuser="root";
	private static $dbpass="autocad";
	private static $dbname="dbatendimento";
	private static $connection=null;
    
    
    public static function get_connection(){    
        if(!self::$connection) 
        	self::$connection=new mysqli(self::$dbhost,self::$dbuser,self::$dbpass,self::$dbname);
        
        if (self::$connection->connect_errno) {
            echo "Failed to connect to MySQL: (" . self::$connection->connect_errno . ") " . self::$connection->connect_error;
        }        
        return self::$connection;
    }

    public static function close_connection(){    
        if(self::$connection!=null){
    		self::$connection->close;
    		self::$connection=null;
        }
    }
}
?>