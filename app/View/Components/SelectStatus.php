<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectStatus extends Component
{
    public array $options = [];
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value)
    {
        $this->options = [
         1 => 'Open',
         2 => 'Wait',
         3 => 'Close',
         4 => 'Cancel',
        ];
        if(is_array($value)){
            $this->value = (int)$value['status'][0];
        }else{
            $this->value = $value;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $options = $this->options;
        return view('components.select-status', compact('options'));
    }
}
