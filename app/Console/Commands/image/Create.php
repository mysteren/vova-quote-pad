<?php

namespace App\Console\Commands\image;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class Create extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Инициализация папок для картинок';

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
     * @return mixed
     */
    public function handle()
    {
        Storage::makeDirectory('public/images');
    }
}
