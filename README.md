# sfhati CMS

this is sfhati cms 

* [Online Demo](http://design.sfhati.com/)
* [Online Docs](http://sfhati-cms.readthedocs.org/) (ReadTheDocs.com)
* [Chat](https://gitter.im/sfhati/cms)
* [youtube] (http://www.youtube.com/sfhati)


Install
=======

1. download compress file
2. extract sfhati folder to root host server 
3. create mysql database
4. upload sfhati.sql by import in phpmyadmin 
5. edit conf.php file and set your database name and password 
6. goto http://localhost/sfhati/cms/sfhati/ 

Note
====

1. if you wont login to controlpanel goto http://localhost/sfhati/cms/sfhati/admin
user name : admin 
password : 123456
2. if you dont see login area goto http://localhost/sfhati/cms/sfhati/?shng_tpl=login
or you can active .htaccess. 


    `#Domain name here`

    `define('SITE_DOMAIN','localhost/sfhati/');`

***

    `#database mysql`

    `define('db_host', 'localhost');`

    `define('db_name', 'sfhati');`

    `define('db_user', 'root');`

    `define('db_pass', '');`