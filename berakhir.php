<?php 
include("config.php");

$result = mysqli_query($con, "SELECT * FROM masa");
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        echo $row['awal_masuk'];
    }
}
?>