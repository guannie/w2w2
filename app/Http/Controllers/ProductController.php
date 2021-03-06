<?php

namespace App\Http\Controllers;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Package;
use App\User;
use Carbon\Carbon;


class ProductController extends Controller
{


    public function index(){
        
       
        $finalArray = array();
        $products = Product::all();
                    

            
            foreach ($products as $product){

                $json_array = json_decode($product->product_image, true);
                $imageArray = array();
                
                        foreach ($json_array as $pic)
                        {
                            $public = rtrim(app()->basePath('public/image'), '/');
                            $imagepath = $public.'/'.$pic;
                            
          
                            $imagetempArray = [
                                'image' => $imagepath,
                            ];
          
                            array_push($imageArray,$imagetempArray);
                        }
               
                        $json_arrays = json_decode($product->product_location, true);
                        $locationArray = array();
            
                                foreach ($json_arrays as $locate)
                                {
                                    $locationtempArray = [
                                          'location' => $locate,
                                    ];
            
                                    array_push($locationArray,$locationtempArray);
            
                                }
            
                        
            
                        $json_longitud = json_decode($product->longitud, true);
                        $longitudArray = array();
                    
                                    foreach ($json_longitud as $longitude)
                                    {
                                        $longitudtempArray = [
                                              'longitud' => $longitude,
                                        ];
                    
                                            array_push($longitudArray,$longitudtempArray);
                    
                                        }
            
                        $json_latitud = json_decode($product->latitud, true);
                        $latitudArray = array();
                                    
                                    foreach ($json_latitud as $latitude)
                                     {
                                         $latitudtempArray = [
                                                'latitud' => $latitude,
                                         ];
                                    
                                            array_push($latitudArray,$latitudtempArray);
                                    
                                        }
            
                        $json_state = json_decode($product->product_state, true);
                        $stateArray = array();
                                                    
                                    foreach ($json_state as $states)
                                    {
                                        $statetempArray = [
                                            'state' => $states,
                                        ];
                                                    
                                             array_push($stateArray,$statetempArray);
                                                    
                                        }
                        
                       
                        $json_tag = json_decode($product->tagging, true);
                        $tagArray = array();
                                                                                    
                                     foreach ($json_tag as $tags)
                                    {
                                        $tagtempArray = [
                                             'tagging' => $tags,
                                        ];
                                                                                    
                                          array_push($tagArray,$tagtempArray);
                                                                                    
                                        }
                                        
                                       
                        $tempArray = [
                                  
                                            'product_id' => $product->product_id,
                                            'product_date' => $product->product_date,
                                            'product_name' => $product->product_name,
                                            'product_status' => $product->product_status,
                                            'product_material' => $product->product_material,
                                            'product_category' => $product->product_category,
                                            'product_target' => $product->product_target,
                                            'product_continuity' => $product->product_continuity,
                                            'product_quantity' => $product->product_quantity,
                                            'unit' => $product->unit,
                                            'product_price' => $product->product_price,
                                            'product_pricemax' => $product->product_pricemax,
                                            'product_period' => $product->product_period,
                                            'product_package' =>$product->product_package,
                                            'product_location' =>$locationArray,
                                            'latitud' => $latitudArray,
                                            'longitud' => $longitudArray,
                                            'product_state' => $stateArray,
                                            'product_transport' =>$product->product_transport,
                                            'product_description' => $product->product_description,
                                            'product_image' => $imageArray,
                                            'mainstatus' => $product->mainstatus,
                                            'website' => $product->website,
                                            'user_id' => $product->user_id,
                                            'company_name' => $product->company_name,
                                            'company_email' => $product->company_email,
                                            'company_contact' => $product->company_contact,
                                            'tagging' => $tagArray,
                                            'name' => $product->name,
                                            'contact' => $product->contact,
                                            'publishstatus' => $product->publishstatus,
                                            'expired_at' => $product->expired_at,
                                            'created_at' => $product->created_at->format('d M Y - H:i:s'),
                                            'updated_at' => $product->updated_at->format('d M Y - H:i:s'),
                                         ];
                         
                        array_push($finalArray,$tempArray);
                          }        
                         return response()->json($finalArray); 
            }
 
   
    



    public function show(Request $request)

    {
        $product_id = $request->input('product_id');
        $finalArray = array();
        $products = Product::where('product_id',$product_id)->get();

        foreach ($products as $product){

            $json_array = json_decode($product->product_image, true);
            $imageArray = array();
            
                    foreach ($json_array as $pic)
                    {
                        $public = rtrim(app()->basePath('public/image'), '/');
                        $imagepath = $public.'/'.$pic;
                        
      
                        $imagetempArray = [
                            'image' => $imagepath,
                        ];
      
                        array_push($imageArray,$imagetempArray);
                    }

            $json_arrays = json_decode($product->product_location, true);
            $locationArray = array();

                    foreach ($json_arrays as $locate)
                    {
                        $locationtempArray = [
                              'location' => $locate,
                        ];

                        array_push($locationArray,$locationtempArray);

                    }

            

            $json_longitud = json_decode($product->longitud, true);
            $longitudArray = array();
        
                        foreach ($json_longitud as $longitude)
                        {
                            $longitudtempArray = [
                                  'longitud' => $longitude,
                            ];
        
                                array_push($longitudArray,$longitudtempArray);
        
                            }

            $json_latitud = json_decode($product->latitud, true);
            $latitudArray = array();
                        
                        foreach ($json_latitud as $latitude)
                         {
                             $latitudtempArray = [
                                    'latitud' => $latitude,
                             ];
                        
                                array_push($latitudArray,$latitudtempArray);
                        
                            }

            $json_state = json_decode($product->product_state, true);
            $stateArray = array();
                                        
                        foreach ($json_state as $states)
                        {
                            $statetempArray = [
                                'state' => $states,
                            ];
                                        
                                 array_push($stateArray,$statetempArray);
                                        
                            }

            $json_tag = json_decode($product->tagging, true);
            $tagArray = array();
                                                        
                foreach ($json_tag as $tags)
                {
                 $tagtempArray = [
                    'tagging' => $tags,
                ];
                                                        
              array_push($tagArray,$tagtempArray);
                                                        
                }
            
           
             $tempArray = [
      
                'product_id' => $product->product_id,
                'product_date' => $product->product_date,
                'product_name' => $product->product_name,
                'product_status' => $product->product_status,
                'product_material' => $product->product_material,
                'product_category' => $product->product_category,
                'product_target' => $product->product_target,
                'product_continuity' => $product->product_continuity,
                'product_quantity' => $product->product_quantity,
                'unit' => $product->unit,
                'product_price' => $product->product_price,
                'product_pricemax' => $product->product_pricemax,
                'product_period' => $product->product_period,
                'product_package' =>$product->product_package,
                'product_location' =>$locationArray,
                'latitud' => $latitudArray,
                'longitud' => $longitudArray,
                'product_state' => $stateArray,
                'product_transport' =>$product->product_transport,
                'product_description' => $product->product_description,
                'product_image' => $imageArray,
                'mainstatus' => $product->mainstatus,
                'website' => $product->website,
                'user_id' => $product->user_id,
                'company_name' => $product->company_name,
                'company_email' => $product->company_email,
                'company_contact' => $product->company_contact,
                'tagging' => $tagArray,
                'name' => $product->name,
                'contact' => $product->contact,
                'publishstatus' => $product->publishstatus,
                'expired_at' => $product->expired_at,
             ];
             
            array_push($finalArray,$tempArray);
              }        
             return response()->json($finalArray); 


    
}

