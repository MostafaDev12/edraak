<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use Carbon\Carbon;
use App\Models\Content;
use App\Models\Program;

use App\Models\Feature;
use App\Models\Piece;
use App\Models\Product;
use App\Models\Propiece;
use App\Models\Free;
use App\Models\Profree;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class ContentController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Content::with(['product'])->orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                        
                            ->editColumn('product_id', function(Content $data) {
                            
                                 $country_name = !empty($data->product->name) ? $data->product->name : $data->product_id ;
                                return $country_name;
                            }) 
                            ->addColumn('status', function(Content $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-Content-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>'.__('Activated').'</option><<option data-val="0" value="'. route('admin-Content-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>'.__('Deactivated').'</option>/select></div>';
                            }) 
                          
                            ->addColumn('action', function(Content $data) {
                                return '<div class="action-list"><a data-href="' . route('admin-Content-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>'.__('Edit').'</a><a href="javascript:;" data-href="' . route('admin-Content-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            }) 
                            ->rawColumns(['status','checkbox', 'action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        
        return view('admin.Content.index');
    }

    //*** GET Request
    public function create()
    {
          $products = Product::get();
        return view('admin.Content.create',compact('products'));
    }

    //*** POST Request
    public function store(Request $request)
    {
     
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Content();
        $input = $request->all();
          if ($file = $request->file('photo'))
         {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/content',$name);
            $input['photo'] = $name;
        }

        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section        
          $msg = trans('Add Success');
        
        
        return response()->json([
            'status' => true,
            'msg'   => $msg
            
        ],200);     
        //--- Redirect Section Ends   
    }

    //*** GET Request
    public function edit($id)
    {
         $products = Product::get();
        $data = Content::findOrFail($id);
        return view('admin.Content.edit',compact('data','products'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        
        
   
        //--- Validation Section Ends


        //--- Logic Section
        $data = Content::findOrFail($id);
        $input = $request->all();

              if ($file = $request->file('photo'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images/content',$name);
                if($data->photo != null)
                {
                    if (file_exists(public_path().'/assets/images/content/'.$data->photo)) {
                        unlink(public_path().'/assets/images/content/'.$data->photo);
                    }
                }
            $input['photo'] = $name;
            }  
            

        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section     
       $msg = trans('Update Success');
        
        
        return response()->json([
            
            'status'  => true,
            'msg'   =>   $msg
            
        ],200);     
        //--- Redirect Section Ends           
    }
      //*** GET Request Status
      public function status($id1,$id2)
        {
            $data = Content::findOrFail($id1);
            $data->status = $id2;
            $data->update();
        }


    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Content::findOrFail($id);
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
