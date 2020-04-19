oc-landingpage-plugin
======================

[![Latest Stable Version](https://poser.pugx.org/dieterholvoet/oc-landingpage-plugin/v/stable)](https://packagist.org/packages/dieterholvoet/oc-landingpage-plugin)
[![Total Downloads](https://poser.pugx.org/dieterholvoet/oc-landingpage-plugin/downloads)](https://packagist.org/packages/dieterholvoet/oc-landingpage-plugin)
[![License](https://poser.pugx.org/dieterholvoet/oc-landingpage-plugin/license)](https://packagist.org/packages/dieterholvoet/oc-landingpage-plugin)

> Provides the possibility to define a page as landing page, redirecting all requests to that page

![Screenshot](https://i.imgur.com/d4bnvsr.png)

## Installation

This OctoberCMS plugin requires PHP 7.0.8 or higher. It can be
installed using Composer:

```bash
 composer require dieterholvoet/oc-landingpage-plugin
```

## How does it work?
When enabled, this plugin makes sure that any visited page will redirect to a chosen landing page. This can be useful for when a website is still in development and a temporary landing page has to be shown.

### Enable the plugin
To enable the plugin, go to the plugin settings under the CMS section and choose a page to use as landing page. Make sure the _Enable redirection to the landing page_ switch is on.

### Circumvent the redirect
Users with the _Circumvent the landing page redirection_ permission can visit the websites pages while logged in, without being redirected to the landing page.

## Security
If you discover any security-related issues, please email
[dieter.holvoet@gmail.com](mailto:dieter.holvoet@gmail.com) instead of using the issue
tracker.

## License
Distributed under the MIT License. See the [LICENSE](LICENSE) file
for more information.
