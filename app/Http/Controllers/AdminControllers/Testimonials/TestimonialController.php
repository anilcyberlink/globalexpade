<?php

namespace App\Http\Controllers\AdminControllers\Testimonials;

use App\Http\Controllers\Controller;
// use App\Models\Testimonial;
use App\Models\Testimonials\TestimonialModel;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TestimonialModel::latest()->get();

        return view('admin.testimonial.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'picture' => 'nullable|image|mimes:jpeg,png,jpg,webp'

        ]);

        $req = $request->all();

        if ($request->hasFile('picture')) {

            $file = $request->file('picture');

            $filename = pathinfo(
                $file->getClientOriginalName(),
                PATHINFO_FILENAME
            );

            $imageName =
                Str::slug($filename)
                . '-'
                . Str::random(30)
                . '.'
                . $file->getClientOriginalExtension();

            $destinationPath = public_path('uploads/testimonials');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            Image::make($file->getRealPath())
                ->save($destinationPath . '/' . $imageName);

            $req['picture'] = $imageName;
        }

        TestimonialModel::create($req);

        return redirect()
            ->back()
            ->with('success', 'Successfully Added.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = TestimonialModel::findOrFail($id);

        return view('admin.testimonial.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = TestimonialModel::findOrFail($id);

        if ($request->hasFile('picture')) {

            if (
                $data->picture &&
                file_exists(
                    public_path('uploads/testimonials/' . $data->picture)
                )
            ) {
                unlink(
                    public_path(
                        'uploads/testimonials/' . $data->picture
                    )
                );
            }

            $file = $request->file('picture');

            $filename = pathinfo(
                $file->getClientOriginalName(),
                PATHINFO_FILENAME
            );

            $imageName =
                Str::slug($filename)
                . '-'
                . Str::random(30)
                . '.'
                . $file->getClientOriginalExtension();

            $destinationPath = public_path('uploads/testimonials');

            Image::make($file->getRealPath())
                ->save($destinationPath . '/' . $imageName);

            $data->picture = $imageName;
        }

        $data->name = $request->name;
        $data->country = $request->country;
        // $data->designation = $request->designation;
        $data->title = $request->title;
        $data->trip_name = $request->trip_name;
        $data->trip_type = $request->trip_type;
        $data->testimonial = $request->testimonial;
        $data->rating = $request->rating;
        $data->status = $request->status;
        $data->featured = $request->featured ?? 0;
        $data->sort_order = $request->sort_order ?? 0;

        $data->save();

        return redirect()
            ->back()
            ->with('success', 'Update Successful.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = TestimonialModel::findOrFail($id);

        if ($data->picture) {

            if (
                file_exists(
                    public_path(
                        'uploads/testimonials/' . $data->picture
                    )
                )
            ) {
                unlink(
                    public_path(
                        'uploads/testimonials/' . $data->picture
                    )
                );
            }
        }

        $data->delete();

        return response()->json([
            'errors' => [
                'Delete Successful.'
            ]
        ]);
    }

    public function isdefault(Request $request)
    {
        $id = $request->status;

        $testimonial = TestimonialModel::findOrFail($id);

        if (isset($_POST['active'])) {

            $testimonial->status = 0;
        }

        if (isset($_POST['inactive'])) {

            $testimonial->status = 1;
        }

        $testimonial->save();

        Session::flash(
            'success',
            'Status Updated'
        );

        return redirect()->back();
    }
    public function featured(Request $request)
    {
        $data = TestimonialModel::findOrFail($request->id);

        $data->featured = !$data->featured;

        $data->save();

        return redirect()->back()
            ->with('success', 'Featured Updated.');
    }
}
