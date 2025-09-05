<?php

namespace App\Http\Controllers\Admin;

use App\Models\Childcategory;
use App\Models\Subcategory;
use DataTables;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Related;
use App\Models\Category;

use App\Models\Gallery;
use App\Models\Color;
use App\Models\ProductNotify;
use App\Models\Zone;
use App\Models\Attribute;
use App\Models\AttributeOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Image;
use DB;
use App;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Product::orderBy('id','desc')->get();

         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('name', function(Product $data) {
                                $name = mb_strlen(strip_tags($data->name),'utf-8') > 50 ? mb_substr(strip_tags($data->name),0,50,'utf-8').'...' : strip_tags($data->name);

                                return  $name;
                            })

                            ->addColumn('status', function(Product $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-prod-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><<option data-val="0" value="'. route('admin-prod-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })  ->addColumn('checkbox', function(Product $data) {
                              
                                return '<div class="">
                                <label class="container">
                                <input type="checkbox" name="id['.$data->id.'][]" value="'.$data->id.'" class="all row-select">
                                 <span class="checkmark" style="top: -27px;"></span>
                               </label>
                                </div>';
                            })
                            ->addColumn('action', function(Product $data) {
                                $catalog = $data->type == 'Physical' ? ($data->is_catalog == 1 ?
                                    '<a href="javascript:;" data-href="' . route('admin-prod-catalog',['id1' => $data->id, 'id2' => 0]) . '" data-toggle="modal" data-target="#catalog-modal" class="delete"><i class="fas fa-trash-alt"></i> Remove Catalog</a>' : '<a href="javascript:;" data-href="'. route('admin-product-catalog',['id1' => $data->id, 'id2' => 1]) .'" data-toggle="modal" data-target="#catalog-modal"> <i class="fas fa-plus"></i> Add To Catalog</a>') : '';
                                return '<div class="godropdown"><button class="go-dropdown-toggle"> Actions<i class="fas fa-chevron-down"></i></button><div class="action-list">
<a href="' . route('admin-product-edit',$data->id) . '"> <i class="fas fa-edit"></i> Edit</a>

<a href="javascript:;" data-href="' . route('admin-product-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i> Delete</a></div></div>';
                            })
                            ->rawColumns(['name','thumbnail', 'checkbox', 'status', 'action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }



    //*** GET Request
    public function index()
    {
        return view('admin.product.index');
    }

    //*** GET Request
    public function createPhysical()
    {
        $pro = Product::where('status','=',1)->orderBy('id','desc')->get();

       $cats = Category::where('type','product')->get();

        return view('admin.product.create.physical',compact('cats','pro'));
    }   

    //*** GET Request
    public function status($id1,$id2)
    {
        $data = Product::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }



    //*** POST Request
    //*** POST Request
    public function store(Request $request)
    {
        

        
        
        
        //--- Validation Section
        $rules = [
            
            'name'                     => 'required',
            'name_ar'                  =>'required',

            'category_id'              =>'required',

          
        ];

        
        
       $messages =[
          
          'name.required'                       => trans('Product name Required'),
          'name_ar.required'                    => trans('Product ArabicName Required'),

          'category_id.required'                =>trans('ProdCat Required'),
        
        ];
  
    
    
    
  
        
         $validator  = Validator::make($request->all(),$rules,$messages);
        
        
          if ($validator->fails()) {
            return response()->json([
                "status" =>  false,
                "errors" =>  $validator->messages(),
                ],200);
        }
        
        // //--- Validation Section Ends

        //--- Logic Section
        $data = new Product;

        $input = $request->all();

         if ($file = $request->file('photo'))
         {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/products',$name);
            $input['photo'] = $name;
        }

   if ($file = $request->file('icon_photo'))
         {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/products',$name);
            $input['icon_photo'] = $name;
        }

      if ($file = $request->file('video_photo'))
         {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/products',$name);
            $input['video_photo'] = $name;
        }


        // Check Seo
        if (empty($request->seo_check))
        {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
            $input['meta_description_ar'] = null;
        }
        else {
            if (!empty($request->meta_tag))
            {
                $input['meta_tag'] = implode(',', $request->meta_tag);
            }
        }




        //tags
        if (!empty($request->tags))
        {
            $input['tags'] = implode(',', $request->tags);
        }

       if (!empty($request->tags_ar))
        {
            $input['tags_ar'] = implode(',', $request->tags_ar);
        } 




        // store filtering attributes for physical product
        $attrArr = [];
        if (!empty($request->category_id)) {
          $catAttrs = Attribute::where('attributable_id', $request->category_id)->where('attributable_type', 'App\Models\Category')->get();
          if (!empty($catAttrs)) {
            foreach ($catAttrs as $key => $catAttr) {
              $in_name = $catAttr->input_name;
              if ($request->has("$in_name")) {
                $attrArr["$in_name"]["values"] = $request["$in_name"];
                $attrArr["$in_name"]["prices"] = $request["$in_name"."_price"];
                if ($catAttr->details_status) {
                  $attrArr["$in_name"]["details_status"] = 1;
                } else {
                  $attrArr["$in_name"]["details_status"] = 0;
                }
              }
            }
          }
        }




        if (empty($attrArr)) {
          $input['attributes'] = NULL;
        } else {
          $jsonAttr = json_encode($attrArr);
          $input['attributes'] = $jsonAttr;
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

        // Save Data
        $data->fill($input)->save();



        // Set SLug
        $prod = Product::find($data->id);
        if($prod->type != 'Physical'){
            $prod->slug = str_slug($data->name,'-').'-'.strtolower(str_random(3).$data->id.str_random(3));
          //  $prod->slug_ar = str_slug($data->name_ar,'-').'-'.strtolower(str_random(3).$data->id.str_random(3));
            $prod->slug_ar = preg_replace('/\s+/', '-', $data->name_ar).'-'.strtolower(str_random(3).$data->id.str_random(3));
        }
        else {
            $prod->slug = str_slug($data->name,'-').'-'.strtolower($data->sku);
          //  $prod->slug_ar = str_slug($data->name_ar,'-').'-'.strtolower($data->sku);
            $prod->slug_ar = preg_replace('/\s+/', '-', $data->name_ar).'-'.strtolower($data->sku);
        }


        $prod->update();
        
        
        
       
        
        
        

        

        
    
        

      
     $msg = trans('Add Success');
      
   
    
     return response()->json([
                "status" =>  true,
                "msg" => $msg
                ],200);
        //--- Redirect Section Ends
        

        
        
        
    }




    //*** GET Request
    public function edit($id)
    {


        $cats = Category::where('type','product')->get();
        $data = Product::findOrFail($id);

      

            return view('admin.product.edit.physical',compact('cats','data'));
    } 

    //*** POST Request


    public function update(Request $request, $id)
    {
      // return $request;
        //--- Validation Section
        $rules = [
            
            'name'                     => 'required',
            'name_ar'                  =>'required',

        ];

        
        
       $messages =[
          
          'name.required'                       => trans('ProdName Required'),
          'name_ar.required'                    => trans('ProdArabicName Required'),

        
        
        ];
  
    
    
    
  
        
         $validator  = Validator::make($request->all(),$rules,$messages);
        
        
          if ($validator->fails()) {
            return response()->json([
                "status" =>  false,
                "errors" =>  $validator->messages(),
                ],200);
        }
       

        // $validator = Validator::make($request->all(), $rules);

        // if ($validator->fails()) {
        //   return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        // }
        //--- Validation Section Ends


        //-- Logic Section
        $data = Product::findOrFail($id);

        $input = $request->all();


              if ($file = $request->file('photo'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images/products',$name);
                if($data->photo != null)
                {
                    if (file_exists(public_path().'/assets/images/products/'.$data->photo)) {
                        unlink(public_path().'/assets/images/products/'.$data->photo);
                    }
                }
            $input['photo'] = $name;
            }  
            

              if ($file = $request->file('icon_photo'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images/products',$name);
                if($data->icon_photo != null)
                {
                    if (file_exists(public_path().'/assets/images/products/'.$data->icon_photo)) {
                        unlink(public_path().'/assets/images/products/'.$data->icon_photo);
                    }
                }
            $input['icon_photo'] = $name;
            }  
            

              if ($file = $request->file('video_photo'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images/products',$name);
                if($data->video_photo != null)
                {
                    if (file_exists(public_path().'/assets/images/products/'.$data->video_photo)) {
                        unlink(public_path().'/assets/images/products/'.$data->video_photo);
                    }
                }
            $input['video_photo'] = $name;
            }  
            

        
            // Check Seo
        if (empty($request->seo_check))
         {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
         }
         else {
        if (!empty($request->meta_tag))
         {
            $input['meta_tag'] = implode(',', $request->meta_tag);
         }
         }




        //Product Tags
        if (!empty($request->tags))
         {
            $input['tags'] = implode(',', $request->tags);
         }
        if (empty($request->tags))
         {
            $input['tags'] = null;
         }
         
         
           if (!empty($request->tags_ar))
        {
            $input['tags_ar'] = implode(',', $request->tags_ar);
        } 

           if (empty($request->tags_ar))
        {
            $input['tags_ar'] = null;
        } 


         // store filtering attributes for physical product
         $attrArr = [];
         if (!empty($request->category_id)) {
           $catAttrs = Attribute::where('attributable_id', $request->category_id)->where('attributable_type', 'App\Models\Category')->get();
           if (!empty($catAttrs)) {
             foreach ($catAttrs as $key => $catAttr) {
               $in_name = $catAttr->input_name;
               if ($request->has("$in_name")) {
                 $attrArr["$in_name"]["values"] = $request["$in_name"];
                 $attrArr["$in_name"]["prices"] = $request["$in_name"."_price"];
                 if ($catAttr->details_status) {
                   $attrArr["$in_name"]["details_status"] = 1;
                 } else {
                   $attrArr["$in_name"]["details_status"] = 0;
                 }
               }
             }
           }
         }




         if (empty($attrArr)) {
           $input['attributes'] = NULL;
         } else {
           $jsonAttr = json_encode($attrArr);
           $input['attributes'] = $jsonAttr;
         }



                  $data->slug = str_slug($data->name,'-').'-'.strtolower(str_random(3).$data->id.str_random(3));
          //  $data->slug_ar = str_slug($data->name_ar,'-').'-'.strtolower(str_random(3).$data->id.str_random(3));
            $data->slug_ar = preg_replace('/\s+/', '-', $data->name_ar).'-'.strtolower(str_random(3).$data->id.str_random(3));


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
        //-- Logic Section Ends





        //--- Redirect Section
        
        
        
        
        
$msg = trans('Update Success');
 return response()->json([
                "status" =>  true,
                "msg" => $msg
                ],200);
    
        
        
        
        
        
      /*  $msg = 'Product Updated Successfully.<a href="'.route('admin-prod-index').'">View Product Lists.</a>';
        return response()->json($msg);*/
        
        
        //--- Redirect Section Ends
    }


    //*** GET Request

    //*** POST Request

    
        public function destroy($id)
    {

        $data = Product::findOrFail($id);

     

        $data->delete();
        //--- Redirect Section
        $msg = trans('Delete Msg');
        return response()->json([
            'status' => true,
            'msg'   =>  $msg
            ],200);
        //--- Redirect Section Ends

// Product DELETE ENDS
    }

    public function getAttributes(Request $request) {
      $model = '';
      if ($request->type == 'category') {
        $model = 'App\Models\Category';
      } elseif ($request->type == 'subcategory') {
        $model = 'App\Models\Subcategory';
      } elseif ($request->type == 'childcategory') {
        $model = 'App\Models\Childcategory';
      }

      $attributes = Attribute::where('attributable_id', $request->id)->where('attributable_type', $model)->get();
      $attrOptions = [];
      foreach ($attributes as $key => $attribute) {
        $options = AttributeOption::where('attribute_id', $attribute->id)->get();
        $attrOptions[] = ['attribute' => $attribute, 'options' => $options];
      }
      return response()->json($attrOptions);
    }  
    
    public function ckeckall(Request $request) {
        
             if (!empty($request->input('selected_products'))) {
                
    
                    $selected_products = explode(',', $request->input('selected_products'));
    
                  
    
                    $products = Product::whereIn('id', $selected_products)
                                        ->update(['status' => 0]);
                                        
              $msg = 'Product Deactivate Successfully.';
           //  return redirect()->back()->with('success',$msg);
           
              
                 return response()->json([
                                "status" =>  true,
                                "msg" => $msg
                                ],200);
                }else{
             return redirect()->back(); 
         }
     
   
    }
    public function ckeckactivate(Request $request) {
        
             if (!empty($request->input('selected_products_activate'))) {
                
    
                    $selected_products = explode(',', $request->input('selected_products_activate'));
    
                  
    
                    $products = Product::whereIn('id', $selected_products)
                                        ->update(['status' => 1]);
                                        
             $msg = 'Product activate Successfully.';
           return redirect()->back()->with('success',$msg);
         }else{
             return redirect()->back(); 
         }
     
   
    }   
    public function ckeckcatalog(Request $request) {
        
             if (!empty($request->input('selected_products_catalog'))) {
                
    
                    $selected_products = explode(',', $request->input('selected_products_catalog'));
    
                  
    
                    $products = Product::whereIn('id', $selected_products)
                                        ->update(['is_catalog' => 1]);
                                        
             $msg = 'Product add to Catalog Successfully.';
           return redirect()->back()->with('success',$msg);
         }else{
             return redirect()->back(); 
         }
     
   
    }
    public function ckeckdelete(Request $request) {
        
             if (!empty($request->input('selected_products_delete'))) {
                
    
                    $selected_products = explode(',', $request->input('selected_products_delete'));
    
                  
    
                    $products = Product::whereIn('id', $selected_products)
                                        ->get();
                                        
 foreach($products as $data){

      
        
          $data->delete();
        
         }                      
                                        
                                        
             $msg = 'Product deleted Successfully.';
           return redirect()->back()->with('success',$msg);
         }else{
             return redirect()->back(); 
         }
     
   
    }








    //*** GET Request
    public function load($id)
    {
        $cat = Category::findOrFail($id);
        return view('load.subcategory',compact('cat'));
    }
    
    
    
    
    
}
