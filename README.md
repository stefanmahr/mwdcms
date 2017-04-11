# Modern Web Design CMS Functions

Frontend Functions for the Modern Web Design Content Management System.

### Installation

Download

```sh
$ composer require stefanmahr/mwdcms
```

Open your `config/app.php` and add the following to the `providers` array:

```sh
Stefanmahr\Mwdcms\CMSServiceProvider::class,
```

In the same `config/app.php` and add the following to the `aliases` array:

```sh
'cmsSlider' => Stefanmahr\Mwdcms\Facades\cmsSlider::class,
```

Run the command below to publish the package config file and database migration:

```sh
php artisan vendor:publish
```