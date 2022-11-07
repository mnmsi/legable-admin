<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRegisterRequest;
use App\Models\System\Country;
use App\Models\User\User;
use App\Providers\RouteServiceProvider;
use App\Traits\Auth\RegisterTrait;
use App\Traits\User\AddressTrait;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use AddressTrait, RegisterTrait, RegistersUsers {
        showRegistrationForm as traitRegistrationForm;
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        return view("auth.register", [
            'countries' => Country::all()
        ]);
    }

    public function register(UserRegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $this->createUser($request->all());

            if (!$user) {
                abort(404);
            }

            $user->addresses()->attach($user->id, $request->address);

            $this->guard()->login($user);

            if ($response = $this->registered($request, $user)) {
                return $response;
            }

            DB::commit();
            return $request->wantsJson()
                ? new JsonResponse([], 201)
                : redirect($this->redirectPath());

        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(404);
        }
    }
}
