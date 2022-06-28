<?php

namespace App\Notifications;

use App\Models\Company;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class newPayment extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct
        (
            protected User $user,
            protected Company $company,
            protected Payment $payment
        ) {}

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
        $refCompany = $this->company::find($this->payment->company_reciever_id);

        return (new MailMessage)
                    ->line('Pagamento autorizado!.')
                    ->line('Você realizou uma transação para empresa: '. $refCompany->nome_fantasia)
                    ->line('No valor de: ' . $this->payment->transfer_value .'R$');
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
