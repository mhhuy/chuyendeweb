<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainMenu extends Component
{
    public function __construct()
    {
        //
    }
    public function render(): View|Closure|string
    {
        $args = [
            ['status', '=', 1],
            ['position', '=','mainmenu'],
            ['parent_id', '=',0]
        ];
        $menus = Menu::where($args)->orderBy('sort_order','DESC')->get();
        return view('components.main-menu', compact('menus'));
    }
}
