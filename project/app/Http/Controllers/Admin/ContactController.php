<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use Carbon\Carbon;
use App\Models\Contact;
use App\Models\Career;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Contact::orderBy('id','desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)




            ->addColumn('action', function(Contact $data) {
                return '<div class="action-list"><a href="' . route('admin-Contact-show',$data->id) . '"  class="delete"><i class="fas fa-eye"></i></a><a href="javascript:;" data-href="' . route('admin-Contact-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {

        return view('admin.contact.index');
    }



    //*** GET Request
    public function show($id)
    {

        $data = Contact::findOrFail($id);
        return view('admin.contact.show',compact('data'));
    }




    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Contact::findOrFail($id);
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
