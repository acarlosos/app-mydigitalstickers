<?php

namespace App\Http\Controllers;

use App\Services\DeployServices;
use Illuminate\Http\Request;
use Artisan;
class DeployController extends Controller
{
    public function deploy()
    {
        dd('deploy');
        Artisan::call('optimize');
        // Artisan::call('cache:clear');
        Artisan::call('migrate', ['--force' => true]);
        // $service = new DeployServices();
        // $service->deploy();
        return redirect()->back()->with('status', 'Deploy executado com sucesso!');
    }
    public function clear()
    {
        dd('clear');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('migrate:fresh', ['--force' => true]);
        Artisan::call('db:seed', [
            '--force' => true,
        ]);
        return redirect()->back()->with('status', 'Clear executado com sucesso!');
    }
}
