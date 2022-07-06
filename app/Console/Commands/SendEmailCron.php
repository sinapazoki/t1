<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Mail\SendEmail;
use App\Models\EmailNotify;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendEmail:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emails = EmailNotify::where([
            ['email_send_at', '=', Carbon::today()->toDateString()],
            ['status', '=', '1'],
        ])->get();
        
        foreach($emails as $key => $email)
        {
            $address = $email->address;
            $id = $email->id;
           
            EmailNotify::where('id',$id)->update(['status'=>'0']);

            Mail::to($address)->queue(new SendEmail($email));

        }  
      }
}
