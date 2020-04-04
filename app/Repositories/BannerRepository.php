<?php

namespace App\Repositories;

use App\Models\Banner;
use App\Contracts\BannerContract;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class BannerRepository extends BaseRepository implements BannerContract
{
    use UploadAble;

    public function __construct(Banner $model)
    {
        $this->model = $model;
    }

    public function listBanners(string $order = 'index', string $sort = 'asc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findBannerById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e);
        }
    }

    public function createBanner(array $params)
    {
        try {
            $collection = collect($params);

            $picture = null;

            if($collection->has('picture') && ($params['picture'] instanceof UploadedFile))
            {
                $picture = $this->uploadOne($params['picture'], 'banners');
            }

            $show = $collection->has('show') ? 1 : 0;

            $merge = $collection->merge(compact('picture', 'show'));

            $banner = new Banner($merge->all());

            $banner->save();

            return $banner;
        } catch (QueryException $th) {
            throw new InvalidArgumentException($th->getMessage());
        }
    }

    public function updateBanner(array $params)
    {
        $banner = $this->findBannerById($params['id']);

        $collection = collect($params)->except('_token');

        if($collection->has('picture') && ($params['picture'] instanceof UploadedFile))
        {
            if($banner->picture != null){
                $this->deleteOne($banner->picture);
            }
            $picture = $this->uploadOne($params['picture'], 'banners');
        }
        $show = $collection->has('show') ? 1 : 0;

        $merge = $collection->merge(compact('picture', 'show'));
        $banner->update($merge->all());

        return $banner;
    }

    public function deleteBanner($id)
    {
        $banner = $this->findBannerById($id);

        if($banner->picture != null)
        {
            $this->deleteOne($banner->picture);
        }

        $banner->delete();
        return $banner;
    }
}