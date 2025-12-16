@echo off
echo MariaDB/MySQL is online ...
echo Press Ctrl + C to deactivate MariaDB/MySQL service
echo Port being used is 3404

mariadb\bin\mysqld.exe --datadir=data --console

if errorlevel 255 goto finish
if errorlevel 1 goto error
goto finish

:error
echo.
echo Unable to run MariaDB/MySQL
pause

:finish