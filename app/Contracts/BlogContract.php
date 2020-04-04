<?php

namespace App\Contract;

interface BlogContract
{
    public function listBlogs(string $order = 'id', string $sort = 'asc', array $columns = ['*']);

    public function findBlogById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createBlog(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateBlog(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteBlog($id);
}