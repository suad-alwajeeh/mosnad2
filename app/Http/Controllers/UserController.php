<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\TravelerDataService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public  $userService;
    public  $travelerService;
    public function __construct(UserService $userService,TravelerDataService $travelerService)
    {
        $this->userService = $userService;
        $this->travelerService = $travelerService;
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
        $travelers = $this->userService->allUser();

        return view("dashboard.user", ['data' => $travelers]);
    }
    public function store(UserRequest $request)
    {
        try {
            if ($request->avater) {
                $avater = time() . '.' . $request->avater->getClientOriginalExtension();
                $request->avater->move(public_path("uploads"), $avater);
            } else {
                $avater = 'traveler_avatar.png';
            }
            if ($request->passport) {
                $passport = time() . '.' . $request->passport->getClientOriginalExtension();
                $request->passport->move(public_path("uploads"), $passport);
            } else {
                $passport = null;
            }
            if ($request->id_card) {
                $id_card = time() . '.' . $request->id_card->getClientOriginalExtension();
                $request->id_card->move(public_path("uploads"), $id_card);
            } else {
                $avater = null;
            }
            $newUser = $this->userService->createUser([
                "user_type" => "traveler",
                "name" => $request->name,
                "phone" => $request->phone,
                "email" => $request->email,
                "avater" => $avater, "date_of_birth"=>$request->date_of_birth
            ]);
            $details = $this->travelerService->saveData([
                "user_id" =>$newUser->id,
                "id_card" => $id_card,
                "passport" => $passport,
            ]);
            return back()->with("success", "travelers retrieved successfully.");
        } catch (\Throwable $th) {
            return back()->with("error", "there is an error");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

   
}
