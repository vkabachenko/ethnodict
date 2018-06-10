Project deployment (dev mode)
===============================

* Init Yii2 part as described in [manual](https://github.com/yiisoft/yii2-app-advanced/blob/master/docs/guide/start-installation.md)

[Apache2 conf files examples for backend and api](apache.md)
* Set enviroments variables for development in `frontend/config/dev.env.js`
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
