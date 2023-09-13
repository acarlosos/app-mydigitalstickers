<?php

namespace App\Services;
use Exception;
use Artisan;

class DeployServices
{
    public function deploy()
    {
        // Artisan::call('optimize');
        // Artisan::call('cache:clear');
        Artisan::call('migrate', ['--force' => true]);
    }

    public function clear()
    {
        try{

            $exitCode = Artisan::call('migrate:refresh', [
                '--force' => true,
            ]);
            $exitCode = Artisan::call('db:seed', [
                '--force' => true,
            ]);
        }catch(Exception $e){
            dd($e->getMessage());
        }

    }
}