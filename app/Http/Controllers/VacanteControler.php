<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate; // Esta línea se ha añadido

class VacanteControler extends Controller // Corregir nombre de la clase
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View // Especificar el tipo de retorno View
    {
        return view('vacantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View // Especificar el tipo de retorno View
    {
        return view('vacantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Lógica para almacenar una vacante
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Lógica para mostrar una vacante específica
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante $vacante): View
    {
        /* // Utilizamos el policy, pasándole el método que queremos utilizar y una instancia de la vacante
        $this->authorize('update', $vacante);
        */
        return view('vacantes.edit', [
            'vacante' => $vacante
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacante $vacante) // Cambié el tipo del parámetro $vacante
    {
        // Lógica para actualizar una vacante
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacante $vacante) // Cambié el tipo del parámetro $vacante
    {
        // Lógica para eliminar una vacante
    }
}



//NO HE PODIDO IMPLEMENTAR EL POLICY ME DA ERROR, 