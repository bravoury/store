<?php

namespace Guru\Store\Http\Controllers;

use App\Http\Controllers\UserWebController as UserController;
use Form;
use Guru\Store\Http\Requests\StoreUserWebRequest;
use Guru\Store\Interfaces\StoreRepositoryInterface;
use Guru\Store\Models\Store;

class StoreUserWebController extends UserController
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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(StoreUserWebRequest $request)
    {
        $this->repository->pushCriteria(new \Lavalite\Store\Repositories\Criteria\StoreUserCriteria());
        $stores = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('store::store.names').' :: ');

        return $this->theme->of('store::user.store.index', compact('stores'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Store $store
     *
     * @return Response
     */
    public function show(StoreUserWebRequest $request, Store $store)
    {
        Form::populate($store);

        return $this->theme->of('store::user.store.show', compact('store'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(StoreUserWebRequest $request)
    {

        $store = $this->repository->newInstance([]);
        Form::populate($store);

        return $this->theme->of('store::user.store.create', compact('store'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(StoreUserWebRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $store = $this->repository->create($attributes);

            return redirect(trans_url('/user/store/store'))
                -> with('message', trans('messages.success.created', ['Module' => trans('store::store.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Store $store
     *
     * @return Response
     */
    public function edit(StoreUserWebRequest $request, Store $store)
    {

        Form::populate($store);

        return $this->theme->of('store::user.store.edit', compact('store'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Store $store
     *
     * @return Response
     */
    public function update(StoreUserWebRequest $request, Store $store)
    {
        try {
            $this->repository->update($request->all(), $store->getRouteKey());

            return redirect(trans_url('/user/store/store'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('store::store.name')]))
                ->with('code', 204);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Remove the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(StoreUserWebRequest $request, Store $store)
    {
        try {
            $this->repository->delete($store->getRouteKey());
            return redirect(trans_url('/user/store/store'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('store::store.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
