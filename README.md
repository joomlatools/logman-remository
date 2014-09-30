LOGman Remository plugin
========================

LOGman Remository plugin is a plugin for integrating [Remository](http://remository.com/) with LOGman.

## Installation

### Composer

You can install this package using [Composer](https://getcomposer.org/). Create a `composer.json` file inside the root directory of your Joomla! site containing the following code:

```
{
    "require": {        
        "joomlatools/plg_logman_remository": "dev-master"
    },
    "minimum-stability": "dev"
}
```

Run composer install.

### Phing

For convenience, a [phing](http://www.phing.info/) script for building the package is also available under the `/scripts/build` folder of the repo.

## Usage

After the package is installed, make sure to enable the plugin and that both LOGman and Remository are installed.

## Supported activities

The following Remository file actions are currently logged:

* Add
* Edit
* Delete
* Download
* Comment