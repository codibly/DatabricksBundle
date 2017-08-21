CodiblyDatabricksBundle
=======================

Documentation
-------------

The source of the documentation is stored in the `Resources/doc/` folder
in this bundle, and available on symfony.com:

[Resources/doc/index.md](https://github.com/codibly/DatabricksBundle/blob/master/Resources/doc/index.md)

Installation
-------------

## Get the bundle using composer

Add CodiblyDatabrickBundle by running this command from the terminal at the root of
your Symfony project:

```bash
composer require codibly/databricks-bundle
```

Alternatively, you can add the requirement `"codibly/databricks-bundle": "dev-master"` to your composer.json and run `composer update`.
This could be useful when the installation of CodiblyDatabricksBundle is not compatible with some currently installed dependencies. Anyway, the previous option is the preferred way, since composer can pick the best requirement constraint for you.

## Enable the bundle

To start using the bundle, register the bundle in your application's kernel class:

```php
// app/AppKernel.php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            // ...
            new Codibly\DatabricksBundle\CodiblyDatabricksBundle(),
            // ...
        ];
    }
}
```

## Choose and configure a driver

One driver are currently supported:

  * [guzzle](http://www.doctrine-project.org/projects/orm.html)

Once the chosen driver is installed and configured, tell
CodiblyDatabricksBundle that you want to use it.

```yaml
# app/config/config.yml
codibly_databricks:
    api:
        driver: guzzle
        host: 'https://your_instance.clud.databricks.com/api/v2.0'
        username: '%env(DATABRICKS_USERNAME)%'
        password: '%env(DATABRICKS_PASSWORD)%'
```

## That was it!

Yea, the bundle is installed! Move onto the [usage section](usage.md) to find out how
to configure and setup your first cluster.

Licence
-------

About
-----

Reporting an issue or a feature request
---------------------------------------

Issues and feature requests are tracked in the [Github issue tracker](https://github.com/Codibly/DatabricksBundle/issues).

When reporting a bug, it may be a good idea to reproduce it in a basic project
built using the [Symfony Standard Edition](https://github.com/symfony/symfony-standard)
to allow developers of the bundle to reproduce the issue by simply cloning it
and following some steps.
