Cette application est constituée  de deux parties

* La première partie sert à positionner l'article selon son état & un prix plancher. 
* Le deuxième sert à paramétrer l'application (gestion des états & des vendeurs).

Requirements
------------

  * PHP 7.*;
  * Mysql;
  * et [exigences habituelles de l'application Symfony][1].
  
Installation
------------
```bash
$ cd sellermania/
$ composer install
```
Initialisation de la base de données
------------
`php bin/console doctrine:fixtures:load`
* Cette commande permet d'inialiser la liste des 5 états de produits
 possible.  
1- «Etat moyen»  
2- «Bon état»,  
3- «Très bonétat»  
4- «Comme neuf»   
5- «Neuf».  
J'ai choisi cette maniére pour qu'on puisse manipuler dynamiquement la liste des états.  
        
* Ajouter des données de test (les 8 vendeurs mentionné) pour qu'on puisse tester l'application

Usage
------------
Il n'est pas nécessaire de configurer quoi que ce soit pour exécuter l'application. Exécutez simplement cette commande pour exécuter le serveur Web intégré et accéder à l'application dans votre navigateur à l'adresse <http://localhost:8000>:

```bash
$ symfony server:run
```
Vous pouvez également [configurer un serveur Web complet][2] comme Nginx ou Apache pour exécuter l'application.


[1]: https://symfony.com/doc/current/reference/requirements.html
[2]: https://symfony.com/doc/current/cookbook/configuration/web_server_configuration.html