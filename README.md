Wvp Client
==============================

Requirements
------------
Please see the [composer.json](composer.json) file.

Installation
------------

### Install composer
First install composer if you don't have one:
cd to the web root dir

```bash
curl -sS https://getcomposer.org/installer | php
```

### Install wvpn/client package:
cd to the web root dir

```bash
php composer.phar require wvpn/client:dev-master
mkdir wvpn
cp vendor/wvpn/client/src/ClientConfig.php.dist wvpn/ClientConfig.php
```

### Update config file
change uername & password in wvpn/ClientConfig.php

### Ready to use
require 'vendor/autoload.php';
