<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class Pruebareporte extends TestCase
{
    /** @test */
    public function suma_dos_numeros_correctamente()
    {
        $resultado = 2 + 3;
        $this->assertEquals(5, $resultado);
    }
}
