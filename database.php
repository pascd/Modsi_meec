<?php
        
        $servername = 'ave.dee.isep.ipp.pt'; // or the IP address of your database server
        $username = '1190939'; // replace with your database username
        $password = '1234'; // replace with your database password
        $dbname = '1190939_Vacinacao'; // replace with your database name
        
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