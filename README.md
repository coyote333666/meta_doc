# meta_doc


It is better to manage the metadatas of documents in a relational database rather than placing it in the title of a document in a file system. For example, Projectx_document2_20150101_v01.doc lost in a maze of subfolders, duplicated on several servers.

To try to solve these problems simply, here is a basic document management (DM) system, with a search by metadata. Access to documents through a classification plan. The metadata categories as well as the types of relationships between documents are part of the Dublin Core repository. The ressource URL or attached documents URL are inside the field "text".

I used [Symfony 5: The Fast Track][2] and [Symfony demo][3] to implement my [data model][4].

Requirements
------------

  * PHP 7.2.9 or higher;
  * pdo_pgsql PHP extension enabled in php.ini;
  * intl PHP extension enabled in php.ini
  * Postgresql standalone OR Docker-compose
  * and the [usual Symfony application requirements][1].

Installation
------------

Verify that you have installed [composer][7], [git][8], [npm (node.js)][9], [yarn][10]
and, depending on your environment, [docker-compose][11] OR [postgresql][12].

Verify that you have PHP installed : `sudo apt-get install php` on linux or, for windows, use php already included in [xampp][13].
If you have Windows, do not forget to indicate in the environment variable PATH, 
the path to access php.exe (for example, C:\xampp\php).

[Download Symfony][5] to install the `symfony` binary on your computer and run
this command:

```bash
$ git clone https://github.com/coyote333666/meta_doc meta_doc
$ cd metad_doc/
$ composer update
$ composer install --no-interaction
$ yarn add node-sass sass-loader --dev
$ symfony run yarn encore dev
```

Usage
-----

If you just want to create the structure of the database with Symfony and docker-compose, you can run this command:
```bash
$ docker-compose up -d
$ symfony console make:migration
$ symfony console doctrine:migrations:migrate
```
If necessary, load Dublin Core data for your local parameter :
```bash
$ symfony run psql -f dublin_core/dublin_core_element_<your locale parameter>.sql
$ symfony run psql -f dublin_core/dublin_core_relation_<your locale parameter>.sql
```

If you want to create and populate the database (english version), run this command with Postgresql binaries installed:
```bash
$ symfony run psql -f meta_doc.sql
```
OR, inside the docker container:
```bash
$ psql -f meta_doc.sql -U main 
(password main)
```

Modify your locale parameter in /config/services.yaml:
```bash
parameters:
    locale: '<your locale parameter>'
    # This parameter defines the codes of the locales (languages) enabled in the application
    app_locales: ar|en|fr|de|es|ru|it|ja|zh|pt
```

Run application
```bash
$ symfony server:start -d
```

Then access the application in your browser at the given URL (<https://localhost:8000> by default).

If you don't have the Symfony binary installed, run `php -S localhost:8000 -t public/`
to use the built-in PHP web server or [configure a web server][6] like Nginx or
Apache to run the application.

The username and password of the admin account are admin/admin.

[1]: https://symfony.com/doc/current/setup.html
[2]: https://symfony.com/doc/current/the-fast-track/en/index.html
[3]: https://github.com/symfony/demo
[4]: https://gedcoyote.blogspot.com/
[5]: https://symfony.com/download
[6]: https://symfony.com/doc/current/cookbook/configuration/web_server_configuration.html
[7]: https://getcomposer.org/download/
[8]: https://git-scm.com/
[9]: https://www.npmjs.com/get-npm
[10]: https://yarnpkg.com/getting-started/install
[11]: https://docs.docker.com/compose/install/
[12]: https://www.postgresql.org/
[13]: https://www.apachefriends.org/index.html
