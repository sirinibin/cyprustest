<?php
function createUserTable($conn)
{

    $query = "CREATE TABLE IF NOT EXISTS `user` (
   `id` int(11)  AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `status` int(11) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";


    if ($conn->query($query) === TRUE) {

        $insert_queries="INSERT INTO `cyprus`.`user` (`id`, `status`, `age`) VALUES (NULL, '1', '23'), (NULL, '0', '45'), (NULL, '1', '17'), (NULL, '1', '20'), (NULL, '0', '30');";
        $conn->query($insert_queries);

        return true;
    } else {
        echo "Error creating table: " . $conn->error;
        exit;
       // return false;
    }


}
function getArrayRecords($conn,$array){

    $query="select *,(select avg(age) from user) as average_age from user where id in (".implode(",",$array).")";

    $result=$conn->query($query);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Status: " . $row["status"]. ", Age:" . $row["age"]. ",Avg age:" . $row["average_age"]."<br>";
        }
    } else {
        echo "0 results";
    }
}