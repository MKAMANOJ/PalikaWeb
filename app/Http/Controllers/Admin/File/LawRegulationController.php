<?php

namespace App\Http\Controllers\Admin\File;

use App\Domain\Admin\Requests\File\UploadedFileRequest;
use App\Domain\Admin\Services\File\FileCategoryService;
use App\Domain\Admin\Services\File\UploadedFileService;
use App\EBP\Constants\FileCategories;
use App\EBP\Entities\LawRegulation;
use App\Http\Controllers\Admin\BaseController;

class LawRegulationController extends BaseController
{
    /**
     * @var FileCategoryService
     */
    protected $categoryService;
    /**
     * @var UploadedFileService
     */
    protected $uploadedFileService;

    /**
     * @param FileCategoryService $categoryService
     * @param UploadedFileService $uploadedFileService
     */
    function __construct(FileCategoryService $categoryService, UploadedFileService $uploadedFileService)
    {

        $this->categoryService     = $categoryService;
        $this->uploadedFileService = $uploadedFileService;
    }

    public function index()
    {
//        $slug     = FileCategories::LAW_AND_REGULATION_SLUG;
//        $category = $this->categoryService->getBySlug($slug);
        $files        = app(LawRegulation::class)->all();
        $categoryName = 'Law Regulation';

        return view('admin.modules.file.category.show', compact('categoryName', 'files'));
    }

    /**
     * Shows the news creation form.
     */
    public function create()
    {
//        $slug     = FileCategories::LAW_AND_REGULATION_SLUG;
//        $category = $this->categoryService->getBySlug($slug);
        $categoryName = 'Law/regulation';
        $route        = 'law-regulation';

        return view('admin.modules.file.file.create', compact('categoryName', 'route'));
    }

    /**
     * Stores the news in database.
     * @param UploadedFileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UploadedFileRequest $request)
    {
//        $slug                        = FileCategories::LAW_AND_REGULATION_SLUG;
//        $category                    = $this->categoryService->getBySlug($slug);
//        $request['file_category_id'] = $category->id;
        try {
            $file = $this->uploadedFileService->store($request, "Regulation/Law");
            flash('Law/Regulation Successfully Added.')->success();
        } catch (\Exception $exception) {
            logger()->error($exception->getMessage());
            flash('Unable to Create. If the error persists, contact '.config('palika.maintenanceContact'))->error();
        }

        return redirect()->route('law-regulation.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryName = 'Law/Regulation';
        $route        = 'law-regulation';
        $file         = $this->uploadedFileService->getById((int)$id, 'Regulation/Law');

        return view('admin.modules.file.file.edit', compact('file', 'categoryName', 'route'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UploadedFileRequest                     $request
     * @param                                         $id
     * @return \Illuminate\Http\Response
     */
    public function update(UploadedFileRequest $request, $id)
    {
        try {
            $file = $this->uploadedFileService->update((int)$id, $request, "Regulation/Law");
            flash('Law/Regulation Successfully updated.')->success();
        } catch (\Exception $exception) {
            logger()->error($exception->getMessage());
            flash('Unable to update. If the error persists, contact '.config('palika.maintenanceContact'))->error();
        }


        return redirect()->route('law-regulation.index');
    }

    /**
     * Remove the specified category from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->uploadedFileService->destroy((int)$id, 'Regulation/Law');
            flash('Law/Regulation Successfully deleted.')->success();
        } catch (\Exception $exception) {
            logger()->error($exception->getMessage());
            flash('Unable to delete. If the error persists, contact '.config('palika.maintenanceContact'))->error();
        }

        return redirect()->route('law-regulation.index');
    }
}