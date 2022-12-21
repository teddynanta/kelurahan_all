<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

use function PHPUnit\Framework\isNull;

class MenuController extends Controller
{
    public function getMenu()
    {
        $menus = MenuItem::where('menu_id', 2)->get();
        $dropdowns = MenuItem::where('menu_id', 2)->where('parent_id', '!=', null)->get();
        return view('navMenu', [
            'menus' => $menus,
            'dropdowns' => $dropdowns
        ]);
    }

    public function dump()
    {
        return view('menu');
    }
}
