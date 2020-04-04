<?php

namespace App\Contracts;

interface PageContract
{
    public function listPages(string $order = 'id', string $sort = 'asc', array $columns = ['*']);

    public function findPageById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createPage(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updatePage(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deletePage($id);
}