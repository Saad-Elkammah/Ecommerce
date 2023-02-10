<?php

namespace App\Notifications;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AdminVerifyEmail extends Notification
{
    use Queueable;

// mention steps to verify email
//     public function toMail($notifiable)
//     {
//         return (new MailMessage)
//             ->subject('Verify Email Address')
//             ->line('Please click the button below to verify your email address.')
//             ->action('Verify Email Address', route('admin.verification.verify', $notifiable->verification_token))
//             ->line('If you did not create an account, no further action is required.');
//     }

//     public function via($notifiable)
//     {
//         return ['mail'];
//     }

// }


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $viewPrefix=$notifiable->getTable();
        return (new MailMessage)
            ->subject('Admin Verify Email Address')
            ->line('Please click the button below to verify your email address.')
            ->action('Verify Email Address',URL::temporarySignedRoute(
                $viewPrefix.'.verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            ))
            ->line('If you did not create an account, no further action is required.');
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
