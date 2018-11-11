<?php

namespace Guru\Store;

class Store
{
    /**
     * $store object.
     */
    protected $store;

    /**
     * Constructor.
     */
    public function __construct(\Guru\Store\Interfaces\StoreRepositoryInterface $store)
    {
        $this->store = $store;
    }

    /**
     * Returns count of store.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }
}
