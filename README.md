Fushi PHP Boilerplate
=====================


Introduction
------------

Fushi is a simple, lightweight PHP boilerplate (definition of [Boilerplate on Wikipedia](http://en.wikipedia.org/wiki/Boilerplate_code)).

It can be used for building a large variety of projects, small and large. 

It has a very simple but powerful built-in templating system, as well as a pretty backend interface.


Features
--------

- Modular, scalable and SEO friendly CSS frontend engine
- Helper classes and functions for managing database tables
- Helper class for pagination
- A whole bunch of functions for a variety of tasks (see `library/functions/`)
- SEO friendly URL rewrites
- A powerful and secure session engine
- Automagically add a new template that inherits CSS from the default one
- User-friendly backoffice UI
- gzip compression support


Requirements
------------

In order to run Fushi, you just need:
- an Apache web server
- PHP 5.2 or newer (it should potentially run in earlier versions, although I haven't tested yet.)
- You must enable *rewrite_module* in Apache and *short open tag* in PHP settings.


Getting started
---------------

1. Upload everything in the root of your web server.
2. Open `/db` folder and create a new database with the provided MySQL dump.
3. Go to `/config` folder and edit `database.php`. You'll also need to edit `paths.php` in the same folder.

If you have edited the above files properly, just surf to the root of your website and you should be able to see the home page.

**Having trouble during installation? [Please let me know](https://github.com/simonewebdesign/Fushi/issues/new).**


Documentation
-------------

### File System

In alphabetical order and in a tree-structured way, I'll proceed describing the folders and their content.

- **application** all files relative to the application itself.
    - **backoffice** backend interface files.
    - **includes** files that can be included inside templates.
        - **forms**
        - **galleries**
        - **lists**
        - **menus**
    - **templates** all templates (backoffice included).
- **config** configuration files (only constants here, *not* variables).
- **db** database dump (*.sql)
- **library** The core of Fushi.
    - **classes**
    - **functions**
    - **session**
- **public** the only folder publicly accessible.
    - **css**
        - **classes** css classes, usually reusable many times inside your app.
        - **modules** css modules, (unique and independent parts of your app).
        - **templates** css relative to single templates.
    - **fonts** custom fonts (I personally use fontsquirrel.com)
    - **img** all images.
    - **icons** only sweetieplus by default.
        - **sweetieplus**
    - **js** all the JavaScript scripts.
        - **libs** all the needed libraries (only jQuery by default).
    - **media** multimedia files.
        - **pdf**
        - **video**
    - **static** static HTML docs.
        - **errordocs** HTTP error files (403 Forbidden, 404 Not Found, 500 Internal Server Error etc).
    - **plugins**
        - **tinymce** the TinyMCE editor, needed by backoffice.
        - **galleria** jQuery galleria plugin.
        - **fancybox** just another freaking jQuery plugin.
- **scripts** any script that could reveal useful.	
- **tmp** unused.
    - **cache** unused.
    - **logs** unused.
    - **sessions** unused.
    
    
### Global Variables

In the most important file, `bootstrap.php`, are declared some fundamental variables:

- **$get** is the `$_GET` array sanitized. It actually discards every variable in the URL that contains specials characters. It only accepts numbers, letters, hyphens and underscores.
- **$template_name** is the name of the current template, getted from the URL. It equals `$get[0]`.
- **$template** is an array taken from the database, containing the current template data:
    - `$template['_id']`
    - `$template['name']`
    - `$template['title']`
    - `$template['h1']`
    - `$template['h2']`
    - `$template['metaDescription']`
    - `$template['metaKeywords']`
- **$css** contains the links to the main stylesheets: `style.css` and `templates/$template_name.css` (the current template's CSS).
- *Backoffice only:*
    - **$table_name** 
    - **$action**
    - **$id**


### Frontend (CSS)

The frontend engine is based upon the [HTML5 Boilerplate](https://github.com/h5bp/html5-boilerplate) (v3.0.2, released on feb 19, 2012).

You're completely free to organize and manage your CSS as you wish: however I suggest you trying to maintain your structure as modular as possible. You can always use `@import url('style.css');` but this is discouraged. Use `application/boot.php` to arbitrarily import:

- Classes from 	`public/css/classes/`;
- Modules from 	`public/css/modules/`;
- Templates from 	`public/css/templates/`.

So remember that when your web application has a modular piece (i.e. an header or footer), you can declare it as *module* and subsequently recall it in a specific template; you can even create new templates based on the concept of inheritance!

These "non-semantic helper classes" are available:

- `.ir`
- `.hidden`
- `.visuallyhidden`
- `.invisible`
- `.clearfix`

For the explaining I recommend you reading the h5bp documentation: http://html5boilerplate.com/docs

The classes `.left` and `.right` just make block elements float to left or right respectively.


### JavaScript

Just two words on JavaScript: `script.js` is the main JS file, that loads automatically in every page.
Besides that, you're free to load all *.js* files you want.

[jQuery](http://jquery.com) is the Fushi's default library; if you need a different one, add it in `public/js/libs/` folder. If you need a jQuery plugin, add it in `public/plugins/` folder.


### Ajax

The `public/js/ajax.js` file is responsible for managing **all Ajax requests**, and strictly collaborates with `public/ajax.php`.

A detailed explaining of an Ajax request in Fushi:

1. User clicks on a link.
2. If that link has `class=action`, it will do an Ajax request.
3. `ajax.php` will be loaded, and it will read the `href` attribute.
4. The `href` will be parsed and Ajax will route to the right file.
5. The right file will be executed.
6. The `<div id=response>` will output the HTML.

A concrete example:

1. User clicks on `<a class="action update" href="fruit/update/3">Update this!</a>`.
2. `ajax.js` loads `ajax.php`, passing the `href` to it (`fruit/update/3`).
3. `ajax.php` realizes that `fruit_update.php` must be executed.
4. `ajax.js` outputs the HTML returned by `fruit_update.php`.


### The Backend (aka Backoffice)

The backend interface is based on the CRUD (create, read, update, delete).
Every table must have (in `application/backoffice/`) a number of files that equals the # of actions +1.

For example:

Table: **Products**

Files:
- products.php
- products_create.php
- products_read.php
- products_update.php
- products_delete.php

As a convention, the table names must always be in plural form.



FAQ (Frequently Asked Questions)
--------------------------------

**Q:** I've uploaded every single file in the root of my web server, but Fushi throws weird errors like *unexpected T_FUNCTION*...

**A:** Make sure you have uploaded everything in binary mode.



**Please [open a new issue](https://github.com/simonewebdesign/Fushi/issues/new) if you have a question.**



Thank you for using Fushi! You are awesome!



This content is released under the [MIT License](https://github.com/simonewebdesign/Fushi/blob/master/LICENSE.md).