    public function store(Request $request)
    {
        
            $product_date = $request->input('product_date');
            $product_name = $request->input('product_name');
            $product_material = $request->input ('product_material');
            $maincategory = $request->input('maincategory');
            $product_category = $request->input ('product_category');
            $product_target = $request->input('product_target');
            $product_continuity = $request->input ('product_season');
            $product_quantity = $request->input ('product_quantity');
            $unit = $request->input('unit');
            $availability = $request->input('availability');
            $product_price = $request->input ('product_price');
            $product_pricemax = $request->input('product_pricemax');
            $product_period = $request->input('product_period');
            $product_package = $request->input('product_package');
            $product_location = $request->input('product_location');
            $longitud = $request->input('longitud');
            $latitud = $request->input('latitud');
            $tagging = $request->input('tagging');
            $product_state = $request->input('product_state');
            $product_transport = $request->input('product_transport');
            $product_description = $request->input('product_description');  
            $product_image = $request->file('product_image');
            $mainstatus = $request->input('mainstatus');
            $website = $request->input('website');
            $user_id = $request->input('user_id');  
            $package_id = $request->input('package_id');    
            $product_status = 'processed';
            $company_name = $request->input('company_name');
            $company_email = $request->input('company_email');
            $company_contact = $request->input('company_contact');
            $name = $request->input('name');
            $contact = $request->input('contact');
            $publishstatus = $request->input('publishstatus');

             $locations=array();  
          
              foreach($product_location as $location)
              {
                 $locations[] = $location;

              }

             $tag=array();
             foreach($tagging as $taggings)
             {
                 $tag[] = $taggings;
             }
              


             $longituds=array();
              foreach($longitud as $longitude)
              {
                  $longituds[] = $longitude;
              }

              $latituds=array();
              foreach($latitud as $latitude)
              {
                  $latituds[] = $latitude;
              }

              $states=array();
              foreach($product_state as $stated)
              {
                  $states[] = $stated;
              }



              $images=array();

              
                foreach( $product_image as $image){ 

                 $extention = $image->getClientOriginalExtension();
                 $imagename = rand(11111, 99999) . '.' . $extention;
                 $destinationPath = 'image';
                 $image->move($destinationPath, $imagename);
                 $images[] = $imagename;

                }
        
        $file = new Product();
        $file->product_date = $product_date;
        $file->product_name = $product_name;
        $file->product_status = $product_status;
        $file->product_material = $product_material;
        $file->maincategory = $maincategory;
        $file->product_category = $product_category;
        $file->product_target = $product_target;
        $file->product_continuity = $product_continuity;
        $file->product_quantity = $product_quantity;
        $file->unit = $unit;
        $file->availability = $availability;
        $file->product_price = $product_price;
        $file->product_pricemax = $product_pricemax;
        $file->product_period = $product_period;
        $file->product_package = $product_package;
        $file->product_location = json_encode($locations);
        $file->latitud = json_encode($latituds);
        $file->longitud = json_encode($longituds);
        $file->product_state = json_encode($states);
        $file->product_transport = $product_transport;
        $file->product_description = $product_description;
        $file->product_image = json_encode($images);
        $file->mainstatus = $mainstatus;
        $file->website = $website;
        $file->user_id = $user_id;
        $file->package_id = $package_id;   
        $file->company_name = $company_name;
        $file->company_email = $company_email;
        $file->company_contact = $company_contact;
        $file->tagging = json_encode($tag);
        $file->name = $name;
        $file->contact = $contact;
        $file->publishstatus = $publishstatus;
        $file->save(); 

        return response()->json('product added');
 
                
    
    

             
}
    



