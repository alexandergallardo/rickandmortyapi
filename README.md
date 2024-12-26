# Desafío Técnico PHP

## About Repository
Explorar los personajes de Rick and Morty. 
Para este desafío se consume la siguiente API REST:
https://rickandmortyapi.com/documentation/#rest

## Tech Specification
- Laravel 8
- PHP 8.2.21

## Installation
- git clone https://github.com/alexandergallardo/rickandmortyapi.git
- cd rickandmortyapi/
- composer install
- cp .env.example .env
- Update `.env` and set your database credentials
- php artisan key:generate
- npm install
- php artisan serve
- Open in browser : http://127.0.0.1:8000/

## Unit Test
#### run PHPUnit
```bash
# run PHPUnit all test cases
vendor/bin/phpunit
# or Unit test only
vendor/bin/phpunit --testsuite Unit
```


## Requerimientos obligatorios implementados
- Vista de listado de personajes. http://127.0.0.1:8000/characters
- Campos mostrados: Id, Name, Status, Species, Gender, Image, Episodes
- Listado paginado.
- Buscar personajes por nombre.
- Se navega al detalle del personaje cuando se da click en el ID del mismo.
- Vista de detalle de personaje creada. http://127.0.0.1:8000/characters/1
- Del personaje se muestran los siguientes campos: name, status, species, image, type, gender, episodes

## Requerimientos opcionales implementados
- Filtrar personajes por gender, species y status.
- Test case. ( tests/Unit/Services/RickAndMortyApiServiceTest.php )
- Vista de detalle de episodio. http://127.0.0.1:8000/episodes/1
- Link desde el detalle de personaje a la vista detalle del episodio.

