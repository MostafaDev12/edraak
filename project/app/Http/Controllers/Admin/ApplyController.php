<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use Carbon\Carbon;
use App\Models\AppliedJob;
use App\Models\Career;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class ApplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = AppliedJob::orderBy('id','desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)

            ->editColumn('career_id', function(AppliedJob $data) {
                $country = Career::find($data->career_id);
                $country_name = !empty($country->name) ? $country->name : "deleted" ;
                return $country_name;
            })


            ->addColumn('action', function(AppliedJob $data) {
                return '<div class="action-list"><a href="' . route('admin-applied-show',$data->id) . '"  class="delete"><i class="fas fa-eye"></i></a><a href="javascript:;" data-href="' . route('admin-applied-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {

        return view('admin.jobs.index');
    }



    //*** GET Request
    public function show($id)
    {

        $data = AppliedJob::findOrFail($id);
        return view('admin.jobs.show',compact('data'));
    }




    //*** GET Request Delete
    public function destroy($id)
    {
        $data = AppliedJob::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        $msg = trans('Delete Msg');
        return response()->json([
            'status' => true,
            'msg'   =>  $msg
        ],200);
        //--- Redirect Section Ends
    }





}
