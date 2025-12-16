@echo off
echo Apache2 is online ...
echo Press Ctrl + C to deactivate Apache2 service
echo Type localhost:8089 with your browser to start accessing SLiMS

httpd\bin\httpd.exe

if errorlevel 255 goto finish
if errorlevel 1 goto error
goto finish

:error
echo.
echo Unable to run Apache2
pause

:finish
