<?php

use Hebinet\BladeHelpers\Directives;
use PHPUnit\Framework\TestCase;

class IncludeOnceTest extends TestCase
{
    public function testIncludeOnce()
    {
        $this->assertEquals(Directives::checkIfNotIncluded('testView'), true);
        $this->assertEquals(Directives::checkIfNotIncluded('testView'), false);

        $this->assertEquals(Directives::checkIfNotIncluded('testNewView', ['data']), true);
        $this->assertEquals(Directives::checkIfNotIncluded('testNewView', ['data']), false);

        $this->assertEquals(Directives::checkIfNotIncluded('testNewerView', ['data'], 'parameter'), true);
        $this->assertEquals(Directives::checkIfNotIncluded('testNewerView', ['data'], 'parameter'), false);
    }

    public function testCompilation()
    {
        $directives = new Directives();

        $expression = '\'include-test\', [\'data\'=>2]';
        $this->assertStringContainsString(
            'checkIfNotIncluded(\'include-test\'',
            $directives->compileIncludeOnce($expression)
        );
        $this->assertStringContainsString(
            'checkIfNotIncluded(\'include-test\'',
            $directives->compileIncludeOnce("({$expression})")
        );
    }

}