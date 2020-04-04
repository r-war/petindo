<?php 

namespace App\Contracts;

interface BannerContract
{
    public function listBanners(string $order = 'index', string $sort = "asc", array $columns = ['*']);

    public function findBannerById(int $id);

    public function createBanner(array $params);

    public function updateBanner(array $params);

    public function deleteBanner($id);
}