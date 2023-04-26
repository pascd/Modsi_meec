<?php
        
        $servername = 'localhost'; // or the IP address of your database server
        $username = 'root'; // replace with your database username
        $password = ''; // replace with your database password
        $dbname = 'vacinacao'; // replace with your database name
        
        
        // Create connection
        $db = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        //echo "Connected successfully";
        

        /*
        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        */
?>