<?php

namespace App\Http\Controllers;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function signin(Request $request)
    {
       
         
        $email = $request->input('user_email');
        $password = $request->input('password');

 

         $user = User::where('user_email', $email)->where('password', $password)->first(); 
 
             if ($user == null) {
                return response()->json('User wasnt existed' );
            }

            if ($user->status == 'blocked' ) {
                return response()->json('User blocked' );
            }

            else 
              {
                if($user->status == 'active') {
                
                if($user->user_role == 'admin'){
                       

                       $finalArray = array();  
                       $data = user::all();
                      
                       foreach ($data as $data) {

                        $public = rtrim(app()->basePath('public/image'), '/');
                        $imagename = $data->profilepicture;
                        $dirfile = $public.'/' . $imagename;
                        
                 
            
                        $tempArray = [
                            'user_id' => $data->user_id,
                            'user_fname' => $data->user_fname,
                            'user_lname' => $data->user_lname,
                            'companyname' => $data->companyname,
                            'password' => $data->password,
                            'user_contact' => $data->user_contact,
                            'user_email' => $data->user_email,
                            'companyregisternumber' => $data->companyregisternumber,
                            'companydesc' => $data->companydesc,
                            'user_type' => $data->user_type,
                            'profilepicture' => $dirfile,
                            'user_role' => $data->user_role,

            
                        ];
                    
                        array_push($finalArray, $tempArray);
            
                    }
                    
                        return response()->json($finalArray); 

                       

                }
            
        
    

                if($user->user_role == 'user')

                {
 
                      if($user->user_type == 'individual')
                      {

                        $finalArray = array();
                      

  
                          $public = rtrim(app()->basePath('public/image'), '/');
                          $imagename = $user->profilepicture;
                          $dirfile = $public.'/' . $imagename;
                          

                          
                          $finalArray = [
                             'user_id' => $user->user_id,
                             'user_fname'=>$user->user_fname,
                             'user_lname'=>$user->user_lname,
                             'password'=>$user->password,
                             'contactnumber'=>$user->user_contact,
                             'email'=>$user->user_email,
                             'profilepicture'=>$dirfile,
                             'user_type' =>$user->user_type,
                             'personincharge' => $user->personincharge,
                             'phonenumber' => $user->phonenumber,
                             'user_type' => $user->user_type,
                             'created_at' => $user->created_at,
                             'user_role' => $user->user_role,


                           ];

 

                           return response()->json($finalArray);


                      }

                    

                       if($user->user_type == 'company')
                      {
                      
                        $compArray = array();

                        $public = rtrim(app()->basePath('public/image'), '/');
                        $imagename = $user->profilepicture;
                        $dirfile = $public.'/' . $imagename;

                        $compArray = [
                              'user_id' => $user->user_id,
                              'companyname'=>$user->companyname,
                              'password'=>$user->password,
                              'user_contact'=>$user->user_contact,
                              'user_email'=>$user->user_email,
                              'companyregisternumber'=>$user->companyregisternumber,
                              'companydesc'=>$user->companydesc,
                              'profilepicture'=>$dirfile,
                              'user_type' =>$user->usertype,
                              'personincharge' => $user->personincharge,
                              'phonenumber' => $user->phonenumber,
                              'user_type' => $user->user_type,
                              'created_at' => $user->created_at,
                              'user_role' => $user->user_role,
                          ];

                          return response()->json($compArray);
                      } 

                    }

                    }
                }
            }
        }

                

                
             
            


     


        


    

