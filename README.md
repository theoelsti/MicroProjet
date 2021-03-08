# MicroProjet | Mini station météo

###### tags: `ecole` `hardware` `web` `mysql` `python` `arduino` `raspberry`

## Introduction

### ☑️ Cahier des charges

- Affichage graphique en « temps réel » du taux d’humidité, de la température et de la température ressentie dans une interface web (toutes les xx minutes)
- Affichage graphique (courbes, histogrammes...) de l’historique par jour, par semaine & par mois des données
- Pouvoir avoir le choix du jour à afficher dans l’historique l’interface web
- Développement d’un simulateur de données brutes pour les tests
- Calcul des moyennes des différentes données acquises par jour, par semaine & par mois

### 🗣️ Organisation

Notre moyen de communication principal était [**Discord**](https://discord.com/invite/JcWXQjXfUX). Nous y avions une catégorie privée dédiée.
Le code est hebergé sur [GitHub](https://github.com/theoelsti/MicroProjet), cela a d'ailleurs permis à la totalité du groupe de se familiariser avec cet outil qui facilite le travail de groupe à distance.

### 👥Répartition des tâches

Le niveau du groupe étant très hétérogène, nous avons décidé de nous répartir les taches de facons à ce que chacun d'entre nous puisse s'entrainer à son niveau sur sa partie.

- Timothée s'est occupé de la page des moyennes
  - Il a pu solidifier ses compétences en html et css. Il a beaucoup aimé faire sa page et a trouvé cela très instructif
- Théophile a voulu améliorer ses compétenses en Php/Mysql/Javascript. Il s'est donc occupé de la page des graphiques
  - Il a pu élargir son bagage technique en terme de requetes de base de données et en php. Il a également beaucoup fais de JavaScript, un langage qu'il pratique de plus en plus.
- Jean-Gabriel s'est lui occupé de la page d'accueil.
  - Il a mis ses compétences en valeur et a appris à chercher de lui meme sur des forums lorsqu'il faisait face à un problème

### 🗺️Organisation du site

Ici vous est expliquée l'architecture du site.

#### 🏠 Page d'accueil

La page d'accueil `(index.html)` est une page sans dépendance exterieure. C'est à dire qu'elle ne nécéssite aucun code php ou valeurs de base `sql` pour fonctionner
inserer image

#### 📈 Page des graphiques

Cette page est le coeur du site. Elle comporte le graphique permettant de consulter les valeurs sur différentes échelles:

- Les 10 dernieres valeurs
- 24 heures
- 7 jours
- 31 jours
En plus de choisir l'échelle d'affichage, elle permet grâce à des boutons rangés dans un menu de séléction, d'avancer et de reculer dans le temps. A chaque séléction, la page s'actualise et sauvegarde votre choix d'échelle. Vous êtes prévenu si vous ne pouvez pas plus avancer ou reculer dans le temps

Un petit bouton de retour à 0 est présent en haut a droite de la page. Il vous permet de retourner aux résultats les plus récents.

Pour le confort des petits écrans, un bouton permettant de retourner en haut de la page apparaitera automatiquement lorsque l'utilisateur descendra sur la page.

##### Information à l'utilisateur

Une petite notification vous informe sur la connexion au serveur. Si vous êtes soudainement déconnecté, vous en serez averti sous 10 secondes

![Alerte de déconnexion](https://i.imgur.com/EhahlDQ.png)

En fonction de votre choix, une notification persistance vous informera également de la plage horaire des données affichées

![Plage horaire](https://i.imgur.com/khYrv7K.png)

##### 🏃‍♀️Performances

Pour son fonctionnement, cette page effectue plusieurs requetes sql et stock les résultats sous forme de tableau JavaScript.
Nous pensions au début que celle ci allait mettre beaucoup de temps à se charger, mais après 1 soirée d'optimisations, nous l'avons rendu ultra légère !

![Performances](https://i.imgur.com/klfOUAU.png)
> Seulement 73mo de ram, presque la motié de la page avant optimisation !
>
> Pour information, cette page demande + de 15 scripts et + de 5 feuilles de style

#### 🧮 Page des moyennes

Cette page est déstinée à consulter les moyennes des valeurs. Vous y trouverez :

- Le Nombre total de valeurs relevées
- La date du premier relevé
- Des moyennes par semaine et par mois

### Mise en fonctionnement

#### Page web

Afin d'acceder aux pages web, il suffit de lancer un serveur php dans le dossier du site

```sh=1
cd Raspberry/SiteWeb/
```

```sh=1  
php -S <ip>:4000
```

Il ne vous reste plus qu'à vous rendre sur votre navigateur favori et d'acceder à la page d'accueil via cette adresse :

**ip:4000/accueil.html**

Votre serveur **Web** est désormais prêt.

##### Base de données

Il ne vous reste plus qu'à choisir :
Obtenir des valeurs réelles ou simulées pour avoir un acces à tous les graphiques immédiatement

###### Choix 1: Simulation

Pour faire cela, vous aurez besoin de 2 éléments !

- 1 serveur Mysql/Mariadb
- Le script "[`generateur.py`](https://github.com/theoelsti/MicroProjet/blob/master/RaspBerry/Python/generateur.py)"

1) Commencez par créer dans votre serveur une base nommées "relevés".
2) Modifiez le script avec vos identifiants (lignes 7-8)

```py=5
[...]
DB_SERVER ='localhost'
DB_USER='root'  #Votre identifiant   
DB_PWD='root'   #Votre mot de passe
[...]
```

vous n'avez plus qu'à executer le script

```sh=1
python3 generateur.sql
```

Et voilà

###### Choix 2 : Données réelles

Cette étape nécéssite:

- Une carte arduino
- 1 capteur [DHT22](https://wiki.seeedstudio.com/Grove-Temperature_and_Humidity_Sensor_Pro/)

1) Apres avoir branché votre capteur sur le port 10, téléversez [code.ino](https://github.com/theoelsti/MicroProjet/blob/master/Arduino/code/code.ino) sur votre arduino
2) Coté raspberry, executez le script[receiveSerial.py](https://github.com/theoelsti/MicroProjet/blob/master/RaspBerry/Python/receiveSerial.py)

Le script va s'occuper de créer la table, ainsi que de la vider si déja existante

## Conclusion

Et voilà, vous êtes fin prêt à utiliser cette super station météo ! Pour plus de confort, nous allons améliorer le coté Automatisé, et effectuer tout le processur au lancement de la Raspberry !

#### Fadeath | StormBreaker | Ztix
