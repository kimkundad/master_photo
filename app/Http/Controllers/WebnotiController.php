<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests;
use App\notify;
use Illuminate\Support\Facades\DB;

class WebnotiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $setting = DB::table('settings')
            ->where('id', 1)
            ->first();


            $data['setting'] = $setting;


        $cat = DB::table('notifies')
              ->orderBy('num_sort', 'asc')
              ->paginate(15);

          $data['objs'] = $cat;
          $data['datahead'] = "Web Notify";
          return view('admin.notify.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['method'] = "post";
        $data['url'] = url('admin/web_notify');
        $data['datahead'] = "สร้าง web_notify ";
        return view('admin.notify.create', $data);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function time_sys(Request $request){

      DB::table('settings')
            ->where('id', 1)
            ->update(['time_sys' => $request['time_sys']]);

      return redirect(url('admin/web_notify/'))->with('edit_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }

    public function api_notify_status(Request $request){

      $user = notify::findOrFail($request->user_id);

                if($user->status == 1){
                    $user->status = 0;
                } else {
                    $user->status = 1;
                }


        return response()->json([
        'data' => [
          'success' => $user->save(),
        ]
      ]);

    }
    public function store(Request $request)
    {
        //

        $image = $request->file('image');
        $this->validate($request, [
         'image' => 'required|max:8048',
         'name' => 'required',
         'timer' => 'required'
        ]);

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $destinationPath = asset('assets/image/notify/');
          $img = Image::make($image->getRealPath());
          $img->resize(800, 550, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/image/notify/'.$input['imagename']);

        $url = $request['url'];
        if($url == null){
          $url = '#';
        }

        $package = new notify();
        $package->name = $request['name'];
        $package->url = $url;
        $package->image = $input['imagename'];
        $package->timer = $request['timer'];
        $package->num_sort = $request['num_sort'];
        $package->status = 1;
        $package->save();
        return redirect(url('admin/web_notify'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $obj = notify::find($id);
        $data['url'] = url('admin/web_notify/'.$id);
        $data['datahead'] = "แก้ไข web_notify";
        $data['method'] = "put";
        $data['objs'] = $obj;
        return view('admin.notify.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $image = $request->file('image');

        $url = $request['url'];
        if($url == null){
          $url = '#';
        }

        if($image == null){

          $package = notify::find($id);
          $package->name = $request['name'];
          $package->url = $url;
          $package->timer = $request['timer'];
          $package->num_sort = $request['num_sort'];
          $package->save();

        }else{

          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = asset('assets/image/notify/');
            $img = Image::make($image->getRealPath());
            $img->resize(800, 550, function ($constraint) {
            $constraint->aspectRatio();
          })->save('assets/image/notify/'.$input['imagename']);

          $package = notify::find($id);
          $package->name = $request['name'];
          $package->url = $url;
          $package->image = $input['imagename'];
          $package->timer = $request['timer'];
          $package->num_sort = $request['num_sort'];
          $package->save();

        }

        return redirect(url('admin/web_notify'))->with('edit_success','เพิ่ม เสร็จเรียบร้อยแล้ว');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $objs = DB::table('notifies')
        ->select(
           'notifies.*'
           )
        ->where('id', $id)
        ->first();

        $file_path = 'assets/image/notify/'.$objs->image;
        unlink($file_path);
          //
          $obj = notify::find($id);
          $obj->delete();
          return redirect(url('admin/web_notify/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }
}
