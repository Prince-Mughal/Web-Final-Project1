<?php
/* Server Name  */
	$DB_HOST = "localhost";
/* Account Name */
        $DB_USER = "root";
/* Password */
        $DB_PASS = " ";
/* Database Name */
        $DB_NAME = "Student";
/* Connect to Database */
	$CONNECTION = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
        /* Check Connection */
        if(!$CONNECTION){
           /* Capture Error */
           $errMSG = mysqli_error($CONNECTION);
           /* Display Error */
           echo $errMSG;
           /* Stop Execution */
           die("Try Again...");
        }else{
            /* Connected to Server */
            echo "Connection Established.<br>";}
/* First Name */
	$STD_ID          = $_POST['ID'];
	$Query  = "SELECT * FROM result WHERE ID = '$STD_ID'";

// Execute Query 
        $Result = mysqli_query($CONNECTION,$Query);
        // Check the Query 
        if($Result){
            echo "Successfully Retrieved.<br>";
        }else{
            die("Couldn't Execute Query.<br>");}
        echo "<table border='2' style='border: 1px solid black;'>";
        echo "<tr><th>ID</th><th>Name</th><th>CGPA</th>";
        $NROW = mysqli_num_rows($Result);
        if($NROW == 0){ die("Error: Database is Empty.<br>");}
        
	    $ROW = mysqli_fetch_assoc($Result);
            $LINE  = "<tr><td>".$ROW["ID"]."</td><td>".$ROW["Name"]."</td><td>".$ROW["CGPA"]."</td>"."</tr><br>";
            echo $LINE;
        echo "</table>";

/* Close Connection */
        mysqli_close($CONNECTION);
 ?>
