Fushi PHP Boilerplate
=====================



Introduction
------------

Fushi is a simple, lightweight PHP boilerplate (definition of [Boilerplate on Wikipedia](http://en.wikipedia.org/wiki/Boilerplate_code)).

It can be used for building a large variety of projects.



Requirements
------------

In order to run Fushi, you just need:
- an Apache server (rewrite module must be enabled) 
- PHP 5.2 or newer (it should potentially run in earlier versions, although I haven't tested yet.)
- You must enable *rewrite_module* in Apache and *short open tag* in PHP settings.



Getting started
---------------

1. First of all, upload everything in the root of your web server.
2. Then go to */db* folder and create a new database with the provided MySQL dump.
3. When you're done, go to */config* folder and edit *database.php*.
4. You also need to edit *paths.php* in the same folder.

If you have edited the above files properly, just surf to the root of your website and you should be able to see the home page.



Documentation
-------------

Fushi has a very simple but powerful built-in templating system.

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