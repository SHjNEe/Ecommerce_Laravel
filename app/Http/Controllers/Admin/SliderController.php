<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SliderRequest $request)
    {
        $validatedData = $request->validated();


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] = 'uploads/slider/' . $filename;
        }
        $validatedData['status'] = $request->status == true ? '1' : '0';
        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
            'image' => $validatedData['image']
        ]);
        return redirect('admin/slider')->with('status', ' Slider is created successfully!');
    }

    public function edit($slider_id)
    {
        $slider = Slider::findOrFail($slider_id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderRequest $request, $slider_id)
    {
        $slider = Slider::findOrFail($slider_id);
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            if (File::exists($slider->image)) {
                File::delete($slider->image);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] = 'uploads/slider/' . $filename;
        }
        $validatedData['status'] = $request->status == true ? '1' : '0';
        $slider->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
            'image' => $validatedData['image'] ?? $slider->image,
        ]);
        return redirect()->back()->with('status', ' Slider is updated successfully!');
    }
    public function destroy(Slider $slider_id)
    {
        if ($slider_id->count() > 0) {
            $destination = $slider_id->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $slider_id->delete();
        }
        return redirect()->back()->with('status', 'Slider is deleted successfully!');
    }
}
