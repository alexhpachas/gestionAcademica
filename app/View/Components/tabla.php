<?php

namespace App\View\Components;

use App\Models\admin\intranet\gestion_academica\Entidade;
use App\Models\admin\intranet\gestion_academica\Template;
use Illuminate\View\Component;

class tabla extends Component
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $templates = Template::query();
        $templates = $templates->first();
        return view('components.tabla',compact('templates'));
    }
}
