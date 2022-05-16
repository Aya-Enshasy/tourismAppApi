<?php

namespace App\Http\Controllers\Control_Panel;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\Mosques\newMosqueRequest;
use App\Http\Requests\Api\Mosques\updateMosqueRequest;
use App\Models\Mosque;
use Illuminate\Http\Request;

class MosquesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $mosques = Mosque::paginate(10);
        $mosques = Mosque::all();
        return view('control_panel.mosques.index', compact('mosques'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control_panel.mosques.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(newMosqueRequest $request)
    {
        $mosque = Mosque::create($request->validated());
        if($request->file){
            $file = $request->file->store('public','public');
            $mosque->media()->create(['name'=>$file]);
        }
        return redirect(route('mosques.index'));
//        redirect(route('mosques.index')->with('success','You added a mosque successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Mosque $mosque
     * @return \Illuminate\Http\Response
     */

    public function show($mosque)
    {
//        if($mosque) {
//            return view('control_panel.mosques.update',compact('mosque'));
//        }else{
//            return redirect('/')->with('error','this mosque does not exist');
//        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Mosque $mosque
     * @return \Illuminate\Http\Response
     */

    public function edit($mosque)
    {

        if ($mosque) {
            return view('control_panel.mosques.update', compact('mosque'));
        } else {
            return redirect('/')->with('error', 'this mosque does not exist');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Mosque $mosque
     * @return \Illuminate\Http\Response
     */
    public function update(updateMosqueRequest $request, $mosque)
    {
        if ($mosque) {
            if($request->file) {
                $file = $request->file->store('public','public');
                if($mosque->media){
                    $mosque->media->update(['name'=>$file]);
                }else{
                    $mosque->media()->create(['name'=>$file]);
                }
            }
            $mosque->update($request->validated());
            return redirect(route('mosques.index'));
//            redirect(route('mosques.index')->with('success','You edited the mosque successfully.'));
        } else {
            return redirect('/')->with('error', 'this mosque does not exist');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Mosque $mosque
     * @return \Illuminate\Http\Response
     */

    public function destroy($mosque)
    {
        if ($mosque) {
            $mosque->delete();
            return redirect(route('mosques.index'));
//            return redirect(route('mosques.index')->with('success','You edited the mosque successfully.'));
        } else {
            return redirect('/')->with('error', 'this mosque does not exist');
        }
    }

}
