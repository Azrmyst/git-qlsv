<?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "baitaplon";
                $id = (isset($_GET['MaNganh']))?$_GET['MaNganh']:0;
                
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
                //echo "Connected successfully";        
?>
