Symfony Standard Edition with SonataAdminBundle installed
==============================================

Welcome to the Symfony Sonata Distribution - a fully-functional Symfony2 Sonata application that you can use as the skeleton for your new application.

This distribution exists to save you from repeating all the steps needed to create a basic Sonata app.

This document contains information on how to download, install, and start using Symfony with Sonata. For a more detailed explanation, see the Installation chapter of the Symfony Documentation.

NOTE: For older Symfony versions use the corresponding branch.

1) Installing the Sonata Distribution
-------------------------------------

For now, you just have to clone this repository with a simple git command :

    cd path/to/your/webroot
    git clone https://github.com/pierre-vassoilles/symfony2-base-project.git ./
    
Next, you can use the "install_project" shell to initialize the project.
Warning : You must have Composer globally installed to use it.
The installer will do :

- Create mandatory directories like app/cache, app/logs, data/uploads, web/media (for LiipImagineBundle)
- Composer install --verbose -o
- Set ACLs on some directories if you want to develop with an other user than www-data
- Validate and Update the database
- Load some user fixtures
- Clear all caches
- Install assets with symlinks


2) Checking your System Configuration
-------------------------------------

Before starting coding, make sure that your local system is properly
configured for Symfony.

Execute the `check.php` script from the command line:

    php app/check.php

Access the `config.php` script from a browser:

    http://localhost/path/to/symfony/app/web/config.php

If you get any warnings or recommendations, fix them before moving on.

3) Set up, initialize and browse the app manually
-------------------------------------------------

### Installing dependencies

If you have Composer installed globally on your server, juste do :

    composer install -vvv -o
    
If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/ or just run the following command:

    curl -s http://getcomposer.org/installer | php
    
Then, run :
    
    php composer.phar install -vvv -o

### Initializing the DB

Before you can run the server and log in to Sonata you need to create the
tables first.

    ./app/console doctrine:schema:create

### Create the users

You can either create a handful of users like this (one of the usernames is 
'superadmin' with password 'test')

    ./app/console doctrine:fixtures:load

Or you can manually create a user yourself

    ./app/console fos:user:create username emai@example.com password
    ./app/console fos:user:promote username ROLE_SONATA_ADMIN

### Install assets:

    ./app/console assets:install --symlink --relative web


4) Available Bundles
-------------------------------------------------

- **Symfony Standard Edition 2.8**
- **Doctrine 2**
- **FOSUserBundle** : friendsofsymfony/user-bundle
- **FOS JsRoutingBundle** : friendsofsymfony/jsrouting-bundle
- **sonata-project/admin-bundle**  : For admin section
- **sonata-project/doctrine-orm-admin-bundle**
- **liip/imagine-bundle** : Very usefull for image display
- **knplabs/doctrine-behaviors** : Implementing some Traits like Timestampable, Sluggable, SoftDeletable, etc.
- **egeloen/ckeditor-bundle** : Adds the famous ckEditor to your forms (available for admin section too)
- **hpatoio/deploy-bundle** : Deployment bundle using rsync command
- **icedevelopment/mysql-workbench-schema-exporter** : A very userful bundle if you use MySQL Workbench to create your database. It automatically creates your entities from a MySQL Workbench model
- **icedevelopment/apc-bundle** : Command line tool to clear APC cache and OPCode cache

Skeleton Bundles :

- **Ice/EntityBundle** : A Bundle where you can put all your entities
- **Ice/FrontendBundle** : Contains a basic layout, website assets and basic controllers like content pages
- **Ice/CommonBundle** : Contains common features of the projets like Menu and emails
- **Ice/AdminBundle** : The admin section. Contains the admin classes and the Sonata overrides
- **Ice/UserBundle** : Override of the FOSUserBundle