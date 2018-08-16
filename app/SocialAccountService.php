<?php

namespace App;
use App\SocialFacebookAccount;
use App\User;
use App\Role;

use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
          //dd($account);
            return $account->user;
        } else {

            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

          //  dd($providerUser);
            if (!$user) {



              if($providerUser->getEmail() != NULL){

                          $user = User::create([
                              'email' => $providerUser->getEmail(),
                              'name' => $providerUser->getName(),
                              'position' => 'student',
                              'avatar' => 'graph.facebook.com/'.$providerUser->getId().'/picture?width=300&height=300',
                              'provider' => 'facebook',
                              'is_admin' => 0
                          ]);
          		}else{

                      		$user = User::create([
                      		    'email' => $providerUser->getId(),
                              'name' => $providerUser->getName(),
                              'position' => 'student',
                              'avatar' => 'graph.facebook.com/'.$providerUser->getId().'/picture?width=300&height=300',
                              'provider' => 'facebook',
                              'is_admin' => 0
                          ]);

          }




            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}
