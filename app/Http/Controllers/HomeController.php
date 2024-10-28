<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\Programs;
Use Alert;


class HomeController extends Controller
{
    public function home()
    {
        $config = Config::first();
        $programs = Programs::where('is_active',1)->get();
        return view('homepage',compact('config','programs'));
    }
    public function config(){
        $config = Config::first();
        return view('admin.config.config',compact('config'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'carousel_images' => 'nullable',
            'tnc' => 'required',
            'no_rek' => 'required',
            'bank' => 'required',
            'name_rek' => 'required',

        ]);

        $config = Config::first() ?? new Config;
        $config->title = $request->title;
        $config->tnc = $request->tnc;
        $config->no_rek = $request->no_rek;
        $config->bank = $request->bank;
        $config->name_rek = $request->name_rek;
        $config->save();

        if ($request->hasFile('carousel_images')) {
            foreach ($config->images as $image) {
                Storage::delete('public/uploads/carousel_images/' . $image->filename);
            }
            $config->images()->delete();
            foreach ($request->file('carousel_images') as $file) {
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/uploads/carousel_images', $filename);

                $config->images()->create(['filename' => $filename]);
            }
        }
        Alert::toast('Config Berhasil diUbah!', 'success');
        return redirect()->back();
    }
}
