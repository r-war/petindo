<?php

namespace App\Contracts;

interface MenuContract
{
    public function listMenus(string $order = 'index', string $sort = 'asc', array $columns = ['*']);

    public function findMenuById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createMenu(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateMenu(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteMenu($id);

}