<?php
namespace App\Interfaces\Eloquent\City;

interface CityRepositoryInterface {
    public function index($data);
    public function show($id);
    public function cityFileUpload($file);

    public function store($data);

}