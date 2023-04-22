<?php
        $servername = "localhost"; // or the IP address of your database server
        $username = "id20641139_admin"; // replace with your database username
        $password = "AdminAdmin1!"; // replace with your database password
        $dbname = "id20641139_data_users	"; // replace with your database name
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
?>