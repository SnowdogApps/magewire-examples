<?php

namespace Snowdog\MagewireExamples\Magewire;

use Magewirephp\Magewire\Component;

class Counter extends Component
{
    public $count = 100;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }
}
