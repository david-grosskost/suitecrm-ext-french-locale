# Utilisation

## Ce qui change

**Les libellés.** Plus de 2 600 libellés que le pack français laisse en anglais sont
traduits, dans tous les modules et dans les textes communs à l'application. Ils viennent
par-dessus le pack, sans le modifier.

**Les usages français**, écrits une fois dans la configuration à l'installation :

| Réglage | Valeur |
|---|---|
| Langue par défaut | français, sans choix de langue sur la page de connexion |
| Dates et heures | `31/12/2026 23:59` |
| Monnaie | euro, deux décimales |
| Nombres | `1 234,56` : virgule décimale, espace pour les milliers |
| Exports CSV | point-virgule, pour qu'ils s'ouvrent dans un Excel français |

Chacun se connecte en français, puis peut choisir une autre langue proposée dans ses
préférences.

## Réglages

Les usages ci-dessus appartiennent à l'administrateur dès qu'ils sont posés : il les change
dans l'administration (**Paramètres système**, **Paramètres locaux**, **Devises**), et une
version suivante de l'extension ne les repose pas.

## Données de démo

Aucune.

## Limites

- Le **pack de langue** lui-même est installé par l'image de suitecrm-core : l'extension le
  complète, elle ne le remplace pas.
- Les libellés des gabarits `SugarObjects` et ceux de l'**installateur** restent dans
  suitecrm-core : le mécanisme d'extension de SuiteCRM ne les couvre pas.
- Le « Back To Top » du pied de page de SuiteCRM 8 est écrit en dur dans son template : aucune
  traduction ne l'atteint (correctif prévu dans upstream-fixes).
