<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class NavBar extends Component
{
    private $categories;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $categories = Category::select('id', 'title')->latest()->get();

        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-bar', ['categories' => $this->categories]);
    }
}
