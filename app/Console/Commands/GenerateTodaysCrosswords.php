<?php

namespace App\Console\Commands;

use App\Models\Crossword;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GenerateTodaysCrosswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crosswords:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to generate today\'s crosswords';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $crosswords = Crossword::where('date', Carbon::now()->toDateString())
            ->get();
        $path = '/public/crosswords.json';

        if (Storage::fileExists($path)) {
            Storage::delete($path);
        }
        Storage::put($path, json_encode($crosswords, JSON_PRETTY_PRINT));

        return Command::SUCCESS;
    }
}
