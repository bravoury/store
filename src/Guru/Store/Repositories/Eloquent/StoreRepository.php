<?php

namespace Guru\Store\Repositories\Eloquent;

use Guru\Store\Interfaces\StoreRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class StoreRepository extends BaseRepository implements StoreRepositoryInterface
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'  => 'like'
    ];

    public function boot()
    {
        $this->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'));
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('package.store.store.model');
    }
}
