<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 012 12.03.16
 * Time: 15:14
 */

namespace App\Http\Composers;


use App\Article;
use Illuminate\Contracts\View\View;

class NavigationComposer
{


    public function compose(View $view)
    {
        $view->with('latest', Article::latest()->published()->first());
    }
}