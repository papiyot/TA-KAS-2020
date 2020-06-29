<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Helpers\Helper;
class Saldo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        Session(['saldo' => Helper::saldo()]);
        return view('components.saldo');
    }
}
