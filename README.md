# HOW TO INSTALL LOCALLY
-- 
## Install a WAMP/LAMP


laragon-> https://github.com/leokhoa/laragon/releases/download/6.0.0/laragon-wamp.exe
wampserver-> https://www.wampserver.com/en/#wampserver-64-bits-php-5-6-25-php-7

Linux-> `sudo tasksel install lamp-server`

## Setup 

1- Download the 'main' branch from https://github.com/Kosmik56/php-blog (<>Code -> Local -> Dowload ZIP).

2- Unzip the archive into the 'www' folder in the WAMP/LAMP server 

3- Launch the server. Type 'localhost' or '127.0.0.1' or '127.0.0.1:8080' in your navigation bar on your web broswer to test if this worked. 

3.a- Linux-> `sudo apt install phpmyadmin`

4- open PHPMyAdmin in web browser (localhost/phpmyadmin). Create an account called "blog" with no password. 

5- Import the blog.sql SQL file as the user 'blog'.

5- Run the app.