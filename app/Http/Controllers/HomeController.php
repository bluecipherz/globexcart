<?php namespace App\Http\Controllers;

use App\Category;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $root = Category::whereIsRoot()->first();

        $vlimit = 11; // vertical limit
        $hlimit = 2; // horizontal limit

        $catarray = [];

        $counter = 0; // vertical limit counter
        echo 'point1';
        foreach($root->children->all() as $cat) {
            echo 'point2';
            if($counter > $vlimit) break;
            $catarray[$counter] = function($cat) {
                echo 'point3';
                $subcatarray = [];
                $subcatarray['name'] = ['title' => $cat->name]; // the main category
                $subcatarray['children'] = function($cat, $hlimit) { // get three columns
                    echo 'point4';
                    $postcatarray = [];
                    $subcats = $cat->children->all();
                    for($i = 0; $i < $hlimit; $i++) { // the three loops
                        echo 'point5';
                        $postcatarray[$i] = function($subcats) { // get column
                            echo 'point6';
                            return $subcats->children->all();
                        };
                    }
                    return $postcatarray;
                };
                return $subcatarray;
            };
            $counter++;
        }




		$navItemName = Category::all();
		//$navItems = DB::table('subcategories')->get();
							
		$navItems = array(
			array(
				"Used Cars for Sale",
				"Boats",
				"Heavy Vehicles",
				"Motorcycles"
			),
								
			array(
				"Apparel , Merchandise & Accessories",
				"Automotive Tools"
			),
				
			array(
				"Boat parts",
				"Car Parts",
				"Motorcycle Parts"
			),
				
			array(
				"Cat 5 - 1",
				"Cat 5 - 2",
				"Cat 5 - 3"
			),
				
			array(
				"Cat 6 - 1",
				"Cat 6 - 2",
				"Cat 6 - 3"
			),
				
			array(
				"Cat 7 - 1",
				"Cat 7 - 2",
				"Cat 7 - 3"
			),
				
			array(
				"Cat 8 - 1",
				"Cat 8 - 2",
				"Cat 8 - 3"
			),
				
			array(
				"Cat 9 - 1",
				"Cat 9 - 2",
				"Cat 9 - 3"
			),
				
			array(
				"Cat 10 - 1",
				"Cat 10 - 2",
				"Cat 10 - 3"
			),
				
			array(
				"Cat 11 - 1",
				"Cat 11 - 2",
				"Cat 11 - 3"
			),
				
			array(
				"Cat 12 - 1",
				"Cat 12 - 2",
				"Cat 12 - 3"
			),	
			
			array(
				"shbi",
				"Rinoy",
				"shaaji 1 - 3",
				"Rinoy",
				"Rinoy",
				"Rinoy"
			)
		);

		$navItemsCont = array(
			array(
				array("AUDI", "BMW", "Ford","Land Rover", "Mercedes-Benz","Land Rover", "Mercedes-Benz" ),
				array("MotorBoats", "Row/Paddle Boats", "Sail Boats"),
				array("Buses", "Cranes", "Forklifts","Trailers", "Trucks", "Tankers", "Parts & Engine"),
				array("Cruiser/Chopper", "Mo-Ped", "Off-Road/Dual Purpose","Scooter", "Sport Bike", "Standard Motorcycle","Touring", "Trike")
			),
			array(
				array("Apparel", "Boat Accessories", "Car / 4x4 Accessories","Merchandise", "Motorcycle Accessories"),
				array("Tool Accessories", "Tool sets", "Tools")
			),
			array(
				array("Body parts & Accessories", "Engine Parts", "Plumbing & Ventilation" ),
				array("A/C & Heating Parts", "Batteries", "Brakes","Engine & Computer Parts", "Exhaust/Air Intake","Exterior Parts","Interior Parts","Lighting","Suspension","Wheels/Tires"),
				array("Accessories", "Body & Frames", "Engines & Components","Lighting",  "Wheels/Tires","Number Plates")
			),
			array(
				array("item1", "item2", "item3","item4", "item5"),
				array("item1", "item2", "item3","item4", "item5"),
				array("item1", "item2", "item3","item4", "item5")
			),
			array(
				array("item1", "item2", "item3","item4", "item5"),
				array("item1", "item2", "item3","item4", "item5"),
				array("item1", "item2", "item3","item4", "item5")
			),
			array(
				array("item1", "item2", "item3","item4", "item5"),
				array("item1", "item2", "item3","item4", "item5"),
				array("item1", "item2", "item3","item4", "item5")
			),
			array(
				array("item1", "item2", "item3","item4", "item5"),
				array("item1", "item2", "item3","item4", "item5"),
				array("item1", "item2", "item3","item4", "item5")
			),
			array(
				array("item1", "item2", "item3","item4", "item5"),
				array("item1", "item2", "item3","item4", "item5"),
				array("item1", "item2", "item3","item4", "item5")
			),
			array(
				array("item1", "item2", "item3","item4", "item5"),
				array("item1", "item2", "item3","item4", "item5"),
				array("item1", "item2", "item3","item4", "item5")
			),
			array(
				array("item1", "item2", "item3","item4", "item5"),
				array("item1", "item2", "item3","item4", "item5"),
				array("item1", "item2", "item3","item4", "item5")
			),
			array(
				array("item1", "item2", "item3", "item4", "item5"),
				array("item1", "item2", "item3", "item4", "item5"),
				array("item1", "item2", "item3", "item4", "item5")
			),
			array(
				array("item1", "item2", "item3", "item4", "item5"),
				array("item1", "item2", "item3", "item4", "item5"),
				array("item1", "item2", "item3", "item4", "item5"),
				array("item1", "item2", "item3", "item4", "item5"),
				array("item1", "item2", "item3", "item4", "item5"),
				array("item1", "item2", "item3", "item4", "item5")
			)
		);
		$data = array('navItemName' => $navItemName, 'navItems' => $navItems, 'navItemsCont' => $navItemsCont);
		return view('home', $data);
	}
	
	public function hell() {
        $root = Category::whereIsRoot()->first();

	}

}
