<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seting;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SetingController extends Controller
{
    public function index()
    {
        $setting = Seting::find(1);
        return view('admin/setting/index', compact('setting'));
    }
    public function savedata(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'website_name' => 'required|max:255',
            'website_logo' => 'required',
            'website_favicon' => 'nullable',
            'description' => 'nullable',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $setting = Seting::where('id', '1')->first();
        if ($setting) {
            $setting->website_name = $request->website_name;
            if ($request->hasfile('website_logo')) {
                // update image
                $destination = 'uploads/settings/' . $setting->logo;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('website_logo');
                $filename = time() . '-' . $file->getclientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->logo = $filename;
            }
            if ($request->hasfile('website_favicon')) {
                // update image
                $destination = 'uploads/settings/' . $setting->favicon;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('website_favicon');
                $filename = time() . '-' . $file->getclientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->favicon = $filename;
            }
            $setting->description = $request->description;
            $setting->meta_title = $request->meta_title;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->meta_description = $request->meta_description;
            $setting->update();
            return redirect('admin/settings')->with('message', 'settinds Updated');
        } else {
            $setting = new Seting;
            $setting->website_name = $request->website_name;
            if ($request->hasfile('website_logo')) {
                // update image
                $file = $request->file('website_logo');
                $filename = time() . '-' . $file->getclientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->logo = $filename;
            }
            if ($request->hasfile('website_favicon')) {
                // update image
                $file = $request->file('website_favicon');
                $filename = time() . '-' . $file->getclientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->favicon = $filename;
            }
            $setting->description = $request->description;
            $setting->meta_title = $request->meta_title;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->meta_description = $request->meta_description;
            $setting->save();

            return redirect('admin/settings')->with('message', 'settinds Added');
        }
    }
}
