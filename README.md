# JARVIS - API REST central - HackathonGi 2017 #

La API central està creada amb el micro-framework PHP open source [Slim](https://www.slimframework.com/)

Els "drivers" o dispositius externs, es defineixen al fitxer src/jarvis_devices.php amb el format "nom"=>"url"

## Mètode Principal devices/ ##

El mètode principal de JARVIS es: devices/{nom_device}/{param1}/{param2}...
Quan rep una crida GET, la transmet a la URL del dispositiu {nom_device} amb els paràmetres especificats.

Retorna el HTTP_BODY i HTTP_STATUS original que ha emès la API del dispositiu

## Mètodes de test ##

Per ajudar al desenvolupament de drivers, la API central té els mètodes:

* /test/echo/{string} -> Retorna un HTTP 200 amb {string} al reponse body
* /test/error -> Retorna un error HTTP 400

## Dispositiu de test "dummy_device" ##

Hi ha un dispositiu "dummy" que internament utilitza el mètode de test echo.

Es pot fer servir per desenvolupar interfícies de comandes: /devices/dummy_device/{string} 
