
Install
=======

1-download compress file
2-extract sfhati folder to root host server 
3-create mysql database
4-upload sfhati.sql by import in phpmyadmin 
5-edit conf.php file and set your database name and password 
.. code-block:: php

#Domain name here
define('SITE_DOMAIN','localhost/sfhati/');

#database mysql
    define('db_host', 'localhost');
    define('db_name', 'sfhati');
    define('db_user', 'root');
    define('db_pass', '');

