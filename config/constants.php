<?php
/**
* @ShortDescription constants return as a array.
* @var String
*/
return [
    // Sercurity keys
    'ENCRYPTION_KEY1'       => 'eAAlsKwxHvmqYNUmHpu2ObVAOmyfUPg8',
    'ENCRYPTION_KEY2'       => 'N7pfyut4bDk7kGxz',
    'ADMIN_EMAIL'           => 'parihar.toshik@fxbytes.com',
    'ADMIN_ROLE'            => 1,
    'USER_ROLE' 	    	=> 2,
    'ACTIVE_STATUS' 		=> 1,
    'DEACTIVE_STATUS' 		=> 0,
    'APP_NAME'				=> 'inviteU',
    'IS_DELETED_YES' 		=> 1,
    'IS_DELETED_NO' 		=> 0,
    'IS_FAVORITE_YES'       => 1,
    'IS_FAVORITE_NO'        => 0,
    'PROFILE_COMPLETED'     => 'Completed',
    'PROFILE_NOT_COMPLETED' => 'Not Completed',
    'PRIMARY_KEY_LENGTH'    => 10,
    'IMAGE_NAME_LENGTH'     => 20,
    'DB_DATETIME_FORMAT'    => 'Y-m-d H:i:s',
    'DISPLAY_DATE'          => 'Y/m/d',
    'DISPLAY_TIME'          => 'h:i A',
    'OPERATION_CONFIRM'     => 1,
    'OPERATION_FAIED'       => 0,
    'ID_NOT_CORRECT'        => 2,

    // Cards
    'CARD_TYPE_PROFILE'     => 'Profile',
    'CARD_TYPE_PERSONAL'    => 'Personal',
    'CARD_TYPE_OTHER'       => 'Other',
    'CARD_MEDIA_TYPE_CARD'       => 'card',
    'CARD_MEDIA_TYPE_PROFILE'    => 'profile',
    'CARD_FRONT_SIDE'       => 'front',
    'CARD_BACK_SIDE'        => 'back',
    'STORAGE_ASSET_PATH'    => storage_path('assets/'),
    'STORAGE_IMAGE_PATH'    => storage_path('assets/images'),
    'STORAGE_CARD_PATH'     => storage_path('assets/images/cards'),
    'STORAGE_PROFILE_PATH'  => storage_path('assets/images/profile'),
    'STORAGE_PROF_THUMB_PATH' => storage_path('assets/images/prof_thumbs'),
    'PROF_THUMB_WIDTH'      => 240,
    'PROF_THUMB_HEIGHT'     => 240,
    'CARD_IMAGE_WIDTH'      => 500,
    'CARD_IMAGE_HEIGHT'     => 500,
    'STORAGE_CARD_THUMB_PATH' => storage_path('assets/images/card_thumbs'),
    'CARD_THUMB_WIDTH'      => 240,
    'CARD_THUMB_HEIGHT'     => 240,
    'TOKEN_LENGTH'          => 100,
    'PRIMARY_KEY_COLUMN'    => 'id',
    'DB_DATETIME_FORMAT'    => 'Y-m-d H:i:s',
    'RECENTLY_USER_ADDED_DAYS'  => 7,
    'UPCOMING_APPOINTMRNT_DAYS' => 15,
    'RECENTLY_VIEW_DAYS'    => 30,

    // EMAIL TYPE
    'PASSWORD_RESET' => 2,
    'RESET_PASSWORD_YES'            => 1,

    // RESPONSE TYPE
    'RESPONSE_TYPE_SUCCESS'          => 1,
    'RESPONSE_TYPE_FAIL'             => 2,
    'RESPONSE_TYPE_VALIDATION_ERROR' => 3,

    // MEDIA TYPE
    'MEDIA_TYPE_PROFILE'    => 'profile',
    'MEDIA_STATUS_ACTIVE'   => 1,
    'MEDIA_STATUS_INACTIVE' => 0,

    // Tables
    'MEDIA'                 => 'user_media',
    'CARDS'                 => 'cards',
    'CARD_COMPANY'          => 'card_company',
    'CARD_ADDRESS'          => 'card_address',
    'CARD_EMAIL'            => 'card_email',
    'CARD_MEDIA'            => 'card_media',
    'CARD_PHONE_NUMBER'     => 'card_phone_number',
    'CARD_WEBSITE'          => 'card_website',
    'CARD_INSTANT_MESSAGE'  => 'card_instant_message',
    'CARD_SOCIAL'           => 'card_social_media_account',
    'CARD_ANNIVERSARY'      => 'card_anniversary',
    'POSITION'              => 'position',
    
    //Request Parameters
    'REQUEST_CODE'          => 'code',
    'AUTH_CODE_TEXT'        =>'authorization_code',
    
    //Google App Credentials
    'GOOGLE_CLIENT_ID'      => '237843403483-o9tlsifal8l41kco75oujs3t30r7h1e7.apps.googleusercontent.com',
    'GOOGLE_SECRET_ID'      => 'bSSpxyfBpZMC3zvjWffiGszs',
    'GOOGLE'                => 'Google',
    'GOOGLE_API'            => 'https://www.google.com/m8/feeds/contacts/default/full?alt=json&amp;max-results=400',

    // OutLook
    'OAUTH_APP_ID'          => env('OAUTH_APP_ID', 'forge'),
    'OAUTH_APP_PASSWORD'    => env('OAUTH_APP_PASSWORD','forge'),
    'OAUTH_REDIRECT_URI'    => env('OAUTH_REDIRECT_URI','forge'),
    'OAUTH_URL_AUTHORIZE'   => env('OAUTH_AUTHORITY','forge').env('OAUTH_AUTHORIZE_ENDPOINT','forge'),
    'OAUTH_URL_ACCESS_TOKEN' => env('OAUTH_AUTHORITY','forge').env('OAUTH_TOKEN_ENDPOINT','forge'),
    'OAUTH_SCOPES'          => env('OAUTH_SCOPES','forge'),

    //GROUPS
    'MAXLENGTH'             => 50,
    'MSG_HIDE_TIME'         => 3500,

    //Excel 
    'REQUIRED_EXCEL_COLUMN_STANDARD' => ['Prefix','First Name','Middle Name','Last Name','Name Suffix','Nick Name','Phone Label','Phone Value','Email Label','Email Value','Company Name','Company Department','Company Job Title','Street','City','State','Post Code','Country','Web','Instant Message Label','Instant Message Value','Social Media Label','Social Media Value','Anniversary Label','Anniversary Value'],
    'EXCEL_COLUMN_ARRAY_DB'          => ["name_prefix,first_name,middle_name,last_name,name_suffix,nick_name,phone_label,phone_value,email_label,email_value,company_name,company_department,company_jobtitle,street,city,state,postcode,country,web,im_label,im_value,sm_label,sm_value,anv_label,anv_value"]
];