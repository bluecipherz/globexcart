<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 16-Aug-15
 * Time: 5:34 AM
 */

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Product;
use App\Advertisement;
use App\Motor;
use DB;

class CoreComposer {

    protected $products;

    public function __construct()
    {
        $productQuery = Product::with('images')->select('id', 'title', 'description', 'price', DB::raw('0 as type'));
        $adQuery = Advertisement::with('images')->select('id', 'title', 'description','price', DB::raw('1 as type'));
        $motorQuery = Motor::with('images')->select('id', 'title', 'description','price', DB::raw('2 as type'));
        $this->products = $adQuery->get()->merge($productQuery->get())->merge($motorQuery->get());
    }

    public function compose(View $view)
    {
        $view->with('products', $this->products);
    }

}