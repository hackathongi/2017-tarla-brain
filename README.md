# TARLÀ - API central - HackathonGi 2017 #

## Descripcio ##

La API central està creada amb el micro-framework PHP open source [Slim](https://www.slimframework.com/)
Aquest "cervell" central, escola comandes via HTTP, i les redirigeix als drivers.

Els "drivers" (o dispositius externs), son responsables de rebre comandes a través del cervell central i actuar en consonància. Per exemple, el dispositiu "bombeta" ha de ser capaç d'encendre un llum quan rebi la comanda "on"

Els dispositius es defineixen al fitxer src/tarla_devices.php amb el format "nom"=>"url". Aquesta URL especifica la forma de comunicació que suporta, la cual pot ser de 2 tipus:

* URL amb prefix http:// -  El dispositiu té un servidor web que escolta comandes via protocol http
* URL amb prefix tcp://  - El dispositiu té un socket escoltant comandes via protocol tcp


## Mètode Principal devices/ ##

El mètode principal de TARLÀ es: devices/{nom_device}/cmds/{acció}?param1=val1&param2=val2...

Quan rep una crida HTTP GET, la transmet al dispositiu fent servir la URL configurada al fitxer src/tarla_devices.php. La petició es queda en espera fins que rep resposta del device, la cual es transmet en la seva forma original.

* Devices HTTP: la informació de la comanda es passa per la URL (query string).
* Devices socket TCP: Un cop establida la conexió, TARLÀ enviarà la comanda en forma de query string.


## Instalació i proves ##

Un cop fet checkout d'aquest repositori, s'ha de fer accessible el directori /public mitjançant un servidor web

Per exemple, si fem el directori /public accessible a través de http://localhost:888/tarla , podem probar el dispositius d'exemple:

* "bombeta_http": Accedint des de un browser a: http://localhost:8888/tarla/devices/bombeta_http/cmds/on
* "bombeta_socket": Accedit des del un browser a: http://localhost:8888/tarla/devices/bombeta_socket/cmds/on 

### Simular dispositius ###

*Simular dispositiu HTTP* 

Configurem un device al fitxer src/tarla_devices.php que apunti a una URL vàlida, per exemple:

```php
"http_test" => "http://google.com"
```

*Simular dispositiu Socket TCP*

Configurem un device al fitxer src/tarla_devices.php que apunti a una URL local, per exemple:

```php
"socket_test" => "tcp://localhost:5000"
```

En sistems osx o linux podem escoltar ports fàcilment amb la comanda nc:

```
$ nc -l localhost 5000
```

Un cop escoltant el socket, cridar a la URL de tarlà http://localhost:8888/tarla/devices/socket_test/cmds/prova
Veurem com ens envía la petició al socket, podent simular una responsta escrivint qualsevol cosa a la consola del nc i pulsant enter
