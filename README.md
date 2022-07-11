# Api-Anime

[![forthebadge](http://forthebadge.com/images/badges/built-with-love.svg)](https://github.com/Hikyy)  [![forthebadge](http://forthebadge.com/images/badges/powered-by-electricity.svg)](https://linkedin.com/in/rayane-mabrouki/)

## Présentation

A la demande de Tylto, j'ai crée cette Api.

Je remercie [@Victor_Gambert](https://fr.linkedin.com/in/victor-gambert-b5792759) d'avoir permis que je choissise le sujet !

### Pourquoi avoir choisis la thématique des Animés ?

Il existe de nombreuses API d'Anime tel que : https://jikan.moe/ avec lequel j'ai effectué plusieurs projets, mais je n'ai pas trouvé une qui réponde à mes besoins, alors j'ai décidé d'en créer une sur les Animés.

## Pré-requis

- Désactiver temporairement son Anti-virus, sinon l'envoie de mail ne s'effectuera pas.

- Téléchager le projet.

- Avoir Mamp ou Xamp sur votre ordinateur, et avoir changer la route (destination) vers là où se trouve le projet.
<img style="margin:15%;" src="http://image.noelshack.com/fichiers/2022/27/7/1657481510-mamp.png" width="450" >

- Avoir au minimun la version 8.1.7 de PHP (Au niveau du cmd, faire la commande php -v pour connaitre sa version)

<img src="http://image.noelshack.com/fichiers/2022/27/7/1657480974-cmd.png" width="450" >

•   Modifier son fichier php.ini, il est dans le dossier C:\MAMP\conf\php8.1.0\
    Dans ce fichier ci, il faut supprimer les commentaires ';' des ligne :

    'extension=pdo_mysql'
    'extension=fileinfo'
    'extension=openssl'

 Il est nécessaire **d'installer Composer** pour exécuter le projet :
 
 [Site Officiel pour télécharger Composer](https://getcomposer.org/download/)
 
 [Documentation sur l'installation de Composer pour Mamp](https://documentation.mamp.info/en/MAMP-PRO-Windows/How-Tos/General/SetupComposer/#:~:text=Install%20Composer&text=Click%20on%20the%20%E2%80%9CComposer-Setup,be%20guided%20through%20the%20installation)
 
 À la suite de cela faites : `composer -v`
 
 Si le terminal, affiche une erreur malgré que vous avez modifiez les 3 lignes dans le php.ini, suivez ce tutoriel : 
 
 [Tutoriel](https://devanswers.co/install-composer-php-windows-10/)
 
 ## Démarrage du projet :
 
 Petite information à prendre en compte :
 
 > Dans le cas où vous comptez modifier le projet et l'adapter à vos goût, si vous voyez que vos modification ne sont pas pris en compte, alors effectuer les commandes suivantes :
 
  `php artisan cache:clear`
 
  `php artisan route:clear`
 
  `php artisan config:clear`
 
  `php artisan view:clear`
 >Fin de la parenthèse

- Avoir lancer Mamp.

Depuis le terminal ou depuis Mamp, 
- Dans le dossier **laravel_rest_api**, appuyez sur la touche shift de votre clavier et puis faites un clique droit, ensuite sélectionner `Ouvrir dans le terminal`
<img src="http://image.noelshack.com/fichiers/2022/28/1/1657493837-cmd-projet.png" width="550" >

 À partir du terminal, faites : `php artisan serve` 
 
 Pour les personnes qui utiliserai Postman, la configuration de l'api est disponible, il suffira d'aller dans le dossier Postman et d'importer le fichier `Api.postman_collection`.
 
 ## Consigne
 
 | Consigne        | Réussite           | Annotation  |
| ------------- |:-------------:| :-----:|
| La dernière version du framework Laravel doit être utilisée      | ✔ |V_9.19.0 |
| Les réponses de l’API doivent être renvoyées en JSON      | ✔      |    |
| Les quatre verbes GET, POST, PATCH et DELETE doivent être utilisées | ✔      | <ul><li>**GET** :   /api/product</li><li>**GET** :  /api/product/`{id}`</li><li>**POST** :   /api/addAnime?title=`Exemple`&Synopsis=`Exemple`&Score=`Exemple`&Image=`Exemple`</li><li>**PATCH :**  /api/updateAnime/`{id}`?title=`Exemple`&Synopsis=`Exemple`&Score=`Exemple`&Image=`Exemple`</li><li>**DELETE :**  /api/deleteAnime/`{id}`</li></ul>  |
| L’application doit contenir au moins un modèle, une migration, un contrôleur, une ressource API, un form request et un test | ✔      | <ul><li>**Modèle** : laravel_rest_api\App\Models\Product;</li><li>**Migration** : laravel_rest_api\database\migrations</li><li>**Contrôleur** : laravel_rest_api\App\Http\Controllers\AnimeController;</li><li>**Ressource API** : laravel_rest_api\App\Http\Resources\AnimeResource;</li><li>**Form Request** : laravel_rest_api\App\Http\Requests\AnimeCheckGood</li><li>**Test** : laravel_rest_api\test\Feature\AnimeTest;</li></ul>   |
| Une notification déclenché par un évènement | ✔      |  <ul><li> laravel_rest_api\App\Mail\TestMail</li></ul>  |
| Une commande Artisan (qui fait plus qu’imprimer du texte) |       |    |
| La gestion d’un fichier uploadé (récupération et stockage) | ✔      | <ul><li>laravel_rest_api\App\Http\Controllers\AnimeController;</li></ul>   |
| Une petite description succincte du sujet que vous traitez doit être présente dans un fichier README.md à la racine | ✔      |    |
| L’application doit être entièrement fonctionnelle sans bug | ✔      |    |

Pour upload un fichier, il faut aller sur un navigateur et ajouter dans l'url `/file`