    public function update(Request $request)
   {
    
    $product_id = $request->input('product_id');
      
    $data=Product::where('product_id',$product_id)->first();
    
    $product_date = $request->input('product_date');
    $product_name = $request->input('product_name');
    $product_material = $request->input ('product_material');
    $maincategory = $request->input('maincategory');
    $product_category = $request->input ('product_category');
    $product_target = $request->input('product_target');
    $product_continuity = $request->input ('product_season');
    $product_quantity = $request->input ('product_quantity');
    $unit = $request->input('unit');
    $availability = $request->input('availability');
    $product_price = $request->input ('product_price');
    $product_pricemax = $request->input ('product_pricemax');
    $product_period = $request->input('product_period');
    $product_package = $request->input('product_package');
    $product_location = $request->input('product_location');
    $longitud = $request->input('longitud');
    $latitud = $request->input('latitud');
    $product_state = $request->input('product_state');
    $product_transport = $request->input('product_transport');
    $product_description = $request->input('product_description');  
    $product_image = $request->file('product_image');
    $mainstatus = $request->input('mainstatus');
    $website = $request->input('website');
    $user_id = $request->input('user_id');  
    $package_id = $request->input('package_id');   
    $product_status = $request->input('product_status');
    $company_name = $request->input('company_name');
    $company_email = $request->input('company_email');
    $company_contact = $request->input('company_contact');
    $tagging = $request->input('tagging');
    $name = $request->input('name');
    $contact = $request->input('contact');
    $publishstatus = $request->input('publishstatus');


    if ($product_date == null) {
        $product_date = $data->product_date;
    }

    if ($product_name == null) {
        $product_name = $data->product_name;
    }

    if ($product_status == null) {
        $product_status = $data->product_status;
    }

    if ($product_material == null) {
        $product_material = $data->product_material;
    }

    if ($maincategory == null) {
        $maincategory = $data->maincategory;
    }

    if ($product_category == null) {
        $product_category = $data->product_category;
    }

    if ($product_target == null) {
        $product_target = $data->product_target;
    }

    if ($product_continuity == null) {
        $product_continuity = $data->product_continuity;
    }

    if ($product_quantity == null) {
        $product_quantity = $data->product_quantity;
    }
    if ($unit == null) {
        $unit = $data->unit;
    }

    if($availability == null)
       {
        $availability = $data->availability;
       }

    if ($product_price == null) {
        $product_price = $data->product_price;
    }

    if ($product_pricemax == null) {
        $product_pricemax = $data->product_pricemax;
    }

    if ($product_period == null) {
        $product_period = $data->product_period;
    }

    if ($product_package == null) {
        $product_package = $data->product_package;
    }

    if ($product_location == null) {
        $json_arrays = json_decode($data->product_location, true);
        $locations = array();

                foreach ($json_arrays as $locate)
                {
                  $locations[] = $locate;

                }

    }

    else
    {
        $locations=array();
        foreach($product_location as $location)
        {
           $locations[] = $location;

        }
    }

    if($latitud == null) {
        $json_latitud = json_decode($data->latitud, true);
        $latituds = array();
                    
                    foreach ($json_latitud as $latitude)
                     {
                           $latituds[] = $latitude;
                    
                        }
    }

    else{

        $latituds=array();
        foreach($latitud as $latitude)
        {
            $latituds[] = $latitude;
        }

    }

    if($longitud == null)
    {
        $json_longitud = json_decode($data->longitud, true);
        $longituds = array();
    
                    foreach ($json_longitud as $longitude)
                    {
                        $longituds[] = $longitude;
    
                        }
    }
    else{
        $longituds=array();
        foreach($longitud as $longitude)
        {
            $longituds[] = $longitude;
        }

    }

    if ($product_state == null) {
        $json_state = json_decode($data->product_state, true);
        $states = array();
                                    
                    foreach ($json_state as $stated)
                    {
                       
                            $states[] = $stated;
                  
                               
                                  
                        }
    }
    else{
        $states=array();
        foreach($product_state as $stated)
        {
            $states[] = $stated;
        }
    }

    if ($product_transport == null) {
        $product_transport = $data->product_transport;
    }

    if ($product_description == null) {
        $product_description = $data->product_description;
    }

    if ($product_image == null) {
        $json_array = json_decode($data->product_image, true);
        $images = array();
        
                foreach ($json_array as $pic)
                {
                  $images[] = $pic;
                }
    } 
    else {

        $images=array();
        $product_image = $request->file('product_image'); 
                 
        foreach( $product_image as $image){ 

         $extention = $image->getClientOriginalExtension();
         $imagename = rand(11111, 99999) . '.' . $extention;
         $destinationPath = 'image';
         $image->move($destinationPath, $imagename);
         $images[] = $imagename;

        }
    }

    if ($mainstatus == null)
    {
        $mainstatus = $data->mainstatus;
    }
    
    if($website == null){

        $website = $data->website;
    }

    if($company_name == null){

        $company_name = $data->company_name;
    }

    if($company_email == null){

        $company_email = $data->company_email;
    }

    if($company_contact == null){

        $company_contact = $data->company_contact;
    }

    if ($tagging == null) {
        $json_tag = json_decode($data->tagging, true);
        $taggings = array();
                                                    
            foreach ($json_tag as $tags)
            {
          
                $taggings[] = $tags;

            }
    }
    else{
        $taggings=array();
        foreach($tagging as $tagged)
        {
            $taggings[] = $tagged;
        }
    }

    if($name == null){

        $name = $data->name;
    }

    if($contact == null){

        $contact = $data->contact;
    }

    if($publishstatus == null){

        $publishstatus = $data->publishstatus;
    }

    $data->product_date = $product_date;
    $data->product_name = $product_name;
    $data->product_status = $product_status;
    $data->product_material = $product_material;
    $data->product_category = $product_category;
    $data->product_target = $product_target;
    $data->product_continuity = $product_continuity;
    $data->product_quantity = $product_quantity;
    $data->unit = $unit;
    $data->availability = $availability;
    $data->product_price = $product_price;
    $data->product_pricemax = $product_pricemax;
    $data->product_period = $product_period;
    $data->product_package = $product_package;
    $data->product_location = json_encode($locations);
    $data->latitud = json_encode($latituds);
    $data->longitud = json_encode($longituds);
    $data->product_state = json_encode($states);
    $data->product_transport = $product_transport;
    $data->product_description = $product_description;
    $data->product_image = json_encode($images);
    $data->mainstatus = $mainstatus;
    $data->website = $website;
    $data->company_name = $company_name;
    $data->company_email = $company_email;
    $data->company_contact = $company_contact;
    $data->tagging = json_encode($taggings);
    $data->name = $name;
    $data->contact = $contact;
    $data->publishstatus = $publishstatus;
    $data->save();

    return response()->json('product updated');

 

   } 

   public function destroy(Request $request){
 
    $product_id = $request->input('product_id');
      
    $data = Product::where('product_id',$product_id)->first();
    $data->delete();

    return response()->json('product success deleted');
}



