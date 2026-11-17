<?php

declare(strict_types=1);

namespace SuiteCrmExt\FrenchLocale;

/**
 * Les usages français d'une instance : langue, formats de date et d'heure,
 * monnaie, séparateurs de nombres, séparateur des exports CSV.
 *
 * Posés une fois, à l'installation de l'extension (database/install.php).
 * L'administrateur les change ensuite dans l'administration : une version
 * suivante de l'extension ne les repose pas.
 */
final class Settings
{
    /**
     * Les langues proposées. Celles déjà déclarées par l'instance sont
     * gardées : un pack installé à côté ne disparaît pas.
     *
     * @var array<string, string>
     */
    public const array LANGUAGES = [
        'en_us' => 'English (US)',
        'fr_FR' => 'Français (France)',
    ];

    /**
     * Les réglages, tels qu'ils sont écrits dans la configuration.
     *
     * @return array<string, mixed>
     */
    public static function values(): array
    {
        return [
            'default_language' => 'fr_FR',
            // Pas de choix de langue sur la page de connexion : tout le monde
            // se connecte en français, puis peut choisir l'anglais dans sa fiche.
            'login_language' => false,
            // Dates et heures : 31/12/2026 23:59
            'datef' => 'd/m/Y',
            'timef' => 'H:i',
            // Monnaie et nombres : 1 234,56 €
            'default_currency_iso4217' => 'EUR',
            'default_currency_name' => 'Euro',
            'default_currency_symbol' => '€',
            'default_currency_significant_digits' => '2',
            'default_decimal_seperator' => ',',
            'default_number_grouping_seperator' => ' ',
            // Les exports CSV s'ouvrent directement dans un Excel français
            'export_delimiter' => ';',
        ];
    }

    /**
     * La configuration de l'instance, une fois les usages français appliqués.
     *
     * @param array<string, mixed> $config
     *
     * @return array<string, mixed>
     */
    public static function applyTo(array $config): array
    {
        $applied = $config;
        foreach (self::values() as $name => $value) {
            $applied[$name] = $value;
        }
        $languages = $config['languages'] ?? null;
        $applied['languages'] = (is_array($languages) ? $languages : []) + self::LANGUAGES;

        return $applied;
    }
}
