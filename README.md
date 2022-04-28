```
App is accepts a post, get requests with geografical coordinates, redrects
them to Google Geocoding app and responses with human format of geografical
location. App writes handled info to the DB and can outputs it using region id or 
all stored info.
```

## To run app use docker. Up the services:
docker-compose up -d

## Go to the container
docker exec -it testa_php-apache_1 bash

## Modify .env file. Set  
GEOCODING_URL=https://maps.googleapis.com/maps/api/geocode/json (Or similar. Learn Geocoding docs)
GEOCODING_API_KEY=API_key

## Run migration (to create DB)
php artisan migrate

## Run http requests like thoes:
* This requests will find the location by geografical coordinates:
```
POST http://localhost:80/api/location/findout
Content-Type: application/json
Accept: application/json

{
  "latitude": "40.714224",
  "longitude": "-73.961452"
}

###
```  
* This request will find the another location by geografical coordinates:
```
POST http://localhost:80/api/location/findout
Content-Type: application/json
Accept: application/json

{
  "latitude": " 37.386051",
  "longitude": "-122.083855"
}

###

```

* This request will output all stored data:
```
GET http://localhost:80/api/locations
Accept: application/json

###
```

* This request will output stored info assigned to region
  with id = 1:
```
GET http://localhost:80/api/region/1
Accept: application/json

###
```

## Leave container and down the services if you are exit
press ctrl+d  
docker-compose down
