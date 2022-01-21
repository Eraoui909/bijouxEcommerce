<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class newsletter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:newsletter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send news letter to subscribed persons every period';

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
        $emails = \App\Models\Newsletter::pluck("email")->toArray();
        foreach ($emails as $email) {
            Mail::to($email)->send(new \App\Mail\newsletter());
        }
    }
}
