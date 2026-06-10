<?php

namespace App\Livewire\Concerns;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;

trait HasVehicleFilter
{
    #[Url]
    public string $vehicleFilter = '';

    protected function getVehicleIds()
    {
        $owned = Auth::user()->vehicles()->pluck('id');

        return $this->vehicleFilter
            ? $owned->intersect([(int) $this->vehicleFilter])->values()
            : $owned;
    }
}
