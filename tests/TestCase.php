<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Fortify\Features;

abstract class TestCase extends BaseTestCase
{
    protected function skipUnlessFortifyHas(string $feature, ?string $message = null): void
    {
        // Allow disabling registration tests via environment for CI or local troubleshooting
        if ($feature === Features::registration() && env('DISABLE_FORTIFY_REGISTRATION_TESTS', false)) {
            $this->markTestSkipped($message ?? 'Fortify registration tests disabled via DISABLE_FORTIFY_REGISTRATION_TESTS.');
        }

        if (! Features::enabled($feature)) {
            $this->markTestSkipped($message ?? "Fortify feature [{$feature}] is not enabled.");
        }
    }
}
