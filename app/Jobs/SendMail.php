<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 7200; // 2 hours
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public array $data)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $data = [
            'title' => $this->data['title'],
            'body'  => $this->data['body'],
        ];

        User::all()->each(function ($user, $key) use ($data) {
            \array_merge($data, [
                'name'  => $user->name,
                'email' => $user->email,
            ]);

            Mail::send(
                'mails.test',
                ['data' => $data],
                function ($message) use ($data) {
                    $message->to($data['email'], $data['name']);

                    $message->from(
                        env('MAIL_FROM_ADDRESS', 'admin@laravel-tailwind-demo.test'),
                        env('MAIL_FROM_NAME', config('app.name'))
                    );

                    $message->subject($data['title']);
                }
            );
        });
    }
}
