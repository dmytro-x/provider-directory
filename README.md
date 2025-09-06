#Providers directory
List of service providers with:  
- Name, short description, logo, and category  
- Ability to filter by category  
- Each provider has a profile page  

##Launch project



###Launch with Docker

<code>cp .env.example.docker .env</code>

###Launch w/o Docker
If you prefer use project w/o docker...  
<code>cp .env.example .env</code>

...
###Launch
<code>php artisan key:generate</code>

<code>php artisan migrate</code>  

<code>php artisan db:seed</code>

##DB Schema choice explanation

- Product <code>name</code> is index for quick sort and search in future

- <code>category_id</code> is <code>restrictOnDelete()</code>. while we have any Provider with this category.
Probably can be changed to <code>nullable()</code> if category not required, but we have filter by category, 
so <code>restrictOnDelete()</code> in my opinion the best choice.

- Other fields will not use in sorting. 
Probably description can by searchable in the future, but we will need something like ElasticSearch.

- Category <code>name</code> is index also for possible future sort and search.

- I'm using general id, not uuid or slug, coz speed was the main request for this task.

##Design decisions

<b>Vite</b> for build bundles. Also vite make development faster

<b>Tailwind</b> make responsive cross-browser interface for any resolution from phone to PC

### Rendering Strategy

- The page renders the full layout immediately with minimal blocking
- Data for categories and providers is fetched asynchronously via Vue 3 + fetch API
- A lightweight skeleton loader is displayed while data loads
- This significantly reduces TTFB and LCP, and ensures fast perceived performance

Vue.js in bundle. Probably from CDN it will be bit faster. But needs more logic for control version and so on  
Also used export with <b>vite</b>. so our bundle can be smaller than CDN Vue package
It depend on users behavior. 
- if we expect just one visit per month - CDN with fallback from our server preferable. 
- if we expect multiple usage per day/week - bundle is ok.

##Performance optimizations  
##Areas for future enhancement

Profile page can be open as modal window. so clients will stay on page. it reduce time for users and reduce load for server.
Switch to SPA or Inertian with App.vue as entrypoint


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