  public function listcategory(Request $request)
  {
    
      $product_category = $request->input('product_category');
      $finalArray = array();
      $products = Product::where('product_category',$product_category)->get();

      foreach ($products as $product){

      $json_array = json_decode($product->product_image, true);
      $imageArray = array();
      
              foreach ($json_array as $pic)
              {
                  $public = rtrim(app()->basePath('public/image'), '/');
                  $imagepath = $public.'/'.$pic;
                  

                  $imagetempArray = [
                      'image' => $imagepath,
                  ];

                  array_push($imageArray,$imagetempArray);
              }
     
              $json_arrays = json_decode($product->product_location, true);
              $locationArray = array();
  
                      foreach ($json_arrays as $locate)
                      {
                          $locationtempArray = [
                                'location' => $locate,
                          ];
  
                          array_push($locationArray,$locationtempArray);
  
                      }
  
              
  
              $json_longitud = json_decode($product->longitud, true);
              $longitudArray = array();
          
                          foreach ($json_longitud as $longitude)
                          {
                              $longitudtempArray = [
                                    'longitud' => $longitude,
                              ];
          
                                  array_push($longitudArray,$longitudtempArray);
          
                              }
  
              $json_latitud = json_decode($product->latitud, true);
              $latitudArray = array();
                          
                          foreach ($json_latitud as $latitude)
                           {
                               $latitudtempArray = [
                                      'latitud' => $latitude,
                               ];
                          
                                  array_push($latitudArray,$latitudtempArray);
                          
                              }
  
              $json_state = json_decode($product->product_state, true);
              $stateArray = array();
                                          
                          foreach ($json_state as $states)
                          {
                              $statetempArray = [
                                  'state' => $states,
                              ];
                                          
                                   array_push($stateArray,$statetempArray);
                                          
                              }
              
             
                              $json_tag = json_decode($product->tagging, true);
                              $tagArray = array();
                                                                          
                                  foreach ($json_tag as $tags)
                                  {
                                   $tagtempArray = [
                                      'tagging' => $tags,
                                  ];
                                                                          
                                array_push($tagArray,$tagtempArray);
                                                                          
                                  }
                              
                             
                               $tempArray = [
                        
                                  'product_id' => $product->product_id,
                                  'product_date' => $product->product_date,
                                  'product_name' => $product->product_name,
                                  'product_status' => $product->product_status,
                                  'product_material' => $product->product_material,
                                  'maincategory' => $product->maincategory,
                                  'product_category' => $product->product_category,
                                  'product_target' => $product->product_target,
                                  'product_continuity' => $product->product_continuity,
                                  'product_quantity' => $product->product_quantity,
                                  'unit' => $product->unit,
                                  'availability' => $product->availability,
                                  'product_price' => $product->product_price,
                                  'product_pricemax' => $product->product_pricemax,
                                  'product_period' => $product->product_period,
                                  'product_package' =>$product->product_package,
                                  'product_location' =>$locationArray,
                                  'latitud' => $latitudArray,
                                  'longitud' => $longitudArray,
                                  'product_state' => $stateArray,
                                  'product_transport' =>$product->product_transport,
                                  'product_description' => $product->product_description,
                                  'product_image' => $imageArray,
                                  'mainstatus' => $product->mainstatus,
                                  'website' => $product->website,
                                  'user_id' => $product->user_id,
                                  'company_name' => $product->company_name,
                                  'company_email' => $product->company_email,
                                  'company_contact' => $product->company_contact,
                                  'tagging' => $tagArray,
                                  'name' => $product->name,
                                  'contact' => $product->contact,
                                  'publishstatus' => $product->publishstatus,
                                  'expired_at' => $product->expired_at,
                                  'created_at' => $product->created_at->format('d M Y - H:i:s'),
                                  'updated_at' => $product->updated_at->format('d M Y - H:i:s'),
                               ];
               
              array_push($finalArray,$tempArray);
                }        
               return response()->json($finalArray); 

    } 


    public function listuserproduct(Request $request)

    {
        $user_id = $request->input('user_id');
        $finalArray = array();
        $products = Product::where('user_id',$user_id)->get();

        foreach ($products as $product){

            $json_array = json_decode($product->product_image, true);
            $imageArray = array();
            
                    foreach ($json_array as $pic)
                    {
                        $public = rtrim(app()->basePath('public/image'), '/');
                        $imagepath = $public.'/'.$pic;
                        
      
                        $imagetempArray = [
                            'image' => $imagepath,
                        ];
      
                        array_push($imageArray,$imagetempArray);
                    }
           
                    $json_arrays = json_decode($product->product_location, true);
                    $locationArray = array();
        
                            foreach ($json_arrays as $locate)
                            {
                                $locationtempArray = [
                                      'location' => $locate,
                                ];
        
                                array_push($locationArray,$locationtempArray);
        
                            }
        
                    
        
                    $json_longitud = json_decode($product->longitud, true);
                    $longitudArray = array();
                
                                foreach ($json_longitud as $longitude)
                                {
                                    $longitudtempArray = [
                                          'longitud' => $longitude,
                                    ];
                
                                        array_push($longitudArray,$longitudtempArray);
                
                                    }
        
                    $json_latitud = json_decode($product->latitud, true);
                    $latitudArray = array();
                                
                                foreach ($json_latitud as $latitude)
                                 {
                                     $latitudtempArray = [
                                            'latitud' => $latitude,
                                     ];
                                
                                        array_push($latitudArray,$latitudtempArray);
                                
                                    }
        
                    $json_state = json_decode($product->product_state, true);
                    $stateArray = array();
                                                
                                foreach ($json_state as $states)
                                {
                                    $statetempArray = [
                                        'state' => $states,
                                    ];
                                                
                                         array_push($stateArray,$statetempArray);
                                                
                                    }
                    
                   
                                    $json_tag = json_decode($product->tagging, true);
                                    $tagArray = array();
                                                                                
                                        foreach ($json_tag as $tags)
                                        {
                                         $tagtempArray = [
                                            'tagging' => $tags,
                                        ];
                                                                                
                                      array_push($tagArray,$tagtempArray);
                                                                                
                                        }
                                    
                                   
                                     $tempArray = [
                              
                                        'product_id' => $product->product_id,
                                        'product_date' => $product->product_date,
                                        'product_name' => $product->product_name,
                                        'product_status' => $product->product_status,
                                        'product_material' => $product->product_material,
                                        'maincategory' => $product->maincategory,
                                        'product_category' => $product->product_category,
                                        'product_target' => $product->product_target,
                                        'product_continuity' => $product->product_continuity,
                                        'product_quantity' => $product->product_quantity,
                                        'unit' => $product->unit,
                                        'availability' => $product->availability,
                                        'product_price' => $product->product_price,
                                        'product_pricemax' => $product->product_pricemax,
                                        'product_period' => $product->product_period,
                                        'product_package' =>$product->product_package,
                                        'product_location' =>$locationArray,
                                        'latitud' => $latitudArray,
                                        'longitud' => $longitudArray,
                                        'product_state' => $stateArray,
                                        'product_transport' =>$product->product_transport,
                                        'product_description' => $product->product_description,
                                        'product_image' => $imageArray,
                                        'mainstatus' => $product->mainstatus,
                                        'website' => $product->website,
                                        'user_id' => $product->user_id,
                                        'company_name' => $product->company_name,
                                        'company_email' => $product->company_email,
                                        'company_contact' => $product->company_contact,
                                        'tagging' => $tagArray,
                                        'name' => $product->name,
                                        'contact' => $product->contact,
                                        'publishstatus' => $product->publishstatus,
                                        'expired_at' => $product->expired_at,
                                        'created_at' => $product->created_at->format('d M Y - H:i:s'),
                                        'updated_at' => $product->updated_at->format('d M Y - H:i:s'),
                                     ];
                     
                    array_push($finalArray,$tempArray);
                      }        
                     return response()->json($finalArray); 
      

    }

