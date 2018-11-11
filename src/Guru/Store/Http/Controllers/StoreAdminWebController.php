<?php

namespace Guru\Store\Http\Controllers;

use App\Http\Controllers\AdminWebController as AdminController;
use Form;
use Guru\Store\Http\Requests\StoreAdminWebRequest;
use Guru\Store\Interfaces\StoreRepositoryInterface;
use Guru\Store\Models\Store;

/**
 * Admin web controller class.
 */
class StoreAdminWebController extends AdminController
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
     * @return Response
     */
    public function index(StoreAdminWebRequest $request)
    {
        if ($request->wantsJson()) {
            $stores  = $this->repository->setPresenter('\\Guru\\Store\\Repositories\\Presenter\\StoreListPresenter')
                                                ->scopeQuery(function($query){
                                                    return $query->orderBy('id','DESC');
                                                })->all();
            return response()->json($stores, 200);

        }
        $this   ->theme->prependTitle(trans('store::store.names').' :: ');
        return $this->theme->of('store::admin.store.index')->render();
    }

    /**
     * Display store.
     *
     * @param Request $request
     * @param Model   $store
     *
     * @return Response
     */
    public function show(StoreAdminWebRequest $request, Store $store)
    {
        if (!$store->exists) {
            return response()->view('store::admin.store.new', compact('store'));
        }

        Form::populate($store);
        return response()->view('store::admin.store.show', compact('store'));
    }

    /**
     * Show the form for creating a new store.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(StoreAdminWebRequest $request)
    {

        $store = $this->repository->newInstance([]);

        Form::populate($store);

        return response()->view('store::admin.store.create', compact('store'));

    }

    /**
     * Create new store.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(StoreAdminWebRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $store          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('store::store.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/store/store/'.$store->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show store for editing.
     *
     * @param Request $request
     * @param Model   $store
     *
     * @return Response
     */
    public function edit(StoreAdminWebRequest $request, Store $store)
    {
        Form::populate($store);
        return  response()->view('store::admin.store.edit', compact('store'));
    }

    /**
     * Update the store.
     *
     * @param Request $request
     * @param Model   $store
     *
     * @return Response
     */
    public function update(StoreAdminWebRequest $request, Store $store)
    {
        try {

            $attributes = $request->all();

            $store->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('store::store.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/store/store/'.$store->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/store/store/'.$store->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the store.
     *
     * @param Model   $store
     *
     * @return Response
     */
    public function destroy(StoreAdminWebRequest $request, Store $store)
    {

        try {

            $t = $store->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('store::store.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/store/store/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/store/store/'.$store->getRouteKey()),
            ], 400);
        }
    }
}
