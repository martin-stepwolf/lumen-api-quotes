# Lumen Api Quotes

_API to get your favorites quotes._

### Project goal by martin-stepwolf :goal_net:

Personal project to learn Lumen and the fundamentals about API REST. 

## Getting Started :rocket:

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites :clipboard:

The programs you need are:

-   [Docker](https://www.docker.com/get-started).
-   [Docker compose](https://docs.docker.com/compose/install/).

### Installing 🔧

First duplicate the file .env.example as .env.

```
cp .env.example .env
```

Note: You could change some values, anyway docker-compose create the database according to the defined values.

Create the image (php:7.4-composer-npm) and run the services (php, nginx and mysql):

```
docker-compose up
```

Note: The next steps can be automated bu running

```
sh install.sh
```

Then install the dependencies.

```
docker-compose exec app composer install
```

Finally generate the database with fake data:

```
docker-compose exec app php artisan migrate --seed
```

Note: You could refresh the database any time with migrate:refresh.

And now you have all the environment, the nginx server is in the port 8000 (e.g http://127.0.0.1:8000/).

## Built With 🛠️

-   [Lumen 8](https://lumen.laravel.com/docs/8.x) - PHP framework.

## Authors

-   Martín Campos [martin-stepwolf](https://github.com/martin-stepwolf)

## Contributing

You're free to contribute to this project by submitting [issues](https://github.com/martin-stepwolf/lumen-api-quotes/issues) and/or [pull requests](https://github.com/martin-stepwolf/lumen-api-quotes/pulls).

## License

This project is licensed under the [MIT License](https://choosealicense.com/licenses/mit/).

## References :books:

- [API REST with Laravel course](https://platzi.com/clases/laravel-api/)
