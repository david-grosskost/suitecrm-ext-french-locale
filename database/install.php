<?php

// Install script of french-locale: writes the French settings (language,
// date and time formats, euro, number separators, CSV delimiter) into the
// instance's configuration. Run once, at the install of the extension, in
// SuiteCRM, as the administrator, from public/legacy.
// From then on these settings belong to the administrator: a later version of
// the extension does not write them again.

// Its message is returned, not printed (echo is refused by the scanner of
// the Module Loader): the caller shows it.

declare(strict_types=1);

use SuiteCrmExt\FrenchLocale\Settings;

require_once __DIR__ . '/../legacy/include/french-locale/Settings.php';
// SuiteCRM's own configuration writer: the current directory is public/legacy.
require_once getcwd() . '/modules/Configurator/Configurator.php';

$configurator = new Configurator();
$configurator->loadConfig();
$configurator->config = Settings::applyTo($configurator->config);
$configurator->handleOverride();

return 'french-locale : usages français appliqués (langue, dates, euro, séparateurs).';
