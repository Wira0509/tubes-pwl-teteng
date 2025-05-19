<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ClearUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengosongkan tabel users di database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('users')->truncate();
        $this->info('Tabel users berhasil dikosongkan.');
        return 0;
    }
}
