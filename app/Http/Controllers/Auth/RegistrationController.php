<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Auth;
use App\SubCategory;
use App\User;

class RegistrationController extends Controller
{
    public function getRegistrationForm()
    {
        // Get all caetgories and subcategories.
        $subcategories = SubCategory::with('category')->latest()->get();

        // Group them by category_id.
        $grouped = $subcategories->groupBy('category_id');

        // States array.
        $statesArray = [
            'Abuja' => 'Abuja',
            'Lagos' => 'Lagos',
            'Ogun' => 'Ogun'
        ];

        // Data to return to view.
        $data = [
            'grouped' => $grouped,
            'statesArray' => $statesArray
        ];

        return view('store.customer.register')->withData($data);
    }

    public function postRegistrationForm(Request $request)
    {
        // Define validation rules.
        $validationRules = [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|unique:users,email',
            'phone' => 'required|digits:11',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'password' => 'required|min:6|max:255|confirmed',
            'policy' => 'required'
        ];

        // Define custom validaton messages.
        $validationCustomMessages = [
            'policy.required' => 'You must agree to our policy.',
            'phone.required' => 'Your telephone number is required',
            'phone.digits' => 'Enter a valid telephone number.',
            'password.confirmed' => 'Your passwords do not match'
        ];

        // Validate fields
        $this->validate($request, $validationRules, $validationCustomMessages);

        // Create new user instance.
        $user = new User();

        // Save users to database.
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->landmark = $request->landmark;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->newsletter = (isset($request->newsletter)) ? true : false;

        // Save user.
        $user->save();

        // Log user in.
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('store.home'));
        }

        // Redirect to register page
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }
}
