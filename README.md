Kigen Starter Theme
=================

This starter theme is based on Emi https://github.com/zoerooney/Emi, Underscores theme https://github.com/automattic/_s and uses [Node](https://nodejs.org/), [Gulp](http://gulpjs.com/), [SASS](http://sass-lang.com/) and [Bootstrap](http://getbootstrap.com/).

Set Up
------------
Find and replace the following strings. Keep the same general format:

`themeName` > `Theme Name`

`themeHandle` > `Theme_Name`

`themeFunction` > `theme_name`

`themeTextDomain` > `theme-name`

Dev
------------
Run following commands on theme folder:
* npm install
* gulp
* or gulp watch

Gulp
------------
This theme uses [Gulp](http://gulpjs.com/) to automate the following tasks:
* Sass preprocessing
* Auto browser prefixing (via [Autoprefixer](https://github.com/ai/autoprefixer))
* Concat JS
* Minify CSS, JS, Images

It also watches changes to files for use with [LiveReload](http://livereload.com/)

Project Structure
-----------------
ASSETS folder contains all scripts, images, fonts, vendor (3rd party libraries), etc..
DIST folder contains all minified/processed files that are loaded via the theme.
INC folder contains custom functions, post types, admin & login customization and other settings..
SCSS folder contains styles for final main css file.