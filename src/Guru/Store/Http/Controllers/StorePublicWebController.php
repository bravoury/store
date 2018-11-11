<?php

namespace Guru\Store\Http\Controllers;

use App\Http\Controllers\PublicWebController as PublicController;
use Guru\Store\Interfaces\StoreRepositoryInterface;

class StorePublicWebController extends PublicController
{
    /**
     * Constructor.
     *
     * @param type \Guru\Store\Interfaces\StoreRepositoryInterface $store
     *
     * @return type
     */
    public function __construct(StoreRepositoryInterface $store)
    {
        $this->repository = $store;
        parent::__construct();
    }

    /**
     * Show store's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $stores = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('store::public.store.index', compact('stores'))->render();
    }

    /**
     * Show store.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $store = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('store::public.store.show', compact('store'))->render();
    }
}
