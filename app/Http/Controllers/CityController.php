<?php

namespace App\Http\Controllers;

use App\Enums\ApiResponseEnum;
use App\Enums\HttpStatusCodeEnum;
use App\Http\ApiResponse\ApiResponseTrait;
use App\Http\Requests\CityRequest;
use App\Imports\CitiesImport;
use App\Interfaces\Eloquent\City\CityRepositoryInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CityController extends Controller {

    private $cityRepositoryInterface;

    use ApiResponseTrait;
    public function __construct(CityRepositoryInterface $cityRepositoryInterface) {
        $this->cityRepositoryInterface = $cityRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Retrieve filters from the request
        $data['name'] = request('name', '');
        $data['state'] = request('state', '');
        $data['country'] = request('country', '');
        $data['perPage'] = request('perPage', 10);

        // Call the repository to get index data
        $res = $this->cityRepositoryInterface->index($data);

        if($res) {
            return $this->successResponse($res, "retrive successfull");
        } else {
            return $this->errorResponse($res, HttpStatusCodeEnum::BAD_REQUEST);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $cityRequest) {
        $data = $cityRequest->validated();
        $res = $this->cityRepositoryInterface->store($data['cities']);
        if($res) {
            return $this->successResponse($res, "save successfull");
        } else {
            return $this->errorResponse($res, HttpStatusCodeEnum::BAD_REQUEST);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }

    public function cityFileUpload(Request $request) {
        $request->validate([
            'excel' => 'required|mimes:xls,xlsx,csv',
        ]);

        $file = $request->file('excel');
        $res = $this->cityRepositoryInterface->cityFileUpload($file);
        if($res) {
            return $this->successResponse($res);
        } else {
            return $this->errorResponse("Error", HttpStatusCodeEnum::BAD_REQUEST);
        }
    }
}
