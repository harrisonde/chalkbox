<?php
    use Illuminate\Support\ServiceProvider;
    
    class StopwatchServiceProvider extends ServiceProvider 
    {
        public function register() {
            App::bind('MyAlias', function(){
                return new Timer;
            });
        }
    }