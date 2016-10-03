Project deployment (dev mode)
===============================

* Install Vagrant (>1.8) and VirtualBox (>5.1) 
* Add in your `hosts` file: `192.168.56.101 frontend.dev backend.dev` 
* Clone project files from github: `git clone https://github.com/vkabachenko/ethnodict.git`
* Start virtual machine from the project directory: `vagrant up`
* Open terminal session: `vagrant ssh`
* Install composer-asset-plugin (via terminal session): `composer global require "fxp/composer-asset-plugin:~1.1.1"`
* Install required extensions (via terminal session):

```
cd /var/www
composer install
```

* Create required yii2 files (via terminal session):

```
php init
```

* Set the database name, user name and password in `common/config/main-local/php`
* Apply migrations (via terminal session):

```
php yii migrate
```

* Set user name and password for backend (via terminal session):

```
php yii user/add
```

* Include debug panel and gii for frontend and backend. Add to `frontend/config/main-local/php` and `backend/config/main-local/php`

```
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
	    'class' => 'yii\debug\Module',
		'allowedIPs' => ['*']
		];

    $config['bootstrap'][] = 'gii';
	
    $config['modules']['gii'] = [
		'class' => 'yii\gii\Module',
		'allowedIPs' => ['*']
		];
```		
