<?php

namespace App\Http\Controllers\Admin\Introduction;

use App\Domain\Admin\Requests\Introduction\IntroductionRequest;
use App\EBP\Entities\Introduction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IntroductionController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $introduction     = app(Introduction::class)->firstOrFail();
        $introductionType = 'Introduction';
        $route            = 'introduction';

        return view('admin.modules.introduction.edit', compact('introduction', 'introductionType', 'route'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param IntroductionRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(IntroductionRequest $request)
    {
        try {
            app(Introduction::class)->firstOrFail()->update($request->all());
            flash('Introduction Successfully Updated.')->success();
        } catch (\Exception $exception) {
            flash('Unable to update. If the error persists, contact '.config('palika.maintenanceContact'))->error();
            logger()->info($exception->getMessage());
        }

        return redirect()->back();
    }
}
