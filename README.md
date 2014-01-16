#GGC-Talk

## How to setup development environment in Windows

1. Download and install [WAMP](http://www.wampserver.com/en/)
2. Clone this repository in your WAMP www folder (i.e. `c:\wamp\www`)
3. Download and install [Composer](http://getcomposer.org/download/) (use the Windows Installer)
4. Remove semi-colon in front of `extension=php_openssl.dll` line in the `c:\wamp\bin\php\php5.4.12\php.ini` file
5. Open terminal and type `composer install` in the `c:\wamp\www\ggc-talk` folder
5. Open a browser and type `localhost/ggc-talk/public` in the url bar


## Editing the project

1. Download and install [Aptana Studio 3](http://www.aptana.com/products/studio3/download)
2. Start Aptana Studio
3. Click on `File` then `Import`
4. Select `Existing Projects into Workspace` then select the `ggc-talk` repository

## Troubleshooting
 
 1. Where do I set my Database Configuration? 
 
 Database configurations are found in Database configurations: `ggc-talk/app/config/database.php`
  Make sure the configurations are pointed too the MYSQL instance that you ahve set up.

 2. I set up composer and I still can't run the application!?
 
 on the command line, make sure you run the command:   `php artisan migrate`
  This command updates your MySQL database changes so that you have a Database Version control. Basically, it makes sure    your database is up to date.

 
 
