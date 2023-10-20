<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{

    public $animals = [
        ["name" => "kucing"],
        ["name" => "ayam"],
        ["name" => "ikan"]
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        foreach ($this->animals as $animal) {
            echo "Nama Hewan : " . $animal["name"] . "<br>";
        }
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
        array_push($this->animals, $request);
        $this->index();
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
        $this->animals[$id] = $request;
        $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        unset($this->animals[$id]);
        $this->index();
    }
}
