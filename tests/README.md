Before
------

Prepare test database for functional and acceptance tests

```
cd tests/codeception
php bin/yii fakedb/make
```

Then make sql dump, name it as `dump.sql` and copy to `tests/codeception/common/_data`


Run Unit test
--------------

```
cd tests/codeception/backend
codecept run unit
```

Run Functional test
--------------------

```
cd tests/codeception/backend
codecept run functional
```

Run Acceptance test
--------------------

Open 3 copies of terminal session

In first start webserver from the root directory:

```
php -S localhost:8080
```

In second launch selenium webdriver:

```
selenium-server-standalone
```

In third run test:

```
cd tests/codeception/backend
codecept run acceptance
```