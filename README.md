SalvaJshrinkBundle
==================

[![Latest Version on Packagist](https://img.shields.io/packagist/v/salva/jshrink-bundle.svg)](https://packagist.org/packages/salva/jshrink-bundle)
[![Build Status](https://img.shields.io/travis/nibsirahsieu/SalvaJshrinkBundle.svg?style=flat)](https://travis-ci.org/nibsirahsieu/SalvaJshrinkBundle)
[![Total Downloads](https://img.shields.io/packagist/dt/salva/jshrink-bundle.svg?style=flat)](https://packagist.org/packages/salva/jshrink-bundle)

This bundle integrate "[jshrink library](https://github.com/tedivm/JShrink)" as Assetic filter and twig extension.

Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require salva/jshrink-bundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding the following line in the `app/AppKernel.php`
file of your project:

```php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new Salva\JshrinkBundle\SalvaJshrinkBundle(),
        );
    }
}
```

Configuration
-------------

Optionally, add the configuration in your config file.

```yml
# app/config.yml
salva_jshrink:
    enabled: true # if false {% jshrink %} tag will not compress the content
    flaggedComments: true
```

Basic Usage
-----------

Minifying JavaScript files

```twig
{% javascripts '@AcmeFooBundle/Resources/public/js/*' filter='jshrink' %}
    <script src="{{ asset_url }}"></script>
{% endjavascripts %}
```

Minifying inline JavaScript

```twig
{% jshrink %}
<script>
    $(document).ready(function() {
        // ...
    });
</script>
{% endjshrink %}
```
