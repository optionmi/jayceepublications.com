<?php

namespace App\Http\Controllers\Admin;

use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\ConfigRepository;
use App\Http\Requests\StoreConfigRequest;

class ConfigController extends Controller
{
    public $config;

    public function __construct(ConfigRepository $configRepository)
    {
        $this->config = $configRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $config = [
            'phone' => Config::where('name', 'phone')->value('value'),
            'whatsapp' => Config::where('name', 'whatsapp')->value('value'),
            'email' => Config::where('name', 'email')->value('value'),
        ];
        return view('admin.configs.index', compact('config'));
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
        $configs = Config::whereIn('name', ['phone', 'whatsapp', 'email'])->get();

        foreach ($configs as $config) {
            $config->value = $request->input($config->name);
            $config->save();
        }

        if ($request->hasFile('logo')) {
            $uploadedFile = $this->uploadFile($request->file('logo'), 'configs/');
            Config::updateOrCreate(['name' => 'logo'], ['value' => $uploadedFile['name']]);
        }

        if ($request->hasFile('catalogue')) {
            $uploadedFile = $this->uploadFile($request->file('catalogue'), 'configs/');
            Config::updateOrCreate(['name' => 'catalogue'], ['value' => $uploadedFile['name']]);
        }

        return $this->jsonResponse((bool)$config, 'Configuration updated successfully');
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
    public function destroy(Request $request, Config $config)
    {
        $configDeletion = $config->delete();
        return $this->jsonResponse((bool)$configDeletion, 'Config deleted successfully');
    }

    public function dataTable()
    {
        $data = $this->generateDataTableData($this->config);
        return response()->json($data);
    }
}
