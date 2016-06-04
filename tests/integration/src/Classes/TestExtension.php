<?php

namespace Tests\Integration\Classes;

use Arachne\DIHelpers\DI\IteratorResolversExtension;
use Arachne\DIHelpers\DI\IteratorsExtension;
use Arachne\DIHelpers\DI\ResolversExtension;
use Arachne\DIHelpers\CompilerExtension;
use Nette\Utils\AssertionException;
use Nette\Utils\Validators;

/**
 * @author Jáchym Toušek <enumag@gmail.com>
 */
class TestExtension extends CompilerExtension
{
    public function loadConfiguration()
    {
        $this->getExtension(ResolversExtension::class)->add('foo', 'ArrayObject');
        $this->getExtension(IteratorsExtension::class)->add('foo', 'ArrayObject');
        $this->getExtension(IteratorResolversExtension::class)->add('foo', 'ArrayObject');
    }

    public function beforeCompile()
    {
        $this->getExtension(ResolversExtension::class)->get('foo');
        $this->getExtension(IteratorsExtension::class)->get('foo');
        $this->getExtension(IteratorResolversExtension::class)->get('foo');
    }
}
