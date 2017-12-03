# Pizzeria Catania

Interactive webpage of restaurant based od CakePHP 2.9.6
with shopping cart (using AJAX, jQuery)

## Subpages

*	MAIN PAGE with full screen carousel (written in JS)
*	MENU with shopping cart (using AJAX, jQuery, Session); a few tables with items for menu stored in MySQL database
*	OPINIONS – you can add your opinion about restaurant and choose rate 1-5 or read users’ opinions (stored in database)
*	CONTACT -  ‘iframe’ with  google maps and street view
*	GALLERY – JS modal-slider

## Installation


Needed any local server (for example xampp or wamp).  
Download or clone repo and put in your localhost direction 
(for example `c:/xampp/htdocs/` default for xampp )


**MySQL configuration**   

Open your "http://localhost/phpmyadmin/" panel and create new databese by coping and pasting contents of `salsa.sql` (you can find it in main folder of my project)
change credentials for database in ```app/Config/database.php``` lines 72-74

default for xampp: 
```
'host' => 'localhost',
'login' => 'root',
'password' => ''
```