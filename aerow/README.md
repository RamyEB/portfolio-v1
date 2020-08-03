Le projet appelé AEROW tournera autour de la gestion d’un parc d’aviation dans un contexte aéroportuaire. 
Le but de ce projet est de simuler la communication et des échanges entre un avion et une tour de contrôle et de stocker les informations transmises afin qu’ils soient visibles et modifiables depuis des pages d’administration du personnel en charge de la gestion de l’aéroport. 

Serveur http: 
Apache24

Serveur BD :
postgresql

Language: 
PHP
CSS
HTML

Install du projet : 

Telecharger : Postgres, Apache, php
Configurer C:\Apache24\conf\httpd.conf : 
    LoadModule php7_module "c:/php/php7apache2_4.dll"
    AddHandler application/x-httpd-php .php
    #configure the path to php.ini
    PHPIniDir "C:/php"
    LoadFile "C:/Program Files/PostgreSQL/12/bin/libpq.dll"


Configurer C:\php\php.ini : 
    Décommenter les extension psql
    extension_dir = "chemin absolu"