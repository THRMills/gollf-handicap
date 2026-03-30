<?php
    #create varialbes with server details on
    $servername="localhost";
    $username="root";
    $password="password";
    # connects with SQL server 
    $conn=new PDO("mysql:host=$servername",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    #creates a database
    $sql="CREATE DATABASE IF NOT EXISTS golfhandicap";
    $conn->exec($sql);

    #selects the databse to add to 
    $sql="USE golfhandicap";
    $conn->exec($sql);

    echo("database created"); #testing if the database has been created 

    # adding all of the variables in the player info page. 
    $stmt1= $conn->prepare("DROP TABLE IF EXISTS PlayerInfo; 
    CREATE TABLE PlayerInfo
    (PlayerID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(20) NOT NULL,
    LastName VARCHAR(20) NOT NULL,
    Handicap DECIMAL(3,1) NOT NULL,
    Telephone VARCHAR(15) NOT NULL,
    Email VARCHAR(255) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    HomeCourse VARCHAR(100) NOT NULL,
    Address1 VARCHAR(150) NOT NULL,
    Address2 VARCHAR(150) NOT NULL,
    City VARCHAR(100) NOT NULL,
    Postcode VARCHAR(10) NOT NULL,
    Manager BOOLEAN NOT NULL DEFAULT FALSE) 


    ");
    $stmt1->execute();
    echo("player info table created"); # checks if the table has been created correctly 

    # create the CourseInfo table
    $stmt2 = $conn->prepare("DROP TABLE IF EXISTS CourseInfo;
    CREATE TABLE CourseInfo
    (
        CourseID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        CourseName VARCHAR(50) NOT NULL,
        CourseLocation VARCHAR(50) NOT NULL,
        SlopeIndex INT(3) NOT NULL,
        ParTotal INT(2) NOT NULL,
        ParRed INT(2) NOT NULL,
        ParYellow INT(2) NOT NULL,
        ParWhite INT(2) NOT NULL,
        Manager BOOLEAN NOT NULL DEFAULT FALSE
    )");
    $stmt2->execute();

    echo("course info table created"); #same fucntion as one above 
?>
    