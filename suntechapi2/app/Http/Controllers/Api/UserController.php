<?php

namespace App\Http\Controllers\Api;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Models\User;
use App\Models\SessionModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;




class UserController extends Controller
{

    private  $userService;

    public function __construct(UserService $userService){
        $this -> userService = $userService;
    }


    //API
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        if (Auth::attempt($credentials)) {
            $userid = auth()->user()->id;
        }

        $user = User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
            $token = $user->createToken('my-app-token')->plainTextToken;

            // dd($user -> id);


            
        
            $response = [
                'user' => $user,
                'token' => $token,
                'id' => $userid
            ];
            return response($response, 201);

    }

    

    ////////////////////////////////
    /////////////////////////////////////

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request -> get('name'), $request -> get('email'),$request -> get('password'));
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
            'repassword' => 'required',
        ]);

        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');

        try{
            $user = $this -> userService -> save(['name' => $name, 
                                                  'email' => $email, 
                                                  'password' => bcrypt($password)]);

            $user -> roles() -> syncWithoutDetaching([2]);
            // return redirect('/login');
            dd($user);
                                                    
        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ]);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout(){
        // Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        
        session() -> pull('user');

        $user = request()->user(); //or Auth::user()
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        
        return response()->json([
            'status_code' => 200,
            'message' => 'Logout successfull',
        ]);
    }

    public function member(Request $request){ 
        $user = Auth::user();
        // dd($user -> user_details -> address);

        return response() -> json([
            'name' => $user -> name,
            'email' => $user -> email,
            'address' => $user -> user_details ->  address,
            'avatar' => $user -> user_details ->  avatar,
            'gender' => $user -> user_details ->  gender,
            'birthday' => $user -> user_details ->  birthday,
            'phone' => $user -> user_details ->  phone

        ]);
    }

}
