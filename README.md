# kick-this-php-website
## Simple boilerplate for small php projects

I built this for very simple php projects. It uses [AltoRouter](https://github.com/dannyvankooten/AltoRouter) and [Blade](https://github.com/jenssegers/blade) templating engine (extracted from Laravel). It also has Controllers.

It lacks a Models system but I'll probably add if it's needed in some future point.


### Installation

1. Clone this repository
2. Go to the root folder of your cloned version of this repo
3. Run `composer install` to install the project dependencies
4. Go the the `/www` folder
5. Run `php -S localhost:8888`
6. Open your favorite browser and navigate to `http://localhost:8888/`
7. You should see a sample homepage 🏄

+ Additionally, you can have a look at the boilerplate contact form located and `http://localhost:8888/contact` .
Its logic is located in the `ContactController` class.
