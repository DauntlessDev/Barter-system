# Barter system ⚡️
Barter system using Codeigniter 4

Features:

- frontend create from scratch(no bootstrap/template)
- proof of work can be found [here](https://github.com/Simperfy/Barter-system/pulls?q=is%3Apr+is%3Aclosed)

<br>

- [x] intended routes (redirect back to visited url before login)
- [ ] form validation
  - [x] login
  - [x] sign up
  - [ ] add item
  - [ ] edit item
  - [x] edit profile
  - [ ] place offer
- [x] login/signup
- [x] real-time messaging
- [x] view items per category
- [x] search products
- [ ] place offers
- [ ] add item
- [ ] add review
- [ ] view reviews
- [ ] image uploads

<br>

## Installation ▶️

### Prerequisite

- [Composer](https://getcomposer.org/Composer-Setup.exe)

- PHP version 7.3 or higher is required

<br>

> Start xampp's apache & mysql

> open CMD and type the following:

`git clone https://github.com/Simperfy/Barter-system.git`

`cd Barter-system`

`composer install`

`composer setup`

`composer refresh-db`

That's it your done! *If there's an error please check [Manual Database Installation](#manual-database-installation-⏩)*

> start server (using cmd/terminal)

`php spark serve`

You should see output like this:
![php spark serve output](docs/img/serve.png)

Goto http://localhost:8080 to browse the website.

<details>
    <summary>More details</summary>

> If you need to drop all tables

`php spark migrate:rollback`

> If you need to quickly drop && create tables + populate with fake data

`php spark migrate:refresh && php spark db:seed BaseSeeder`

or

`composer refresh-db`

</details>

<br>

## Manual Database Installation ⏩

If the above instruction's `composer setup` did not work you may try these steps below.

<br>

<details>
    <summary>alternative way for composer setup</summary>

> Start xampp's apache & mysql

![xampp output](docs/img/xampp.png)

> overwrite `.env` file

```
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost:8080/'
database.default.hostname = localhost
database.default.database = barter_system
database.default.username = root
database.default.password = ''
database.default.DBDriver = MySQLi
```

> Create database called `barter_system`

Goto http://localhost/phpmyadmin

click "new" *(located in left most panel)*

type "barter_system" *(without quotes)*

then click "create"

`barter_system` should now appear in the list of of your databases:

![phpmyadmin output](docs/img/phpmyadmin.png)

> migrate database

`php spark migrate`

`php spark db:seed BaseSeeder`

> check results

your `users` table should look like this:
![users table output](docs/img/users_table.png)

</details>

<br>

## Troubleshooting ❗️

> In case you got an error like below:

![composer install error](docs/img/composer-error.png)

open `C:\xampp\php\php.ini` using any text editor

delete "`;`" in "`;extension = intl`"
```diff
-;extension=intl
+extension=intl
```

<br>

> ['php' is not recognized as an internal or external command](https://stackoverflow.com/questions/31291317/php-is-not-recognized-as-an-internal-or-external-command-in-command-prompt/31291404)

<br>

> In case of spam reloads due to `live server`:

Goto File > preference > settings

search for `@ext:ritwickdey.liveserver Ignore Files`

click `Edit in settings.json`

add the following lines, and restart the live server.
```diff
"liveServer.settings.ignoreFiles":[
    ...
+    "vendor/**",
+    "writable/**",
]
```

<br>

## Authors 🏅

**Amazing people behind these project:**

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
          <a href="#" title="Design">🎨</a>
          <a href="#" title="Frontend(UI)">🖼️</a>
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
          <a href="#" title="Database Design">🔣</a>
          <a href="#" title="Design">🎨</a>
          <a href="#" title="Frontend(UI)">🖼️</a>
          <a href="#" title="Project Idea">🤔</a>
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
          <a href="#" title="Backend(main)">🕹</a>
          <a href="#" title="Database Design">🔣</a>
          <a href="#" title="Documentation(backend models)">📖</a>
          <a href="#" title="ERD Creator">📈</a>
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
          <a href="#" title="Backend">🕹</a>
          <a href="#" title="Design">🎨</a>
          <a href="#" title="Frontend(UX)">🖼️</a>
          <a href="#" title="Infrastructure/DevOps">🚇</a>
          <a href="#" title="Project Installation Tutorial">✅</a>
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
          <a href="#" title="Spokesperson">📢</a>
      </td>
  </tr>
</table>

<br>

<details>
    <summary>...</summary>

[ERD](https://lucid.app/lucidchart/7d01ca64-6625-4663-a23f-361770ed6385/edit) by <a href="https://github.com/Hezzz">Hezzz</a>

[Prototype](https://www.figma.com/file/PwrsPkK8xzcjMvn1iqkQBK/Barter-System) by <a href="https://github.com/Simperfy">Simperfy</a>

Idea of <a href="https://github.com/DauntlessDev">DauntlessDev</a>

</details>