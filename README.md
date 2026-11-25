# Locale française (`french-locale`)

Le CRM parle français correctement, et compte en euros. Le pack de langue français de
SuiteCRM laisse des centaines de libellés en anglais, souvent aux endroits les plus visibles
(en-têtes de colonnes, boutons, listes déroulantes) : cette extension les complète, et pose
les usages français (dates, euro, nombres, exports CSV) à son installation.

| Fiche | |
|---|---|
| Version de SuiteCRM | 8.10 (`>=8.10 <9`) |
| Types | `lang` |
| Dépend de | le pack de langue français, installé par l'image de suitecrm-core |
| Installée d'office | **oui**, sur toute nouvelle instance (`required-extensions` de suitecrm-core) |

## Installer

Rien à faire : suitecrm-core l'installe d'office sur toute nouvelle instance. Elle apparaît
ensuite dans **Administration → Chargeur de module** comme les autres, et se met à jour avec
l'image.

## Documentation

| Page | Contenu |
|---|---|
| [Utilisation](docs/utilisation.md) | les libellés complétés, les usages français posés à l'installation |
| [Fonctionnement](docs/fonctionnement.md) | fichiers de libellés, réglages, ce que l'extension ne couvre pas |
| [Développement](docs/developpement.md) | compléter une traduction, règles d'écriture, vérifier, publier |

Les commandes, la CI et le format des extensions sont décrits dans la documentation de
[suitecrm-devkit](https://github.com/david-grosskost/suitecrm-devkit#documentation).
