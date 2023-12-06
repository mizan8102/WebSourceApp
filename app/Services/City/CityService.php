<?php

namespace App\Services\City;

use App\DTO\CityDTO;
use App\Enums\ApiResponseEnum;
use App\Imports\CitiesImport;
use App\Interfaces\Eloquent\City\CityRepositoryInterface;
use App\Jobs\CityJob;
use App\Models\City;
use Exception;
use Maatwebsite\Excel\Facades\Excel;

class CityService implements CityRepositoryInterface {

    public function index($data) {

        $name = $data["name"] ?? '';
        $state = $data['state'] ?? '';
        $country = $data['country'] ?? '';
        $perPage = $data['perPage'] ?? 10;


        $query = City::query();
        if($name) {
            $query->where('city', 'like', '%'.$name.'%');
        }
        if($state) {
            $query->where('state_name', 'like', '%'.$state.'%');
        }
        if($country) {
            $query->where('county_name', 'like', '%'.$country.'%');
        }
        $cities = $query->paginate($perPage);
        return $cities;
    }
    public function store($data) {
        try {
            CityJob::dispatch($data);
            return "Data Saving Done.";
        } catch (Exception $e) {
            return $e->getMessage();
        }


    }

    public function cityFileUpload($file): array {

        $data = Excel::toArray([], $file)[0];
        $keys = array_shift($data);
        $organizedData = [];
        foreach($data as $row) {
            $rowData = array_combine($keys, $row);
            if(isset($rowData['city'])) {
                $organizedData[] = $rowData;
            }
        }
        return $organizedData;
    }

    public function show($id) {
        $city = City::find($id);
        return $city;
    }
}
