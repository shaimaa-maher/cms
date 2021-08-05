<?php
//the data of connection is saved in array to be securied.
$db['db_host']= "localhost";
$db['db_user']= "root";
$db['db_pass']= "";
$db['db_name']= "cms";

foreach ($db as $key => $value) {
    //we use define to make the data sotre in as constant(uppercase). 
   define(strtoupper($key),$value);
}
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(!$connection){
echo "connection error";
}