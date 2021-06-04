<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use App\Models\status;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'Team_name' => ['required', 'string', 'max:255'],
            'Member1_name' => ['required', 'string', 'max:255'],
            'Member1_email' => ['required', 'string', 'email', 'max:255'],
            'Member1_contact' => ['required', 'string', 'max:255'],
            'Member2_name' => ['required', 'string', 'max:255'],
            'Member2_email' => ['required', 'string', 'email', 'max:255'],
            'Member2_contact' => ['required', 'string', 'max:255'],
            'Member3_name' => ['required', 'string', 'max:255'],
            'Member3_email' => ['required', 'string', 'email', 'max:255'],
            'Member3_contact' => ['required', 'string', 'max:255'],
            //'attch' => ['required', 'string'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {

            $user = User::create([
                'name' => $input['Team_name'],
                'password' => Hash::make($input['password']),
            ]);

            $status = status::create([
                'flag' => False, 
                'attachment' => 'jsfjsgfLkwfjksajkbkfasbfklasbfssbfjkbfbasbfkajbsfkjafb',
                'user_id' => $user->id
            ,]);
            
            for($i = 1; $i<=3; $i++):
                $member = member::create([
                    'name' => $input['Member'.$i.'_name'],
                    'email' => $input['Member'.$i.'_email'],
                    'contact' => $input['Member'.$i.'_contact'],
                    'University' => 'E',
                    'user_id' => $user->id,
                ]);
                $member->User()->associate($user)->save();
            endfor;

            $status->User()->associate($user)->save();
            $user->save();
            return tap($user, function (User $user) {
                $this->createTeam($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
