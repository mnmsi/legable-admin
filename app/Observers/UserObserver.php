<?php

namespace App\Observers;

use App\Events\MailVerificationEvent;
use App\Events\PhoneVerificationEvent;
use App\Models\User\User;
use App\Notifications\MailVerificationNotification;
use Illuminate\Auth\Events\Registered;

class UserObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = true;

    /**
     * Handle the User "created" event.
     *
     * @param User $user
     * @return void
     */
    public function created(User $user)
    {
        event(new MailVerificationEvent($user));
    }

    /**
     * Handle the User "updated" event.
     *
     * @param User $user
     * @return void
     */
    public function updated(User $user)
    {
        if (in_array('email_verified_at', array_keys($user->getChanges()))) {
            event(new PhoneVerificationEvent());
        }
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param User $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
