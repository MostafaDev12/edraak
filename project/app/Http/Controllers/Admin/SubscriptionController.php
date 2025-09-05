<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Subscription::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('price', function(Subscription $data) {
                                $price = round($data->price,2);
                                return $price;
                            })
                            ->editColumn('allowed_products', function(Subscription $data) {
                                $allowed_products = $data->allowed_products == 0 ? "Unlimited": $data->allowed_products;
                                return $allowed_products;
                            })
                            ->addColumn('action', function(Subscription $data) {
                                /*   <a href="javascript:;" data-href="' . route('admin-subscription-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a>*/
                                return '<div class="action-list"><a data-href="' . route('admin-subscription-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a>
                             
                                </div>';
                            }) 
                            ->rawColumns(['action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.subscription.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.subscription.create');
    }

    //*** POST Request
    public function store(Request $request)
    {

        //--- Logic Section
        $data = new Subscription();
        $input = $request->all();

        if($input['limit'] == 0)
         {
            $input['allowed_products'] = 0;
         }

        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section        
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends    
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Subscription::findOrFail($id);
        return view('admin.subscription.edit',compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Logic Section
        $data = Subscription::findOrFail($id);
        $input = $request->all();
  
             if(!empty($request->details)){
                if(in_array(null, $request->details) )
            {
                $input['details'] = null;
                $input['marks'] = null;
            
            }
            else
            {
                $input['details'] = implode(',', str_replace(',',' ',$request->details));
                $input['marks'] = implode(',', str_replace(',',' ',$request->marks));
            
            }
            }   
            
            if(!empty($request->date)){
                if(in_array(null, $request->date) )
            {
                $input['date'] = null;
                $input['value'] = null;
            
            }
            else
            {
                $input['date'] = implode(',', str_replace(',',' ',$request->date));
                $input['value'] = implode(',', str_replace(',',' ',$request->value));
            
            }
            } 
         
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section     
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends            
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Subscription::findOrFail($id);
        $data->delete();
        //--- Redirect Section     
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends     
    }
}
