<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from user where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){ 
					
            echo "<h7> Login successful </h7><br><br>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
			
        }  


$sql = "SELECT * FROM contactdata";
$result = $con->query($sql);
echo "<center><h1>Feedbacks</h1></center><br><br>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br><center> Id : ". $row["id"]. " &nbsp &nbsp &nbsp &nbsp Email : ". $row["email"]. " &nbsp &nbsp &nbsp &nbsp Message : " . $row["message"] . "</center><br>";
    }
} else {
    echo "0 results";
}
		
?>  