<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use Carbon\Carbon;
use App\Models\Support;
use App\Models\Career;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Support::orderBy('id','desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)




            ->addColumn('action', function(Support $data) {
                return '<div class="action-list"><a href="' . route('admin-Support-show',$data->id) . '"  class="delete"><i class="fas fa-eye"></i></a><a href="javascript:;" data-href="' . route('admin-Support-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {

        return view('admin.support.index');
    }



    //*** GET Request
    public function show($id)
    {

        $data = Support::findOrFail($id);
        return view('admin.support.show',compact('data'));
    }




    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Support::findOrFail($id);
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
