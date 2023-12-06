<?php

namespace App\Jobs;

use App\DTO\CityDTO;
use App\Models\City;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CityJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $cityData;

    public function __construct($cityData)
    {
        $this->cityData = $cityData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            foreach ($this->cityData as $key => $value) {
                $city = new CityDTO($value);
                $store = City::create($city->toArray());
            }
        } catch (\Exception $e) {
            Log::error('CityJob failed: ' . $e->getMessage());
        }
    }

}
