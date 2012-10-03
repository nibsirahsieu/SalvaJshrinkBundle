SalvaJshrinkBundle
==================

This bundle integrate "[jshrink library](https://github.com/tedivm/JShrink)" as Assetic filter.

Installation
============

### 1) Download SalvaJshrinkBundle

**Using the vendors script**

Add the following lines to the `deps` file at the root of your project file:

```
[SalvaJshrinkBundle]
    git=http://github.com/nibsirahsieu/SalvaJshrinkBundle.git
    target=bundles/Salva/JshrinkBundle
[JShrink]
    git=https://github.com/tedivm/JShrink.git
    target=jshrink    
```

Next, update your vendors by running:

``` bash
$ ./bin/vendors install
```

**Using composer**

Tell composer to download the bundle by running the command:

``` bash
$ php composer.phar require salva/jshrink-bundle:dev-master
```

### 2) Configure the autoloader (no needed for composer)

Add the following entry to your autoloader:

``` php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    // ...

    'Salva'        => __DIR__.'/../vendor/bundles',
    'JShrink'      => __DIR__.'/../vendor/jshrink/src',
));
```

### 3) Enable the bundle

Finally, enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...

        new Salva\JshrinkBundle\SalvaJshrinkBundle(),
    );
}
```
## Configuration

**Optionally, add the configuration in your config file**

*app/config.yml*

```
salva_jshrink:
    flaggedComments: true
```

## Basic Usage

``` twig
{% javascripts '@AcmeFooBundle/Resources/public/js/*' filter='jshrink' %}
    <script src="{{ asset_url }}"></script>
{% endjavascripts %}
```
