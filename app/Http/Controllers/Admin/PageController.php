<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Repositories\PageRepository;;
class PageController extends BaseController
{

    protected $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function index()
    {
        $this->setPageTitle('Pages', 'List of All Page');

        $pages= $this->pageRepository->listPages();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        $this->setPageTitle('Pages', 'Create page');

        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|max:191',
            'image'         => 'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $page = $this->pageRepository->createpage($params);

        if(!$page)
        {
            return $this->responseRedirectBack('Error occurred while creating page', 'error', true, true);
        }

        return $this->responseRedirect('admin.pages.index', 'page added successfully', 'success', false, false);
    }

    public function edit($id)
    {
        $page = $this->pageRepository->findpageById($id);

        $this->setPageTitle('Pages', 'Edit page : '. $page->name);

        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|max:191',
            'image'         => 'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $page = $this->pageRepository->updatepage($params);
        if(!$page){
            return $this->responseRedirectBack('Error occurred while updating page', 'error', true, true);
        }

        return $this->responseRedirectBack('page updated successfully' ,'success',false, false);
    }

    public function delete($id){
        $page = $this->pageRepository->deletepage($id);

        if (!$page) {
            return $this->responseRedirectBack('Error occurred while deleting page.', 'error', true, true);
        }
        return $this->responseRedirect('admin.ages.index', 'page deleted successfully' ,'success',false, false);
    }
}