    public function productstatus(Request $request)
    {
        $product_status = $request->input('product_status');
        $finalArray = array();
        $products = Product::where('product_status',$product_status)->get();


        foreach ($products as $product){

            $json_array = json_decode($product->product_image, true);
            $imageArray = array();
            
                    foreach ($json_array as $pic)
                    {
                        $public = rtrim(app()->basePath('public/image'), '/');
                        $imagepath = $public.'/'.$pic;
                        
      
                        $imagetempArray = [
                            'image' => $imagepath,
                        ];
      
                        array_push($imageArray,$imagetempArray);
                    }
           
                    $json_arrays = json_decode($product->product_location, true);
                    $locationArray = array();
        
                            foreach ($json_arrays as $locate)
                            {
                                $locationtempArray = [
                                      'location' => $locate,
                                ];
        
                                array_push($locationArray,$locationtempArray);
        
                            }
        
                    
        
                    $json_longitud = json_decode($product->longitud, true);
                    $longitudArray = array();
                
                                foreach ($json_longitud as $longitude)
                                {
                                    $longitudtempArray = [
                                          'longitud' => $longitude,
                                    ];
                
                                        array_push($longitudArray,$longitudtempArray);
                
                                    }
        
                    $json_latitud = json_decode($product->latitud, true);
                    $latitudArray = array();
                                
                                foreach ($json_latitud as $latitude)
                                 {
                                     $latitudtempArray = [
                                            'latitud' => $latitude,
                                     ];
                                
                                        array_push($latitudArray,$latitudtempArray);
                                
                                    }
        
                    $json_state = json_decode($product->product_state, true);
                    $stateArray = array();
                                                
                                foreach ($json_state as $states)
                                {
                                    $statetempArray = [
                                        'state' => $states,
                                    ];
                                                
                                         array_push($stateArray,$statetempArray);
                                                
                                    }
                    
                   
                                    $json_tag = json_decode($product->tagging, true);
                                    $tagArray = array();
                                                                                
                                        foreach ($json_tag as $tags)
                                        {
                                         $tagtempArray = [
                                            'tagging' => $tags,
                                        ];
                                                                                
                                      array_push($tagArray,$tagtempArray);
                                                                                
                                        }
                                    
                                   
                                     $tempArray = [
                              
                                        'product_id' => $product->product_id,
                                        'product_date' => $product->product_date,
                                        'product_name' => $product->product_name,
                                        'product_status' => $product->product_status,
                                        'product_material' => $product->product_material,
                                        'maincategory' => $product->maincategory,
                                        'product_category' => $product->product_category,
                                        'product_target' => $product->product_target,
                                        'product_continuity' => $product->product_continuity,
                                        'product_quantity' => $product->product_quantity,
                                        'unit' => $product->unit,
                                        'availability' => $product->availability,
                                        'product_price' => $product->product_price,
                                        'product_pricemax' => $product->product_pricemax,
                                        'product_period' => $product->product_period,
                                        'product_package' =>$product->product_package,
                                        'product_location' =>$locationArray,
                                        'latitud' => $latitudArray,
                                        'longitud' => $longitudArray,
                                        'product_state' => $stateArray,
                                        'product_transport' =>$product->product_transport,
                                        'product_description' => $product->product_description,
                                        'product_image' => $imageArray,
                                        'mainstatus' => $product->mainstatus,
                                        'website' => $product->website,
                                        'user_id' => $product->user_id,
                                        'company_name' => $product->company_name,
                                        'company_email' => $product->company_email,
                                        'company_contact' => $product->company_contact,
                                        'tagging' => $tagArray,
                                        'name' => $product->name,
                                        'contact' => $product->contact,
                                        'publishstatus' => $product->publishstatus,
                                        'expired_at' => $product->expired_at,
                                        'created_at' => $product->created_at->format('d M Y - H:i:s'),
                                        'updated_at' => $product->updated_at->format('d M Y - H:i:s'),
                                     ];
                     
                    array_push($finalArray,$tempArray);
                      }        
                     return response()->json($finalArray); 



    }


