# Fonctionnement

## Fichiers

| Fichier | Rôle |
|---|---|
| `legacy/Extension/modules/<Module>/Ext/Language/fr_FR.french-locale.php` | les libellés d'un module (110 modules) |
| `legacy/Extension/application/Ext/Language/fr_FR.french-locale.php` | les libellés et listes communs à l'application (`$app_strings`, `$app_list_strings`) |
| `legacy/include/french-locale/Settings.php` | les usages français, tels qu'ils sont écrits dans la configuration |
| `database/install.php` | les écrit à l'installation |
| `tests/` | tests des réglages |

SuiteCRM assemble les fichiers de libellés à la réparation rapide, après ceux du pack : une
ligne de l'extension remplace la même clé du pack.

## Données en base

Aucune. Les usages sont écrits dans la configuration de l'instance (`config_override.php`,
par l'outil de configuration de SuiteCRM).

## Installation et désinstallation

- **Installation** (`database/install.php`, une seule fois) : écrit les usages français dans
  la configuration. Les langues déjà proposées par l'instance sont gardées : un pack installé à
  côté ne disparaît pas.
- **Désinstallation** : ne touche à rien. Sans l'extension, l'instance reste en français, avec
  les libellés du pack, dont une partie en anglais.

## Points d'attention

- Les fichiers de libellés sont des données : PHPStan ne les analyse pas, leur syntaxe est
  vérifiée par le lint, qui lit chaque fichier.
- Le script d'installation renvoie son message au lieu de l'afficher : le scanner du Chargeur
  de module refuse `echo`.
