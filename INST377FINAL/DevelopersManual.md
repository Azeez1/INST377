DEVELOPER'S MANUAL 


This will briefly explain each file and the purpose of its functionality to the overall NBA fantasy draft and league helper. 

NBADATAAPI.php
Grabs all the data from api and sends data to NBATable.php and         insertnbadatabase.php to be stored.

NBADisplay.html  
This file grabs the data from the user and sends to from the user input information. 

NBATable.php
This generates player statistics table and recommends best player. 
insertnbadatabase.php
This file connects to the sql database on server and inserts the data from the api to sql database for reference. 

Nbasql.sql 
This creates the sql database tables intended to store the player statistics after the user submits. 
Code for grabbing API 




