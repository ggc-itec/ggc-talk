#GGC-Talk

## Usage

- [How to setup development environment in Windows](#How to setup development environment in Windows)
- [Editing the project](#Editing the project)
- [Troubleshooting](#Troubleshooting)
- [Packages](#Packages)



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

## Using the Auth system in your module
* If your page is restricted to only logged in users, add your route to the route group with 'before' => 'auth'
* If your page is restricted to only guests, add your route to the route group with 'before' => 'guest'
* If you want your page available to either guests or users, then do not put your route into either of those groups
* To get an attribute of a logged in user, use Auth::user() -> attribute.  Where attribute can be id, first_name, or last_name.
* To only display certain elements on a view, in an if statement, you can use Auth::guest() to check if the visitor is not logged in, or Auth::check() to check it a user is logged in.

## Troubleshooting
 
 1. Where do I set my Database Configuration? 
 
 Database configurations are found in Database configurations: `ggc-talk/app/config/database.php`
  Make sure the configurations are pointed too the MYSQL instance that you have set up.

 2. I set up composer and I still can't run the application!?
 
 on the command line, make sure you run the command:   `php artisan migrate`
  This command updates your MySQL database changes so that you have a Database Version control. Basically, it makes sure    your database is up to date.

 3. I added a new custom class but Laravel can't see it!?
 
 Please make sure to run the command 'composer dump-autoload' in the root of the application.
 Alternatively, you can explicityly add a directory to the ClassLoader::addDirectories in the app/start/Global.php
 file.
```php
 ClassLoader::addDirectories(array(
 
 	app_path().'/commands',
 	app_path().'/controllers',
 	app_path().'/models',
 	app_path().'/database/seeds',
 	app_path().'/MyClassFolderGoesHere'
 
 ));
```
 

## Packages

Packages are the primary way of adding functionality to Laravel. 

* [Ardent](https://github.com/laravelbook/ardent "Ardent repo")  
Description:Self validation for Models.

* [Laravel4Generators]((https://github.com/JeffreyWay/Laravel-4-Generators "L4 Generators")  
Description: extends php artisan generate command for faster workflow and uniform coding standard.
 

    

 
 
 
