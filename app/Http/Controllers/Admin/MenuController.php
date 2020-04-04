<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\MenuContract;

class MenuController extends BaseController
{
    //
    protected $menuRepository;

    public function __construct(MenuContract $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function index()
    {
        $menus = $this->menuRepository->listMenus();

        $this->setPageTitle('Menus', 'List of all Menus');

        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $menus = $this->menuRepository->listMenus('id', 'asc');
        $this->setPageTitle('Menus', 'Create Menu');

        return view('admin.menus.create', compact('menus'));
    }
    
    public function store(Request $request)
    {
        $this->Validate($request,[
            'index'         => 'required',
            'name'          => 'required',
            'url'           => 'required',
        ]);

        $params = $request->except('_token');

        $menu = $this->menuRepository->createMenu($params);

        if(!$menu)
        {
            return $this->responseRedirectBack('Error occurred while creatinh menu', 'menu', true, true);
        }

        return $this->responseRedirect('admin.menus.index', 'Menu added successfully', 'success', false, false);
    }

    public function edit($id)
    {
        $targetMenu = $this->menuRepository->findMenuById($id);

        $this->setPageTitle('Menus','Edit Menu : ' . $targetMenu->name);

        return view('admin.menus.edit', compact('targetMenu'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|max:191',
            //'image'         => 'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $menu = $this->menuRepository->updateMenu($params);
        if(!$menu){
            return $this->responseRedirectBack('Error occurred while updating brand', 'error', true, true);
        }

        return $this->responseRedirectBack('Brand updated successfully' ,'success',false, false);
    }

    public function delete($id){
        $menu = $this->menuRepository->deleteBrand($id);

        if (!$menu) {
            return $this->responseRedirectBack('Error occurred while deleting Menu.', 'error', true, true);
        }
        return $this->responseRedirect('admin.menus.index', 'Menu deleted successfully' ,'success',false, false);
    }
}
