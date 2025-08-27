<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\View\View;

class PostThumbnail extends Component
{
    public string $thumbnail;
    public string $alt;
    public string $class;

    public function __construct(string $thumbnail = '', string $alt = '', string $class = '')
    {
        $this->thumbnail = $thumbnail;
        $this->alt = $alt;
        $this->class = $class;
    }

    public function render(): View|Closure|string
    {
        return view('components.post-thumbnail');
    }
}
