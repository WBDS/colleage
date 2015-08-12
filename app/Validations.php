<?php namespace App;

use Validator;

class MyValidator{

    public static function validateRegisterRequest($input){
        $messages = [
            'email.email' => 'Email should be a valid email address.',
            'email.required' => 'Email address is required.',
            'email.unique' => 'Email is already registered.',
            'username.required' => 'User name is required.',
            'username.unique' => 'User name is required.',
            'name.required' => 'Name is required',
            'password.required' => 'Password is required.',
            'password.min' => 'Password should be longer than 6 characters.',
            'mobile_no.required' => 'Mobile number is required.',
            'mobile_no.numeric' => 'Mobile number should be numeric.',
            'pin_no.required' => 'Pin number is required.',
            'pin_no.numeric' => 'Pin number should be numeric.'
        ];
        $rules = [
            'email' => 'required | email | unique:users',
            'username' => 'required | unique:users',
            'name' => 'required',
            'password' => 'required | min:6',
            'mobile_no' => 'required | numeric',
            'pin_no' => 'required | numeric'
        ];
        return Validator::make($input, $rules, $messages);
    }

    public static function validateResetPasswordRequest($input){
        $messages = [
            'email.email' => 'Email should be a valid email address.',
            'email.required' => 'Email address is required.',
            'email.unique' => 'Email is already registered.',
            'username.required' => 'User name is required.',
            'username.unique' => 'User name is required.',
            'name.required' => 'Name is required',
            'password.required' => 'Password is required.',
            'password.min' => 'Password should be longer than 6 characters.',
            'mobile_no.required' => 'Mobile number is required.',
            'mobile_no.numeric' => 'Mobile number should be numeric.',
            'pin_no.required' => 'Pin number is required.',
            'pin_no.numeric' => 'Pin number should be numeric.'
        ];
        $rules = [
            'email' => 'required | email | unique:users',
            'username' => 'required | unique:users',
            'name' => 'required',
            'password' => 'required | min:6',
            'mobile_no' => 'required | numeric',
            'pin_no' => 'required | numeric'
        ];
        return Validator::make($input, $rules, $messages);
    }
}