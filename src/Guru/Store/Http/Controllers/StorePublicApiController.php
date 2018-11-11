<?php

namespace Guru\Store\Http\Controllers;

use App\Http\Controllers\PublicApiController as PublicController;
use Guru\Store\Interfaces\StoreRepositoryInterface;
use Guru\Store\Repositories\Presenter\StoreItemTransformer;

/**
 * Pubic API controller class.
 */
class StorePublicApiController extends PublicController
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
        $stores = $this->repository
            ->setPresenter('\\Guru\\Store\\Repositories\\Presenter\\StoreListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $stores['code'] = 2000;
        return response()->json($stores)
                ->setStatusCode(200, 'INDEX_SUCCESS');
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
        $store = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($store)) {
            $store         = $this->itemPresenter($module, new StoreItemTransformer);
            $store['code'] = 2001;
            return response()->json($store)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
