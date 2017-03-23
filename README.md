# TARLÀ - API REST central - HackathonGi 2017 #

La API central està creada amb el micro-framework PHP open source [Slim](https://www.slimframework.com/)

Els "drivers" o dispositius externs, es defineixen al fitxer src/tarla_devices.php amb el format "nom"=>"url"

## Mètode Principal devices/ ##

El mètode principal de TARLÀ es: devices/{nom_device}/cmds/{acció}?param1=val1&param2=val2...
Quan rep una crida GET, la transmet a la URL del dispositiu {nom_device} amb els paràmetres especificats.

Retorna el HTTP_BODY i HTTP_STATUS original que ha emès la API del dispositiu

## Instalació i proves ##

Un cop fet checkout d'aquest repositori, fer accessible per el servidor web el directori /public

Per exemple, si fem el directori /public accessible a través del servidor web mitjançant la URL http://localhost:888/tarla , podem probar el dispositiu per defecte "bombeta" des de un browser: http://localhost:8888/tarla/devices/bombeta/cmds/on 

