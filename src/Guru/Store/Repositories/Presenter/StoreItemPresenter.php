<?php

namespace Guru\Store\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class StoreItemPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StoreItemTransformer();
    }
}