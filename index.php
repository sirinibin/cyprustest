<?php
require_once("db.php");
require_once("functions.php");

$a=[2,4,1,5,77,3,12,8];

$conn=connectToDb();
if(createUserTable($conn)){
    //The query must return only the values where ‘id’ is within the array above.
    getArrayRecords($conn,$a);

}else {
echo "Table not created";
}


/*
$a=3;
$b=$a++;
print_r($a.$b);

echo "<hr/>";

$a = '1';

$b = &$a;

$b = "2$b";

echo $a.", ".$b;
*/


?>