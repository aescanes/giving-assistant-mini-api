# Giving Assistant assessment - coding

## Requirements
* Docker

## Create local image
```bash
docker build -t ga .
```

## Usage (to run the code in a docker container)

```bash
docker run -p 8008:80 --name ga_container -t ga
```

## Run tests
This command will create a temporary container and will run all the unittests.

```bash
docker run --rm -t ga ./vendor/bin/phpunit --testdox
```

## Endpoints

### Categories

Get all categories
```
GET - http://0.0.0.0:8008/categories
```
Get category by id
```
GET - http://0.0.0.0:8008/categories/1
```
Get all merchants by category id
```
GET - http://0.0.0.0:8008/categories/1/merchants
```

### Merchants

Get all merchants
```
GET - http://0.0.0.0:8008/merchants
```
Get marchant by id
```
GET - http://0.0.0.0:8008/merchants/1
```

Also the code has POST/PUT/DELETE endpoints for Categories and Merchants

## Considerations

