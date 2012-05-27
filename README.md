FkrNominatimBundle
==================

Integrates nominatim api (Geolocation API based on OpenStreetMap) into Symfony2.


What you need
=============

curl must be enabled on your server.


Installation
============

Bring in the vendor library
---------------------------

This can be done in three different ways:

**Method #1**) Use composer

    "require": {
        "fkr/nominatim-bundle": "*"
    }


**Method #2**) Use git submodules

    git submodule add git://github.com/fkrauthan/FkrNominatimBundle.git vendor/bundles/Fkr/NominatimBundle


**Method #3**) Use deps file
		
	[FkrNominatimBundle]
	    git=git://github.com/fkrauthan/FkrNominatimBundle.git
		target=bundles/Fkr/NominatimBundle


Register the Fkr namespace
--------------------------
	
    // app/autoload.php
    $loader->registerNamespaces(array(
        'Fkr' => __DIR__.'/../vendor/bundles',
        // your other namespaces
    ));


Add FkrNominatimBundle to your application kernel
-------------------------------------------------
	
	// app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Fkr\NominatimBundle\FkrNominatimBundle(),
            // ...
        );
    }

Configuration
=============

    # app/config.yml
    fkr_nominatim:
        app_name:
        app_mail:


* app_name: You must set your app name here (It's needed for OpenStreetMap API)
* app_mail: You should set your mail here (It's needed that OpenStreetMap can contact you if any errors occours by using there API)


Usage
=====

To get a driver specific Imagine class instance just use the following code

	$this->get('fkr_nominatim.geolocation_api')->locateAddress('My Street, 8888 MyCity');
	$this->get('fkr_nominatim.geolocation_api')->locateAddress(array('My Street', '8888', 'MyCity'));
	
	
The result would be:
* null: If nothing was found
* Location object: If only one result was found
* array with Location objects: If more then one result was found


Licence
=======

[Resources/meta/LICENSE](https://github.com/fkrauthan/FkrImagineBundle/blob/master/Resources/meta/LICENSE)


Nominatim usage policy
======================

Please respect the [usage policy](http://wiki.openstreetmap.org/wiki/Nominatim_usage_policy) specified by Open Street Map for use of the Geocoding API.