    public function mainstatus(Request $request)
    {
        $mainstatus = $request->input('mainstatus');
        $finalArray = array();
        $products = Product::where('mainstatus',$mainstatus)->get();


        foreach ($products as $product){

            $json_array = json_decode($product->product_image, true);
            $imageArray = array();
            
                    foreach ($json_array as $pic)
                    {
                        $public = rtrim(app()->basePath('public/image'), '/');
                        $imagepath = $public.'/'.$pic;
                        
      
                        $imagetempArray = [
                            'image' => $imagepath,
                        ];
      
                        array_push($imageArray,$imagetempArray);
                    }
           
              $json_arrays = json_decode($product->product_location, true);
            $locationArray = array();

                    foreach ($json_arrays as $locate)
                    {
                        $locationtempArray = [
                              'location' => $locate,
                        ];

                        array_push($locationArray,$locationtempArray);

                    }

            

            $json_longitud = json_decode($product->longitud, true);
            $longitudArray = array();
        
                        foreach ($json_longitud as $longitude)
                        {
                            $longitudtempArray = [
                                  'longitud' => $longitude,
                            ];
        
                                array_push($longitudArray,$longitudtempArray);
        
                            }

            $json_latitud = json_decode($product->latitud, true);
            $latitudArray = array();
                        
                        foreach ($json_latitud as $latitude)
                         {
                             $latitudtempArray = [
                                    'latitud' => $latitude,
                             ];
                        
                                array_push($latitudArray,$latitudtempArray);
                        
                            }

            $json_state = json_decode($product->product_state, true);
            $stateArray = array();
                                        
                        foreach ($json_state as $states)
                        {
                            $statetempArray = [
                                'state' => $states,
                            ];
                                        
                                 array_push($stateArray,$statetempArray);
                                        
                            }
            
           
                            $json_tag = json_decode($product->tagging, true);
                            $tagArray = array();
                                                                        
                                foreach ($json_tag as $tags)
                                {
                                 $tagtempArray = [
                                    'tagging' => $tags,
                                ];
                                                                        
                              array_push($tagArray,$tagtempArray);
                                                                        
                                }
                            
                           
                             $tempArray = [
                      
                                'product_id' => $product->product_id,
                                'product_date' => $product->product_date,
                                'product_name' => $product->product_name,
                                'product_status' => $product->product_status,
                                'product_material' => $product->product_material,
                                'maincategory' => $product->maincategory,
                                'product_category' => $product->product_category,
                                'product_target' => $product->product_target,
                                'product_continuity' => $product->product_continuity,
                                'product_quantity' => $product->product_quantity,
                                'unit' => $product->unit,
                                'availability' => $product->availability,
                                'product_price' => $product->product_price,
                                'product_pricemax' => $product->product_pricemax,
                                'product_period' => $product->product_period,
                                'product_package' =>$product->product_package,
                                'product_location' =>$locationArray,
                                'latitud' => $latitudArray,
                                'longitud' => $longitudArray,
                                'product_state' => $stateArray,
                                'product_transport' =>$product->product_transport,
                                'product_description' => $product->product_description,
                                'product_image' => $imageArray,
                                'mainstatus' => $product->mainstatus,
                                'website' => $product->website,
                                'user_id' => $product->user_id,
                                'company_name' => $product->company_name,
                                'company_email' => $product->company_email,
                                'company_contact' => $product->company_contact,
                                'tagging' => $tagArray,
                                'name' => $product->name,
                                'contact' => $product->contact,
                                'publishstatus' => $product->publishstatus,
                                'expired_at' => $product->expired_at,
                                'created_at' => $product->created_at->format('d M Y - H:i:s'),
                                'updated_at' => $product->updated_at->format('d M Y - H:i:s'),
                             ];
             
            array_push($finalArray,$tempArray);
              }        
             return response()->json($finalArray); 


    



    }


