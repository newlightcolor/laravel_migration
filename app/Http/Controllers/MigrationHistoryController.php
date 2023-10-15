<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\MigrationHistory;

class MigrationHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $MigrationHistory = new MigrationHistory();

        $executedMigrations = $MigrationHistory->select('migration')->get()->toArray();
        $executedMigrationNames = array_column($executedMigrations, 'migration');

        $migrationFilePaths = glob('../database/migrations/*');
        $migrationFileNames = array_map(function($path){
            $paths = explode('/', $path);
            $fileNameWithExtension = $paths[3];
            return str_replace('.php', '', $fileNameWithExtension);
        }, $migrationFilePaths);

        $migrations = [
            'executedMigrationsInBatch' => $MigrationHistory->getBatch()->all(),
            'unExecutedMigrations'      => array_filter(
                $migrationFileNames,
                fn($mName) => !in_array($mName, $executedMigrationNames,)
            )
        ];

        var_dump($migrations);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
