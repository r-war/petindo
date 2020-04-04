<?php 

namespace App\Repositories;

use UploadAble;
use App\Models\Page;
use App\Contracts\PageContract;

use Illuminate\Database\QueryException;
use Illuminate\Database\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class PageRepository extends BaseRepository implements PageContract
{
    use UploadAble;

    public function __construct(Page $model)
    {
        $this->model  = $model;
    }

    public function listPages(string $order = 'id', string $sort= 'asc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    public function findPageById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    public function createPage(array $params)
    {
        try {
            $collection = collect($params);

            if($collection->has('picture') && ($params['picture'] instanceof UploadedFile) )
            {
                $picture = $this->uploadOne($params['picture'], 'pages');
            }

            $merge = $collection->merge(compact('picture'));

            $Page = New Page($merge->all());

            $Page->save();

            return $Page;

        } catch (QueryException $th) {
            throw new InvalidArgumentException($th->getMessage());
        }
    }

    public function updatePage(array $params)
    {
        $Page = $this->findPageById($params['id']);
        
        $collection = collect($params)->except('_token');

        if($collection->has('picture') && ($params['picture'] instanceof UploadedFile) )
        {
            $picture = $this->uploadOne($params['picture'], 'pages');
        }

        $merge = $collection->merge(compact('picture'));

        $Page->update($merge->all());

        return $Page;
    }

    public function deletePage($id)
    {
        $Page = $this->findPageById($id);

        $Page->delete();

        return $Page;
    }
}