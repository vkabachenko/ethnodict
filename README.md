Project deployment (dev mode)
===============================

* Init Yii2 part as described in [manual](https://github.com/yiisoft/yii2-app-advanced/blob/master/docs/guide/start-installation.md)

[Apache2 conf files examples for backend and api](apache.md)
* Api link should be **http://etnodict.api** otherwise change link name in *src/api-server.js*
* Set user name and password for backend (via terminal session):
```
php yii user/add
```
* Init Vue part 
```
cd frontend/web
npm install
```
* Run frontend
```
cd frontend/web
npm run dev
```
