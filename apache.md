Backend
````
<VirtualHost *:80>
  ServerName: etnodict.back
  
  DocumentRoot "/var/www/app/src/backend/web"
  
  <Directory "/var/www/app/src/backend/web">
    Options Indexes FollowSymlinks MultiViews
    AllowOverride All
    Require all granted
    DirectoryIndex index.php
  </Directory> 
</VirtualHost> 
````

Api
````
<VirtualHost *:80>
  ServerName: etnodict.api
  
  DocumentRoot "/var/www/app/src/api/web"
  
  <Directory "/var/www/app/src/api/web">
    Options Indexes FollowSymlinks MultiViews
    RewriteEngine on
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule . index.php
    AllowOverride All
    Require all granted
    DirectoryIndex index.php
  </Directory> 
  Header set Access-Control-Allow-Origin "*"
</VirtualHost> 
````

Module mod_headers should be enabled

