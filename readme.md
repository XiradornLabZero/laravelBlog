# Note per lo studio di Laravel e MVC paradigma.

**Model**: Il model si occupa dell'interqazione con il database e va a elaborare le richieste dati del controller e, una volta raccoli i dati dal DB, gli restituisce al controller che ne elabora forma e contenuto e stato. NON parla MAI con la parte view dell'applicazione

**View**: Si occupa dell'interazione con il lato client a di far capire al controller quale sia la richiesta dell'utente attraverso richieste fatte al controller attraverso il sistema di routing delle richieste di queste tipologie: GET, POST, PUT, DELETE. Il view a sua volta NON parla mai con il Model ma invia le richiese al Controller attraverso le procedure di routing e ripropone le risposte del controller a video nella corretta view

**Controller**: Cuore dell'applicazione esegue tutta la parte funzionale e logica della stessa applicazione, eleaborando le informazioni e restituirle alla view corretta. In sostanza il controller va a prendere le richieste della view, ne elabora la logica, chiede al model di fornire i dati presi dal database ad esempio e rielaborandoli, gli reinvia alla view corretta.

### In sostanza:  

User -> Routing | Richiesta (GET,POST,PUT,DELETE) -> CONTROLLER | Logica [ -> se necessario MODEL | Dati da DB -> CONTROLLER | Rielaborazione ] -> VIEW | Proposizione a video del risultato del controller -> User ( Felice ..... si spera XD )

-------------------------

Abbiamo usato un comando per creare un model con insieme anche una migrazione

	php artisan make:model --migration

oppure

	php artisan make:model -m

-------------------------

Abbiamo usato una variante per la creazione del nostro controller aggiungendo la postilla resource.

	php artisan make:controller PostController --resource

Possiamo includere le risorse e le routes create nel controller attraverso questo comando nel web.php della cartella routes e il comando è il seguente

	Route::resource('post', 'PostController');

Per controllare che queste siano avviabili è possibile vederle attraverso questo comando da cli

	php artisan route:list


-------------------------

##Auth
*E' possibile accorciare questo processo attraverso il comando `php artisan make:auth` ma è bene comprenderne il meccanimo*

Per quanto riguarda la parte di autenticazione e avendo usato il sistema built in va fatta questa considerazione per andare per poter utilizzare le funzioni interne. Per vedere le varie route si può usare il sistema che permette di visualizzarle tramite il comando `php artisan route:list` ovvero il seguente codice aggiunto nel file *web.php*

    Auth::routes();

Alternativamente si può usare questa sintassi:

	Route::get('auth/login', 'Auth\LoginController@showLoginForm');
	Route::post('auth/login', 'Auth\LoginController@login');
	Route::get('auth/logout', 'Auth\LoginController@logout');

	Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
	Route::post('auth/register', 'Auth\RegisterController@register');

-------------------------

Per fare il redirect alla mia route quando non sono loggato devo modificare il mio file in `app/Exception/Handler.php`

-------------------------

#Importantissimo per le Auth e il Recupero password

Come si evince nel codice della pagina `web.php` è possibile carpire un elemento importantissimo. Le Routes seguono l'ordine in cui vengono scritte. Quindi quando le uso è fondamentale usarle nell'ordine corretto al fine di poterne usare le procedure.

Per il recupero, infatti ho più route per la stessa cosa e quindi è bene che ne venga descritto attraverso l'ordine la corretta esecuzione. Come si evince dal codice:

	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
	Route::get('password/reset/{token?}', ['uses' => 'Auth\ResetPasswordController@showResetForm', 'as' => 'passwprd.reset']); # the ? indicate a optional variable
	Route::post('password/reset', 'Auth\ResetPasswordController@reset');

si può facimenete capire che:

+ la prima route va a eseguire la vie della richiesta tramite mail
+ la seconda manda la richiesta tramite post nel sistema di mail alla mail desiderata
+ la terza ritorna al reset e dispone la seconda form per il reset che è quella del cambio pass effettivo
+ la quarta invia il tutto al database infatti è stata anche inserit la direttiva per il reset ovvero la route **password.reset** proprio per confermare la richiesta finale di inserimento nel database (questa è prevista dal sistema auth di base)

-------------------------

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Learning Laravel

Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
