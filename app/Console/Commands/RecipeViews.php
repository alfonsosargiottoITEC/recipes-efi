<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Recipe;

class RecipeViews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recipes:top-views';

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
        $this->info('Daily top viewed recipes: ');
        $recipes = Recipe::all();
        $recipes = $recipes->sortByDesc('view_count');

        $bar = $this->output->createProgressBar(count($recipes));

        $bar->start();

        foreach ($recipes as $recipe) {
            $this->info("Recipe name: ".$recipe->name . ' ||||| Total Views: ' . $recipe->view_count);
            $bar->advance();
        }

        $bar->finish();
        $this->info('End Process');
    
    }
}
