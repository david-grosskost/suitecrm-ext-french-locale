<?php

declare(strict_types=1);

namespace SuiteCrmExt\FrenchLocale\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use SuiteCrmExt\FrenchLocale\Settings;

#[CoversClass(Settings::class)]
final class SettingsTest extends TestCase
{
    public function testAppliesTheFrenchSettingsToAnEmptyConfiguration(): void
    {
        $config = Settings::applyTo([]);

        self::assertSame('fr_FR', $config['default_language']);
        self::assertSame('d/m/Y', $config['datef']);
        self::assertSame('H:i', $config['timef']);
        self::assertSame('EUR', $config['default_currency_iso4217']);
        self::assertSame(',', $config['default_decimal_seperator']);
        self::assertSame(' ', $config['default_number_grouping_seperator']);
        self::assertSame(';', $config['export_delimiter']);
        self::assertFalse($config['login_language']);
    }

    public function testKeepsTheSettingsTheExtensionDoesNotOwn(): void
    {
        $config = Settings::applyTo(['site_url' => 'https://crm.example.fr', 'datef' => 'Y-m-d']);

        self::assertSame('https://crm.example.fr', $config['site_url']);
        self::assertSame('d/m/Y', $config['datef'], 'un réglage de langue est repris');
    }

    public function testOffersFrenchAndEnglish(): void
    {
        $languages = Settings::applyTo([])['languages'];

        self::assertSame(['en_us' => 'English (US)', 'fr_FR' => 'Français (France)'], $languages);
    }

    public function testKeepsALanguagePackTheInstanceAlreadyDeclares(): void
    {
        $languages = Settings::applyTo(['languages' => ['de_DE' => 'Deutsch']])['languages'];

        self::assertIsArray($languages);
        self::assertArrayHasKey('de_DE', $languages, 'un pack installé à côté reste proposé');
        self::assertArrayHasKey('fr_FR', $languages);
        self::assertArrayHasKey('en_us', $languages);
    }

    public function testNamesNoSettingTwice(): void
    {
        $values = Settings::values();

        self::assertSame(array_unique(array_keys($values)), array_keys($values));
        self::assertArrayNotHasKey('languages', $values, 'les langues se fusionnent, elles ne s’écrasent pas');
    }
}
