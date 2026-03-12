<?php
    #create varialbes with server details on
    $servername="localhost";
    $username="root";
    $password="password";

    $conn=new PDO("mysql:host=$servername",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="CREATE DATABASE IF NOT EXISTS golfhandicap";
    $conn->exec($sql);
    $sql="USE golfhandicap";
    $conn->exec($sql);
    echo("database created");

    $stmt1= $conn->prepare("DROP TABLE IF EXISTS PlayerInfo;
    CREATE TABLE PlayerInfo
    (PlayerID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(20) NOT NULL,
    LastName VARCHAR(20) NOT NULL);
    ");
    $stmt1->execute();
    echo("player info table created");
 ?>