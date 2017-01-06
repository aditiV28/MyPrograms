@echo off
ECHO -------------Welcome to MySQLDUMP World! Powered By SAGAR SHIROYA--------------
echo Please enter the details about your mySQL Database
set /p username="Enter Username:"
set /p password="Enter Password:"
set /p dbname="Enter Database Name:"
set /p location="Full path of filename('./<filename>' for current directory):"


mysqldump  --routines -u %username% -p %password% %dbname% > %location%
echo on



//DELETE FROM locks WHERE time_created < (NOW() - INTERVAL 10 MINUTE)