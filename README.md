# coffee-shop-laravel

Server Requirements
•	PHP >= 7.2.0
•	MySQLi

Project Installation & Configuration
Steps:
•	Create New AWS Ubuntu/Linux 2 instance.
•	Connect Instance from putty using SSH.
•	Install Apache/Nginx, MySQL server and client.
•	Clone the git repo to server root path. And configure virtual host in Apache/Nginx.
•	Connect MySQL user using command 
	mysql -u root -p
•	Create new database from putty.
CREATE DATABASE databasename;
•	Import database from db folder located in project root folder.
mysql -u root -h hostname DBNAME < coffee_shop.sql
•	Configure Database credential and host detail in .env file in root folder.

Browse the configured virtual host domain in your browser!!!
**Note: Fix any permission issues in file

# Find a postman collection file in postman_collection folder in project root folder.
