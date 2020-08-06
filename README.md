# Giving Assistant assessment - coding

This is a mini API as an example with `Category` and `Merchants` entities and all their endpoints (GET/POST/PUT/DELETE). This API doesn't have any authentication because the object is only showing a working API.

All the step to 

## Requirements
* git
* Docker

## Instalation
Clone the repository
```bash
git clone https://github.com/alejandroescanes/giving-assistant.git
cd giving-assistant
```

## Create local image
This command will create a local image which will be used to create the container. This step could take some time because will run `composer install` to create a functional image.
```bash
docker build -t ga .
```

## Run unit tests
This command will create a temporary container and will run all the unit tests.

```bash
docker run --rm -t ga ./vendor/bin/phpunit --testdox
```

## Usage (to run the code in a docker container)
This commant will create the container where the api will run.
```bash
docker run -p 8008:80 --name ga_container -t ga
```

## Endpoints

### Categories

Get all categories
```
GET - http://0.0.0.0:8008/categories
```
Get category by id
```
GET - http://0.0.0.0:8008/categories/{id}
```
e.g. http://0.0.0.0:8008/categories/1

Get all merchants by category id
```
GET - http://0.0.0.0:8008/categories/{id}/merchants
```
e.g. http://0.0.0.0:8008/categories/1/merchants

### Merchants

Get all merchants
```
GET - http://0.0.0.0:8008/merchants
```
Get marchant by id
```
GET - http://0.0.0.0:8008/merchants/{id}
```
e.g. http://0.0.0.0:8008/merchants/1

Also the code has POST/PUT/DELETE endpoints for Categories and Merchants that you can try. The body for POST AND PUT endpoints are:

Category
```json
{
    "name": "This is the name"
}
```

Merchant
```json
{
    "name": "This is the name",
    "category_id": 1
}
```

## Alternative path
If you have any issues with the docker image you can run this alternative commands to get the api working.

## Instalation
```bash
composer install
```

## Run unit tests
```bash
./vendor/bin/phpunit --testdox
```

## Usage
```bash
php artisan migrate:fresh --seed
php -S 0.0.0.0:8008 -t public
```


