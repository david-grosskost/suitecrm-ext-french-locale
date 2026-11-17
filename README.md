# Locale française

Extension SuiteCRM 8 : le CRM parle français correctement, et compte en euros.

Le pack de langue français de SuiteCRM laisse des centaines de libellés en anglais, souvent
aux endroits les plus visibles — en-têtes de colonnes, boutons, listes déroulantes. Cette
extension les complète, et applique les usages français à son installation.

## Ce qu'elle apporte

**2 672 libellés traduits**, répartis en un fichier par module plus un fichier commun à
toute l'application. SuiteCRM les assemble à la réparation rapide : ils viennent par-dessus
le pack, sans le modifier.

**Les usages français**, écrits une fois dans la configuration à l'installation :

| Réglage | Valeur |
|---|---|
| Langue par défaut | français, sans choix de langue sur la page de connexion |
| Dates et heures | `31/12/2026 23:59` |
| Monnaie | euro, deux décimales |
| Nombres | `1 234,56` — virgule décimale, espace pour les milliers |
| Exports CSV | point-virgule, pour qu'ils s'ouvrent dans un Excel français |

Ces réglages appartiennent ensuite à l'administrateur : il les change dans
l'administration, et une version suivante de l'extension ne les repose pas. Les langues
déjà proposées par l'instance sont gardées — un pack installé à côté ne disparaît pas.

La désinstallation ne touche à rien : sans l'extension, l'instance reste en français avec
les libellés du pack, dont une partie en anglais.

## Ce qu'elle n'apporte pas

Le **pack de langue** lui-même, qui est installé par l'image de suitecrm-core. Cette
extension le complète, elle ne le remplace pas.

Les libellés des **gabarits `SugarObjects`** (les objets dont héritent les modules) et ceux
de l'**installateur**, qui restent dans suitecrm-core : le mécanisme d'extension de
SuiteCRM ne couvre ni `include/SugarObjects/`, ni les écrans affichés avant qu'une
extension existe.

## Compléter une traduction

Un libellé encore en anglais se corrige dans le fichier du module concerné,
`legacy/Extension/modules/<Module>/Ext/Language/fr_FR.french-locale.php`, ou dans
`legacy/Extension/application/Ext/Language/fr_FR.french-locale.php` pour un libellé commun.
Une ligne par libellé :

```php
$mod_strings['LBL_TYPE'] = 'Type :';
$app_list_strings['account_type_dom']['Analyst'] = 'Analyste';
```

Pour trouver ce qui manque encore, `make i18n@missing` dans suitecrm-core liste les
libellés restés en anglais sur une instance qui tourne.

Les règles : vouvoiement ; espace avant `:`, `?`, `!` et `;` ; `%s`, `{0}`, balises HTML et
noms de variables gardés tels quels ; apostrophes échappées (`'l\'opportunité'`), sauf dans
un libellé repris en JavaScript où l'apostrophe typographique `’` évite l'échappement.

## Vérifier

```bash
make extension@validate   # format : manifeste, composer.json, place des fichiers
make quality@lint         # style du code, scripts
make quality@stan         # analyse statique (PHPStan, niveau max)
make test@unit            # tests unitaires (PHPUnit)
```

Les fichiers de libellés sont des données : PHPStan ne les analyse pas, leur syntaxe est
vérifiée par le lint, qui lit chaque fichier.
