Meta_doc
========

It is better to manage the metadatas of documents in a relational database rather than placing it in the title of a document in a file system. For example, Projectx_document2_20150101_v01.doc lost in a maze of subfolders, duplicated on several servers.

To try to solve these problems simply, here is a basic document management (DM) system, with a search by metadata. Access to documents through a classification plan. The metadata categories as well as the types of relationships between documents are part of the Dublin Core repository. The ressource URL or attached documents URL are inside the field "text".

I used [Symfony 5: The Fast Track][2] and [Symfony demo][3] to implement my [data model][4]

Requirements
------------

  * PHP 7.2.9 or higher;
  * pdo_pgsql PHP extension enabled;
  * and the [usual Symfony application requirements][1].

Installation
------------

[Download Symfony][5] to install the `symfony` binary on your computer and run
this command:

```bash
$ git clone https://github.com/viniboy666/meta_doc meta_doc
$ cd metad_doc/
$ composer install --no-interaction
```

Usage
-----

Modify your locale parameter in /config/services.yaml:
```bash
parameters:
    locale: '<your locale parameter>'
    # This parameter defines the codes of the locales (languages) enabled in the application
    app_locales: ar|en|fr|de|es|ru|it|ja|zh
```


Run application
```bash
$ symfony serve
```

Then access the application in your browser at the given URL (<https://localhost:8000> by default).

If you don't have the Symfony binary installed, run `php -S localhost:8000 -t public/`
to use the built-in PHP web server or [configure a web server][6] like Nginx or
Apache to run the application.

[1]: https://symfony.com/doc/current/setup.html
[2]: https://symfony.com/doc/current/the-fast-track/en/index.html
[3]: https://github.com/symfony/demo
[4]: https://gedcoyote.blogspot.com/
[5]: https://symfony.com/download
[6]: https://symfony.com/doc/current/cookbook/configuration/web_server_configuration.html
