# Développement

Les commandes `make`, la CI et le format des extensions viennent de
[suitecrm-devkit](https://github.com/david-grosskost/suitecrm-devkit#documentation), à la
version de `composer.json`. Cette page ne décrit que ce qui est propre à l'extension.

## Compléter une traduction

Un libellé encore en anglais se corrige dans le fichier du module concerné,
`legacy/Extension/modules/<Module>/Ext/Language/fr_FR.french-locale.php`, ou dans
`legacy/Extension/application/Ext/Language/fr_FR.french-locale.php` pour un libellé commun.
Une ligne par libellé, ajoutée en fin de fichier :

```php
$mod_strings['LBL_TYPE'] = 'Type :';
$app_list_strings['account_type_dom']['Analyst'] = 'Analyste';
```

Pour trouver la clé d'un texte affiché, chercher ce texte dans l'image de suitecrm-core :

```bash
MSYS_NO_PATHCONV=1 docker run --rm --entrypoint bash suitecrm-core:dev -c \
  'grep -rnI --include=*.php "Texte affiché" /usr/src/suitecrm/public/legacy | grep -v /en_us'
```

Pour lister tout ce qui reste en anglais : `make i18n@missing` dans suitecrm-core.

### Règles d'écriture

- vouvoiement ;
- espace avant `:`, `?`, `!` et `;` ;
- `%s`, `{0}`, balises HTML et noms de variables gardés tels quels ;
- apostrophes échappées (`'l\'opportunité'`), sauf dans un libellé repris en JavaScript, où
  l'apostrophe typographique `’` évite l'échappement.

## Vérifier

```bash
make extension@validate && make quality@lint && make quality@stan && make test@unit
make package@build && make package@scan
```

## Tester sur une instance locale

Le plus rapide pour des libellés : copier les fichiers dans l'instance, puis réparer.

```bash
MSYS_NO_PATHCONV=1 docker cp legacy/Extension/. suitecrm-core-app:/var/www/html/public/legacy/custom/Extension/
MSYS_NO_PATHCONV=1 docker exec suitecrm-core-app chown -R www-data:www-data /var/www/html/public/legacy/custom/Extension
cd ../suitecrm-core && make app@repair
```

Recharger avec Ctrl+F5 et vérifier les libellés, puis `make test@regression` (il échoue sur
toute clé de libellé brute affichée).

## Publier une version

Pull request relue, puis merge (squash) : release-please ouvre la pull request
« chore(main): release x.y.z ». La merger crée le tag, la release et son paquet.
suitecrm-core la récupère avec
`make composer@update PACKAGES="david-grosskost/suitecrm-ext-french-locale"`.

Mettre à jour `README.md` et `docs/` dans la même pull request que le changement qu'ils
décrivent.