    public function usertype(Request $request)
    {


        $user_type = $request->input('user_type');
        $finalArray = array();
        $products = Product::all();

        foreach($products as $product){

            $data = User::where('user_id',$product->user_id)->first();
            
            if($data->user_type == $user_type){

                $json_array = json_decode($product->product_image, true);
                $imageArray = array();
                
                        foreach ($json_array as $pic)
                        {
                            $public = rtrim(app()->basePath('public/image'), '/');
                            $imagepath = $public.'/'.$pic;
                            
          
                            $imagetempArray = [
                                'image' => $imagepath,
                            ];
          
                            array_push($imageArray,$imagetempArray);
                        }

                        $json_arrays = json_decode($product->product_location, true);
            $locationArray = array();

                    foreach ($json_arrays as $locate)
                    {
                        $locationtempArray = [
                              'location' => $locate,
                        ];

                        array_push($locationArray,$locationtempArray);

                    }

            

            $json_longitud = json_decode($product->longitud, true);
            $longitudArray = array();
        
                        foreach ($json_longitud as $longitude)
                        {
                            $longitudtempArray = [
                                  'longitud' => $longitude,
                            ];
        
                                array_push($longitudArray,$longitudtempArray);
        
                            }

            $json_latitud = json_decode($product->latitud, true);
            $latitudArray = array();
                        
                        foreach ($json_latitud as $latitude)
                         {
                             $latitudtempArray = [
                                    'latitud' => $latitude,
                             ];
                        
                                array_push($latitudArray,$latitudtempArray);
                        
                            }

            $json_state = json_decode($product->product_state, true);
            $stateArray = array();
                                        
                        foreach ($json_state as $states)
                        {
                            $statetempArray = [
                                'state' => $states,
                            ];
                                        
                                 array_push($stateArray,$statetempArray);
                                        
                            }
               
                            $json_tag = json_decode($product->tagging, true);
                            $tagArray = array();
                                                                        
                                foreach ($json_tag as $tags)
                                {
                                 $tagtempArray = [
                                    'tagging' => $tags,
                                ];
                                                                        
                              array_push($tagArray,$tagtempArray);
                                                                        
                                }
                            
                           
                             $tempArray = [
                      
                                'product_id' => $product->product_id,
                                'product_date' => $product->product_date,
                                'product_name' => $product->product_name,
                                'product_status' => $product->product_status,
                                'product_material' => $product->product_material,
                                'maincategory' => $product->maincategory,
                                'product_category' => $product->product_category,
                                'product_target' => $product->product_target,
                                'product_continuity' => $product->product_continuity,
                                'product_quantity' => $product->product_quantity,
                                'unit' => $product->unit,
                                'availability' => $product->availability,
                                'product_price' => $product->product_price,
                                'product_pricemax' => $product->product_pricemax,
                                'product_period' => $product->product_period,
                                'product_package' =>$product->product_package,
                                'product_location' =>$locationArray,
                                'latitud' => $latitudArray,
                                'longitud' => $longitudArray,
                                'product_state' => $stateArray,
                                'product_transport' =>$product->product_transport,
                                'product_description' => $product->product_description,
                                'product_image' => $imageArray,
                                'mainstatus' => $product->mainstatus,
                                'website' => $product->website,
                                'user_id' => $product->user_id,
                                'company_name' => $product->company_name,
                                'company_email' => $product->company_email,
                                'company_contact' => $product->company_contact,
                                'tagging' => $tagArray,
                                'name' => $product->name,
                                'contact' => $product->contact,
                                'publishstatus' => $product->publishstatus,
                                'expired_at' => $product->expired_at,
                                'created_at' => $product->created_at->format('d M Y - H:i:s'),
                                'updated_at' => $product->updated_at->format('d M Y - H:i:s'),
                             ];
             
                 array_push($finalArray,$tempArray);
                
            }
            
        }

        return response()->json($finalArray); 



    }

    


public function listexpired(Request $request)
{
    $user_id = $request->input('user_id');
    $products = Product::where('user_id',$user_id)->get();
    $finalArray = array();
    $today = Carbon::now()->toDateString();

   foreach($products as $product){
 
     if ($product->expired_at >= $today){
        $json_array = json_decode($product->product_image, true);
        $imageArray = array();
        
                foreach ($json_array as $pic)
                {
                    $public = rtrim(app()->basePath('public/image'), '/');
                    $imagepath = $public.'/'.$pic;
                    
  
                    $imagetempArray = [
                        'image' => $imagepath,
                    ];
  
                    array_push($imageArray,$imagetempArray);
                }

                $json_arrays = json_decode($product->product_location, true);
    $locationArray = array();

            foreach ($json_arrays as $locate)
            {
                $locationtempArray = [
                      'location' => $locate,
                ];

                array_push($locationArray,$locationtempArray);

            }

    

    $json_longitud = json_decode($product->longitud, true);
    $longitudArray = array();

                foreach ($json_longitud as $longitude)
                {
                    $longitudtempArray = [
                          'longitud' => $longitude,
                    ];

                        array_push($longitudArray,$longitudtempArray);

                    }

    $json_latitud = json_decode($product->latitud, true);
    $latitudArray = array();
                
                foreach ($json_latitud as $latitude)
                 {
                     $latitudtempArray = [
                            'latitud' => $latitude,
                     ];
                
                        array_push($latitudArray,$latitudtempArray);
                
                    }

    $json_state = json_decode($product->product_state, true);
    $stateArray = array();
                                
                foreach ($json_state as $states)
                {
                    $statetempArray = [
                        'state' => $states,
                    ];
                                
                         array_push($stateArray,$statetempArray);
                                
                    }
       
                    $json_tag = json_decode($product->tagging, true);
                    $tagArray = array();
                                                                
                        foreach ($json_tag as $tags)
                        {
                         $tagtempArray = [
                            'tagging' => $tags,
                        ];
                                                                
                      array_push($tagArray,$tagtempArray);
                                                                
                        }
                    
                   
                     $tempArray = [
              
                        'product_id' => $product->product_id,
                        'product_date' => $product->product_date,
                        'product_name' => $product->product_name,
                        'product_status' => $product->product_status,
                        'product_material' => $product->product_material,
                        'maincategory' => $product->maincategory,
                        'product_category' => $product->product_category,
                        'product_target' => $product->product_target,
                        'product_continuity' => $product->product_continuity,
                        'product_quantity' => $product->product_quantity,
                        'unit' => $product->unit,
                        'availability' => $product->availability,
                        'product_price' => $product->product_price,
                        'product_pricemax' => $product->product_pricemax,
                        'product_period' => $product->product_period,
                        'product_package' =>$product->product_package,
                        'product_location' =>$locationArray,
                        'latitud' => $latitudArray,
                        'longitud' => $longitudArray,
                        'product_state' => $stateArray,
                        'product_transport' =>$product->product_transport,
                        'product_description' => $product->product_description,
                        'product_image' => $imageArray,
                        'mainstatus' => $product->mainstatus,
                        'website' => $product->website,
                        'user_id' => $product->user_id,
                        'company_name' => $product->company_name,
                        'company_email' => $product->company_email,
                        'company_contact' => $product->company_contact,
                        'tagging' => $tagArray,
                        'expired_at' => $product->expired_at,
                        'name' => $product->name,
                        'contact' => $product->contact,
                        'publishstatus' => $product->publishstatus,
                        'created_at' => $product->created_at->format('d M Y - H:i:s'),
                        'updated_at' => $product->updated_at->format('d M Y - H:i:s'),
                     ];
     
         array_push($finalArray,$tempArray);
             
     }


    }

    return response()->json($finalArray);


    





}



public function premiumlist(Request $request)
{
 
    $product= Product::all();
    $premiumArray = array();
    $nonpremium = array();
    $finalArray = array();
    $yes = 'yes';


    foreach( $product as $products)
    {
        if($products->premiumlist == $yes)
        {
            $json_array = json_decode($products->product_image, true);
            $imageArray = array();
            
                    foreach ($json_array as $pic)
                    {
                        $public = rtrim(app()->basePath('public/image'), '/');
                        $imagepath = $public.'/'.$pic;
                        
      
                        $imagetempArray = [
                            'image' => $imagepath,
                        ];
      
                        array_push($imageArray,$imagetempArray);
                    }
    
                    $json_arrays = json_decode($products->product_location, true);
        $locationArray = array();
    
                foreach ($json_arrays as $locate)
                {
                    $locationtempArray = [
                          'location' => $locate,
                    ];
    
                    array_push($locationArray,$locationtempArray);
    
                }
    
        
    
        $json_longitud = json_decode($products->longitud, true);
        $longitudArray = array();
    
                    foreach ($json_longitud as $longitude)
                    {
                        $longitudtempArray = [
                              'longitud' => $longitude,
                        ];
    
                            array_push($longitudArray,$longitudtempArray);
    
                        }
    
        $json_latitud = json_decode($products->latitud, true);
        $latitudArray = array();
                    
                    foreach ($json_latitud as $latitude)
                     {
                         $latitudtempArray = [
                                'latitud' => $latitude,
                         ];
                    
                            array_push($latitudArray,$latitudtempArray);
                    
                        }
    
        $json_state = json_decode($products->product_state, true);
        $stateArray = array();
                                    
                    foreach ($json_state as $states)
                    {
                        $statetempArray = [
                            'state' => $states,
                        ];
                                    
                             array_push($stateArray,$statetempArray);
                                    
                        }
           
                        $json_tag = json_decode($products->tagging, true);
                        $tagArray = array();
                                                                    
                            foreach ($json_tag as $tags)
                            {
                             $tagtempArray = [
                                'tagging' => $tags,
                            ];
                                                                    
                          array_push($tagArray,$tagtempArray);
                                                                    
                            }
    
          $tempArray = [
            'product_id' => $products->product_id,
            'product_date' => $products->product_date,
            'product_name' => $products->product_name,
            'product_status' => $products->product_status,
            'product_material' => $products->product_material,
            'maincategory' => $products->maincategory,
            'product_category' => $products->product_category,
            'product_target' => $products->product_target,
            'product_continuity' => $products->product_continuity,
            'product_quantity' => $products->product_quantity,
            'unit' => $products->unit,
            'availability' => $products->availability,
            'premiumlist' =>$products->premiumlist,
            'product_price' => $products->product_price,
            'product_pricemax' => $products->product_pricemax,
            'product_period' => $products->product_period,
            'product_package' =>$products->product_package,
            'product_location' =>$locationArray,
            'latitud' => $latitudArray,
            'longitud' => $longitudArray,
            'product_state' => $stateArray,
            'product_transport' =>$products->product_transport,
            'product_description' => $products->product_description,
            'product_image' => $imageArray,
            'mainstatus' => $products->mainstatus,
            'website' => $products->website,
            'user_id' => $products->user_id,
            'company_name' => $products->company_name,
            'company_email' => $products->company_email,
            'company_contact' => $products->company_contact,
            'tagging' => $tagArray,
            'name' => $products->name,
            'contact' => $products->contact,
            'publishstatus' => $products->publishstatus,
            'expired_at' => $products->expired_at,
            'created_at' => $products->created_at->format('d M Y - H:i:s'),
            'updated_at' => $products->updated_at->format('d M Y - H:i:s'),
             
          ];


          array_push($premiumArray,$tempArray);
        }

        if($products->premiumlist != $yes)
        {
            $json_array = json_decode($products->product_image, true);
            $imageArray = array();
            
                    foreach ($json_array as $pic)
                    {
                        $public = rtrim(app()->basePath('public/image'), '/');
                        $imagepath = $public.'/'.$pic;
                        
      
                        $imagetempArray = [
                            'image' => $imagepath,
                        ];
      
                        array_push($imageArray,$imagetempArray);
                    }
    
                    $json_arrays = json_decode($products->product_location, true);
        $locationArray = array();
    
                foreach ($json_arrays as $locate)
                {
                    $locationtempArray = [
                          'location' => $locate,
                    ];
    
                    array_push($locationArray,$locationtempArray);
    
                }
    
        
    
        $json_longitud = json_decode($products->longitud, true);
        $longitudArray = array();
    
                    foreach ($json_longitud as $longitude)
                    {
                        $longitudtempArray = [
                              'longitud' => $longitude,
                        ];
    
                            array_push($longitudArray,$longitudtempArray);
    
                        }
    
        $json_latitud = json_decode($products->latitud, true);
        $latitudArray = array();
                    
                    foreach ($json_latitud as $latitude)
                     {
                         $latitudtempArray = [
                                'latitud' => $latitude,
                         ];
                    
                            array_push($latitudArray,$latitudtempArray);
                    
                        }
    
        $json_state = json_decode($products->product_state, true);
        $stateArray = array();
                                    
                    foreach ($json_state as $states)
                    {
                        $statetempArray = [
                            'state' => $states,
                        ];
                                    
                             array_push($stateArray,$statetempArray);
                                    
                        }
           
                        $json_tag = json_decode($products->tagging, true);
                        $tagArray = array();
                                                                    
                            foreach ($json_tag as $tags)
                            {
                             $tagtempArray = [
                                'tagging' => $tags,
                            ];
                                                                    
                          array_push($tagArray,$tagtempArray);
                                                                    
                            }
    
          $tempArray = [
            'product_id' => $products->product_id,
            'product_date' => $products->product_date,
            'product_name' => $products->product_name,
            'product_status' => $products->product_status,
            'product_material' => $products->product_material,
            'maincategory' => $products->maincategory,
            'product_category' => $products->product_category,
            'product_target' => $products->product_target,
            'product_continuity' => $products->product_continuity,
            'product_quantity' => $products->product_quantity,
            'unit' => $products->unit,
            'availability' => $products->availability,
            'premiumlist' =>$products->premiumlist,
            'product_price' => $products->product_price,
            'product_pricemax' => $products->product_pricemax,
            'product_period' => $products->product_period,
            'product_package' =>$products->product_package,
            'product_location' =>$locationArray,
            'latitud' => $latitudArray,
            'longitud' => $longitudArray,
            'product_state' => $stateArray,
            'product_transport' =>$products->product_transport,
            'product_description' => $products->product_description,
            'product_image' => $imageArray,
            'mainstatus' => $products->mainstatus,
            'website' => $products->website,
            'user_id' => $products->user_id,
            'company_name' => $products->company_name,
            'company_email' => $products->company_email,
            'company_contact' => $products->company_contact,
            'tagging' => $tagArray,
            'name' => $products->name,
            'contact' => $products->contact,
            'publishstatus' => $products->publishstatus,
            'expired_at' => $products->expired_at,
            'created_at' => $products->created_at->format('d M Y - H:i:s'),
            'updated_at' => $products->updated_at->format('d M Y - H:i:s'),
             
          ];

            array_push($nonpremium,$tempArray);
        }

    }

        $tempArray = [

            $premiumArray,
            $nonpremium,
        ];

        array_push($finalArray,$tempArray);


    

    return response()->json($finalArray);
}



  }






