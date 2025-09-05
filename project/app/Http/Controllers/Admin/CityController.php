<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use Carbon\Carbon;
use App\Models\City;
use App\Models\Country;

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

class CityController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = City::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                        
                            ->editColumn('country_id', function(City $data) {
                                $country =  Country::find($data->country_id);
                                 $country_name = !empty($country->country_name) ?$country->country_name : "deleted" ;
                                return $country_name;
                            }) 
                            ->addColumn('status', function(City $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-city-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>'.__('Activated').'</option><<option data-val="0" value="'. route('admin-city-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>'.__('Deactivated').'</option>/select></div>';
                            }) 
                            ->addColumn('checkbox', function(City $data) {
                              
                                return '<div class="">
                                <label class="container">
                                <input type="checkbox" name="id['.$data->id.'][]" value="'.$data->id.'" class="all row-select">
                                 <span class="checkmark" style="top: -27px;"></span>
                               </label>
                                </div>';
                            })
                            ->addColumn('action', function(City $data) {
                                return '<div class="action-list"><a data-href="' . route('admin-city-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>'.__('Edit').'</a><a href="javascript:;" data-href="' . route('admin-city-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            }) 
                            ->rawColumns(['status','checkbox', 'action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        
        return view('admin.city.index');
    }

    //*** GET Request
    public function create()
    {
        
        return view('admin.city.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
     
        //--- Validation Section Ends

        //--- Logic Section
        $data = new City();
        $input = $request->all();
        if ($file = $request->file('photo'))
            {
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->photo);
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
        
        $data = City::findOrFail($id);
        return view('admin.city.edit',compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        
        
   
        //--- Validation Section Ends


        //--- Logic Section
        $data = City::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo'))
            {
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->photo);
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
            $data = City::findOrFail($id1);
            $data->status = $id2;
            $data->update();
        }


    //*** GET Request Delete
    public function destroy($id)
    {
        $data = City::findOrFail($id);
        $data->delete();
        //--- Redirect Section     
       $msg = trans('Delete Msg');
        return response()->json([
            'status' => true,
            'msg'   =>  $msg
            ],200);     
        //--- Redirect Section Ends   
    }
    
    
      public function ckeckactivate(Request $request) {
        
             if (!empty($request->input('selected_products_activate'))) {
                
    
                    $selected_products = explode(',', $request->input('selected_products_activate'));
    
                  
    
                    $products = City::whereIn('id', $selected_products)
                                        ->update(['status' => 1]);
                                        
             $msg = 'City activate Successfully.';
           return redirect()->back()->with('success',$msg);
         }else{
             return redirect()->back(); 
         }
     
   
    }  
      public function ckeckall(Request $request) {
        
             if (!empty($request->input('selected_products'))) {
                
    
                    $selected_products = explode(',', $request->input('selected_products'));
    
                  
    
                    $products = City::whereIn('id', $selected_products)
                                        ->update(['status' => 0]);
                                        
              $msg = 'City Deactivate Successfully.';
             return redirect()->back()->with('success',$msg);
                }else{
             return redirect()->back(); 
         }
     
   
    }
    
    
     public function ckeckdelete(Request $request) {
        
             if (!empty($request->input('selected_products_delete'))) {
                
    
                    $selected_products = explode(',', $request->input('selected_products_delete'));
    
                  
    
                    $products = City::whereIn('id', $selected_products)
                                        ->get();
                                        
        foreach($products as $data){
         

                  
            
    
      
      
              $data->delete();
         }                      
                                        
          
            
          return redirect()->back()->with('success','City deleted Successfully.');
         }else{
             return redirect()->back(); 
         }
     
   
    }


    
}
