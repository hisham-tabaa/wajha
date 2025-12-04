<?php
return [
    //register and login validation done
    'first_name_required' => 'First name is required.',
    'first_name_string'   => 'First name must be a string.',
    'first_name_max'      => 'First name must not exceed :max characters.',
    'last_name_string'    => 'Last name must be a string.',
    'last_name_max'       => 'Last name must not exceed :max characters.',
    'email_required'      => 'Email is required.',
    'email_email'         => 'Email must be a valid email address.',
    'email_unique'        => 'The provided email already exists.',
    'email_max' => 'Email must not exceed :max characters.',
    'password_required'   => 'Password is required.',
    'password_string'     => 'Password must be a string.',
    'password_min'        => 'Password must be at least :min characters.',
    'email_not_exists' => 'This email is not registered.',
    //end register and login validation

    //verification code and reset passwd
    'code_required' => 'Verification code is required.',
    'code_string' => 'Verification code must be a string.',
    'password_confirmed' => 'Password confirmation does not match.',
    // end verification reset passwd


    //update profile
    'avatar_url' => 'Avatar must be a valid URL.',
    'gender_in' => 'Gender must be either male or female.',
    'birthday_date' => 'Birthday must be a valid date.',
    'phone_string' => 'Phone number must be a string.',
    'phone_max' => 'Phone number must not exceed :max characters.',
    'nationality_exists' => 'Selected nationality does not exist.',
    'email_unique_update' => 'Email is already taken by another user.',
    //end update profile

    // google auth


    'id_token_required' => 'Google ID token is required.',
    'id_token_string' => 'Google ID token must be a valid string.',
    //end google auth

    //role
    'role_id_required' => 'Role ID is required.',
    'role_id_exists' => 'Selected role does not exist or is not allowed.',

    'attributes' => [
        'role_id' => 'Role ID',
    ],


];
