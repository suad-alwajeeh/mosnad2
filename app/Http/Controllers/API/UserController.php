<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public  $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function login()
    {
         return view('dashboard.login');
    }
    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();

        return Redirect('/dashboard/login');
    }
    public function login_request(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            return back()->with('error', ' make sure if your data is correct ')->withErrors($validator);
        } else {
            $credentials = ['email' => $request->email, 'password' => $request->password];
        if (Auth::attempt($credentials)) {
            
            return redirect('dashboard')->with('success', 'loginned successfully');
        }

        return redirect('dashboard/login')->with('error', 'please enter correct data');
        }  
      }
     
    public function index()
    {
        $travelers =$this->userService->allUser() ;

        return response()->json([
            'success' => true,
            'travelers' => UserResource::collection($travelers),
            'message' => "travelers retrieved successfully.",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request )
    {
         try {
            if ($request->avater) {
                $avater = time() . '.' . $request->avater->getClientOriginalExtension();
                $request->avater->move(public_path("uploads"),$avater);
            } else {
                $avater = 'traveler_avatar.png';
            }
            if ($request->passport) {
                $passport = time() . '.' . $request->passport->getClientOriginalExtension();
                $request->passport->move(public_path("uploads"),$passport);
            } else {
                $passport = null;
            }
            if ($request->id_card) {
                $id_card = time() . '.' . $request->id_card->getClientOriginalExtension();
                $request->id_card->move(public_path("uploads"),$id_card);
            } else {
                $avater = null;
            }
            $newUser=$this->userService->createUser([
                "name"=>$request->name,
                "phone"=>$request->phone,
                "email"=>$request->email,
                "avater"=>$avater,
                "id_card"=>$request->id_card,
                "passport"=>$request->passport,
            ]);
            return response()->json([
                'success' => true,
                'data' => new UserResource($newUser),
                'message' => "travelers retrieved successfully.",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                 'data' => $th->getMessage(),
                'message' => "check this errors please.",
                
            ],422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
     
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
