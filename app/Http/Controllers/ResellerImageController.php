<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ImageRequest;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use Symfony\Component\HttpFoundation\JsonResponse;

class ResellerImageController extends Controller {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ImageRequest $request)
	{
        $images = Input::file('images');

		$destination = public_path() . '/uploads/temp/' . Session::getId();
        if(!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }
        Session::put('files', 0);
        foreach ($images as $image) {
//			$filename = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $filename = Session::get('files') + 1;
            $image->move($destination, $filename. '.' .$extension);
            Session::put('files', $filename);
        }
        // return JsonResponse::create(Input::all());
        return response(Session::getId());
	}


    public function dev() {
        $image = Input::file('image');
        // Merge the name of the file being uploaded into the Input array so it can be saved to the database.{}{}
        Input::merge(array('name' => $image->getClientOriginalName()));
        // Use the repository method "processPost" to populate and create a new instance of the model
        if ($this->imageRepository->processUpload(Input::all())) {
            // Fire an event to move the uploaded file to permanent storage
            Event::fire(new Upload($this->imageRepository));
            return response()->json(['status' => 'true', 'message' => 'Successfully uploaded']);
        }
    }


}
