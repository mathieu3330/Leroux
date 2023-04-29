<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Question extends Component
{
    public $question;
    public $number;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($question, $number)
    {
        $this->question = $question;
        $this->number = $number;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.question');
    }
}
