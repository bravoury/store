<?php

namespace Guru\Store\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class StoreListTransformer extends TransformerAbstract
{
    public function transform(\Guru\Store\Models\Store $store)
    {
        return [
            'id'                => $store->getRouteKey(),
            'name'              => $store->name,
            'lat'               => $store->lat,
            'lng'               => $store->lng,
            'phone'             => $store->phone,
            'working_hours'     => $store->working_hours,
        ];
    }
}