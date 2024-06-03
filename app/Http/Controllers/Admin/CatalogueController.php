<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.catalogues.';
    const PATH_UPLOAD = 'catalogues';
    public function index()
    {
        $data = Catalogue::query()->latest('id')->paginate(5);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('cover');

        $data['is_active'] ??= 0;

        if ($request->hasFile('cover')) {
            $data['cover'] = Storage::put(self::PATH_UPLOAD, $request->file('cover'));
        }
        // dd($data);
        Catalogue::query()->create($data);
        return redirect()->route('admin.catalogues.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Catalogue::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Catalogue::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = Catalogue::query()->findOrFail($id);
        $data = $request->except('cover');

        $data['is_active'] ??= 0;

        if ($request->hasFile('cover')) {
            $currentCover = $model->cover;

            // Upload the new cover and store the path
            $data['cover'] = Storage::put(self::PATH_UPLOAD, $request->file('cover'));

            // Delete the old cover if it exists
            if ($currentCover && Storage::exists($currentCover)) {
                Storage::delete($currentCover);
            }
        }

        $model->update($data);
        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Catalogue::query()->findOrFail($id);
        $model->delete();
        if ($model && Storage::exists($model)) {
            Storage::delete($model);
        }
        return back();
    }
}
