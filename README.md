# kick-this-php-website
## Simple boilerplate for small php projects

I built this for very simple php projects. It uses [AltoRouter](https://github.com/dannyvankooten/AltoRouter) and [Blade](https://github.com/jenssegers/blade) templating engine (extracted from Laravel).

It lacks a Model and Controller system but I'll probably add if it's needed in some future point.


### Note

The domain root must target the 'www' folder. Otherwhise url rewriting won't work and furthermore your website won't work. 

So if your url is http://example.dev and your project is located in ~naim/Code/example, 
it must be setup like this ~naim/Code/example/www => http://example.dev/