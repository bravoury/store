<?php

namespace Guru\Store\Http\Controllers;

use App\Http\Controllers\AdminApiController as AdminController;
use Guru\Store\Http\Requests\StoreAdminApiRequest;
use Guru\Store\Interfaces\StoreRepositoryInterface;
use Guru\Store\Models\Store;

/**
 * Admin API controller class.
 */
class StoreAdminApiController extends AdminController
{
    /**
     * Initialize store controller.
     *
     * @param type StoreRepositoryInterface $store
     *
     * @return type
     */
    public function __construct(StoreRepositoryInterface $store)
    {
        $this->repository = $store;
        parent::__construct();
    }

    /**
     * Display a list of store.
     *
     * @return json
     */
    public function index(StoreAdminApiRequest $request)
    {
        $stores  = $this->repository
            ->setPresenter('\\Guru\\Store\\Repositories\\Presenter\\StoreListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $stores['code'] = 2000;
        return response()->json($stores) 
                         ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display store.
     *
     * @param Request $request
     * @param Model   Store
     *
     * @return Json
     */
    public function show(StoreAdminApiRequest $request, Store $store)
    {
        $store         = $store->presenter();
        $store['code'] = 2001;
        return response()->json($store)
                         ->setStatusCode(200, 'SHOW_SUCCESS');;

    }

    /**
     * Show the form for creating a new store.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(StoreAdminApiRequest $request, Store $store)
    {
        $store         = $store->presenter();
        $store['code'] = 2002;
        return response()->json($store)
                         ->setStatusCode(200, 'CREATE_SUCCESS');

    }

    /**
     * Create new store.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(StoreAdminApiRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $store          = $this->repository->create($attributes);
            $store          = $store->presenter();
            $store['code']  = 2004;

            return response()->json($store)
                             ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
;
        }
    }

    /**
     * Show store for editing.
     *
     * @param Request $request
     * @param Model   $store
     *
     * @return json
     */
    public function edit(StoreAdminApiRequest $request, Store $store)
    {
        $store         = $store->presenter();
        $store['code'] = 2003;
        return response()-> json($store)
                        ->setStatusCode(200, 'EDIT_SUCCESS');;
    }

    /**
     * Update the store.
     *
     * @param Request $request
     * @param Model   $store
     *
     * @return json
     */
    public function update(StoreAdminApiRequest $request, Store $store)
    {
        try {

            $attributes = $request->all();

            $store->update($attributes);
            $store         = $store->presenter();
            $store['code'] = 2005;

            return response()->json($store)
                             ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the store.
     *
     * @param Request $request
     * @param Model   $store
     *
     * @return json
     */
    public function destroy(StoreAdminApiRequest $request, Store $store)
    {

        try {

            $t = $store->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('store::store.name')]),
                'code'     => 2006
            ])->setStatusCode(202, 'DESTROY_SUCCESS');

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4006,
            ])->setStatusCode(400, 'DESTROY_ERROR');
        }
    }
}
