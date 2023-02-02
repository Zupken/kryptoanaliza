<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class runHashcatSha extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:hashcatsha';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'runs hashcat sha1';

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
        exec('hashcat -m 100 -a 0 hash.txt rockyou.txt --force -o output.txt', $output);
        return $output;
    }
}
