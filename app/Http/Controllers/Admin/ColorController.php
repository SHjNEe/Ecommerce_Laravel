<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Models\Color;

class ColorController extends Controller
{

    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', ['colors' => $colors]);
    }

    public function create()
    {
        return view('admin.colors.create');
    }


    public function store(ColorRequest $request)
    {
        $validateData = $request->validated();
        Color::create([
            'name' => $validateData['name'],
            'code' => $validateData['code'],
            'status' => $validateData['status'] == true ? '1' : '0'
        ]);
        return redirect('admin/color')->with('status', 'Create color successfully');
    }
    public function edit($color)
    {
        $color = Color::findOrFail($color);
        return view('admin.colors.edit', ['color' => $color]);
    }

    public function update(ColorRequest $request, $color)
    {
        $validateData = $request->validated();
        $color = Color::findOrFail($color);
        $color->update([
            'name' => $validateData['name'],
            'code' => $validateData['code'],
            'status' => $validateData['code'] == true ? '1' : '0'
        ]);
        return redirect('admin/color')->with('status', 'Color update successfully');
    }

    public function destroy($color)
    {
        $color = Color::findOrFail($color);
        $color->delete();
        return redirect('admin/color')->with('status', 'Color delete successfully');
    }
}
