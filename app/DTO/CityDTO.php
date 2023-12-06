<?php

namespace App\DTO;

class CityDTO {
    private $city;
    private $city_ascii;
    private $state_id;
    private $state_name;
    private $county_fips;
    private $county_name;
    private $lat;
    private $lng;
    private $population;
    private $density;
    private $source;
    private $military;
    private $incorporated;
    private $timezone;
    private $ranking;
    private $zips;

    public function __construct(array $data) {
        $this->city = $data['city'] ?? null;
        $this->city_ascii = $data['city_ascii'] ?? null;
        $this->state_id = $data['state_id'] ?? null;
        $this->state_name = $data['state_name'] ?? null;
        $this->county_fips = $data['county_fips'] ?? null;
        $this->county_name = $data['county_name'] ?? null;
        $this->lat = $data['lat'] ?? null;
        $this->lng = $data['lng'] ?? null;
        $this->population = $data['population'] ?? null;
        $this->density = $data['density'] ?? null;
        $this->source = $data['source'] ?? null;
        $this->military = $data['military'] ?? null;
        $this->incorporated = $data['incorporated'] ?? null;
        $this->timezone = $data['timezone'] ?? null;
        $this->ranking = $data['ranking'] ?? null;
        $this->zips = $data['zips'] ?? null;
    }


    public function toArray() {
        return get_object_vars($this);
    }
}
