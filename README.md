# Barter system ⚡️
Barter system using Code Igniter 4

<br>

## Installation ▶️

> open cmd/terminal and type the following:

`git clone https://github.com/Simperfy/Barter-system.git`

`cd Barter-system`

`composer install`

> Copy `env` to `.env` and tailor for your app, specifically the `CI_ENVIRONMENT` and any `database` settings.

Replace red line with green lines

```diff
-# CI_ENVIRONMENT = production
...
-app.baseURL = ''
...
-# database.default.hostname = localhost
-# database.default.database = ci4
-# database.default.username = root
-# database.default.password = root
-# database.default.DBDriver = MySQLi
+CI_ENVIRONMENT = development
...
+app.baseURL = 'http://localhost:8080/'
...
+database.default.hostname = localhost
+database.default.database = barter_system
+database.default.username = root
+database.default.password = ''
+database.default.DBDriver = MySQLi
```

> start server (using cmd/terminal)

`php spark serve`

You should see output like this:
![php spark serve output](docs/img/serve.png)

Goto http://localhost:8080 to browse the website.

<br>

## Troubleshooting ❗️

In case you got an error like below:
![composer install error](docs/img/composer-error.png)

open `C:\xampp\php\php.ini` using any text editor

delete "`;`" in "`;extension = int1`"
```diff
-;extension=intl
+extension=intl
```

<br>

['php' is not recognized as an internal or external command](https://stackoverflow.com/questions/31291317/php-is-not-recognized-as-an-internal-or-external-command-in-command-prompt/31291404)

## Server Requirements ⚙️

- [Composer](https://getcomposer.org/)

- PHP version 7.3 or higher is required

<br>

## Authors 🏅

<table>
  <tr>
      <td align="center">
          <a href="https://github.com/briellers">
              <img src="https://github.com/briellers.png?size=100" width="100px;" alt=""/>
              <br/>
              <sub>
                  <b>briellers</b>
              </sub>
          </a>
          <br/>
          <a href="#" title="Frontend">🖼️</a>
          <a href="#" title="Backend">🕹</a>
          <a href="#" title="Documentation">📖</a>
      </td>
      <td align="center">
          <a href="https://github.com/DauntlessDev">
              <img src="https://github.com/DauntlessDev.png?size=100" width="100px;" alt=""/>
              <br/>
              <sub>
                  <b>DauntlessDev</b>
              </sub>
          </a>
          <br/>
          <a href="#" title="Frontend">🖼️</a>
          <a href="#" title="Backend">🕹</a>
          <a href="#" title="Documentation">📖</a>
      </td>
      <td align="center">
          <a href="https://github.com/Hezzz">
              <img src="https://github.com/Hezzz.png?size=100" width="100px;" alt=""/>
              <br/>
              <sub>
                  <b>Hezzz</b>
              </sub>
          </a>
          <br/>
          <a href="#" title="Frontend">🖼️</a>
          <a href="#" title="Backend">🕹</a>
          <a href="#" title="Documentation">📖</a>
      </td>
      <td align="center">
          <a href="https://github.com/Simperfy">
              <img src="https://github.com/Simperfy.png?size=100" width="100px;" alt=""/>
              <br/>
              <sub>
                  <b>Simperfy</b>
              </sub>
          </a>
          <br/>
          <a href="#" title="Frontend">🖼️</a>
          <a href="#" title="Backend">🕹</a>
          <a href="#" title="Documentation">📖</a>
      </td>
      <td align="center">
          <a href="https://github.com/stormy26">
              <img src="https://github.com/stormy26.png?size=100" width="100px;" alt=""/>
              <br/>
              <sub>
                  <b>Stormy26</b>
              </sub>
          </a>
          <br/>
          <a href="#" title="Frontend">🖼️</a>
          <a href="#" title="Backend">🕹</a>
          <a href="#" title="Documentation">📖</a>
      </td>
  </tr>
</table>