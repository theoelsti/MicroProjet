# MicroProjet | Mini station météo

###### tags: `ecole` `hardware` `web` `mysql` `python` `arduino`

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
En plus de choisir l'échelle d'affichage, elle permet grâce à des boutons rangés dans un menu de

![Performances](https://i.imgur.com/T40d59z.png)

#### Fadeath
