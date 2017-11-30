# Pizzeria Catania

Interactive webpage of restaurant based od CakePHP 2.9.6
with shopping cart (using AJAX, jQuery)



## Installation

Needed any local server (for example xampp or wamp)
Download or clone repo and put in your localhost direction 
(for example "c:/xampp/htdocs/" default for xampp )

**MySQL configuration 
open your "http://localhost/phpmyadmin/" panel and create new databese by coping and pasting contents of 'salsa.sql' (you can find it in main folder of my project)
change credentials for database in "app/Config/database.php" lines 72-74
default for xampp: 
```
'host' => 'localhost',
'login' => 'root',
'password' => ''
```