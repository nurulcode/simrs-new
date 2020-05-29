<?php

namespace Tests\Feature\Layanan;

use Tests\TestCase;
use Sty\Tests\ResourceControllerTestCase;

class PemeriksaanControllerTest extends TestCase
{
    use ResourceControllerTestCase;

    public function resource()
    {
        return \App\Models\Layanan\Pemeriksaan::class;
    }
}
