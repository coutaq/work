<?php 
namespace work;
require 'database/DB.php';
use work\database\DB;
DB::connect();
if(!DB::$isConnected){
    echo DB::$error;
}
?>
