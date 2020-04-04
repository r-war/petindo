<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\BannerContract;

class BannerController extends BaseController
{
    protected $bannerRepository;

    public function __construct(BannerContract $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }
    
    public function index()
    {
        $banners = $this->bannerRepository->listBanners();

        $this->setPageTitle('Banners', 'List of all Banners');

        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        $this->setPageTitle('Banners', 'Create Banner');

        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'index'     => 'required',
            'picture'   => 'required|mimes:jpg,jpeg,png|max:1500' 
        ]);

        $params = $request->except('_token');

        $banner = $this->bannerRepository->createBanner($params);

        if(!$banner){
            return $this->responseRedirectBack('Error occurred while creating banner', 'error', true, true);
        }

        return $this->responseRedirect('admin.banners.index', 'Banner added successfully', 'success', false, false);
    }
}
