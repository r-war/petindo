<?php 

namespace App\Repositories;

use App\Models\Menu;
use App\Contracts\MenuContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class MenuRepository extends BaseRepository implements MenuContract
{
    public function __construct(Menu $model)
    {
        $this->model  = $model;
    }

    public function listMenus(string $order = 'index', string $sort= 'asc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    public function findMenuById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    public function createMenu(array $params)
    {
        try {
            $collection = collect($params);

            $active = $collection->has('active') ? 1 : 0;

            $merge = $collection->merge(compact('active'));

            $menu = New Menu($merge->all());

            $menu->save();

            return $menu;

        } catch (QueryException $th) {
            throw new InvalidArgumentException($th->getMessage());
        }
    }

    public function updateMenu(array $params)
    {
        $menu = $this->findMenuById($params['id']);
        
        $collection = collect($params)->except('_token');

        $active = $collection->has('active') ? 1 : 0 ;

        $merge = $collection->merge(compact('active'));

        $menu->update($merge->all());

        return $menu;
    }

    public function deleteMenu($id)
    {
        $menu = $this->findMenuById($id);

        $menu->delete();

        return $menu;
    }
}