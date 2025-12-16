<?php

// NUEVA RUTA SIN MIDDLEWARE - Reemplazar en api.php
// Quitar la ruta anterior que tenía middleware(['auth:sanctum']) y usar esta:

// RUTAS PARA FICHA DE ATENCIÓN APP - SIN MIDDLEWARE (autenticación manual en controlador)
Route::post('/paciente/ficha-atencion-app', [App\Http\Controllers\FichaAtencionAppController::class, 'store']);

// Las otras rutas pueden mantenerse con middleware o también convertirse a autenticación manual según necesites:
/*
Route::get('/paciente/ficha-atencion-app/{idPaciente}', [App\Http\Controllers\FichaAtencionAppController::class, 'getFichasPorPaciente']);
Route::get('/paciente/ficha-atencion-app/profesional/{rutProfesional}', [App\Http\Controllers\FichaAtencionAppController::class, 'getFichasPorProfesional']);
Route::get('/paciente/ficha-atencion-app/token/{token}', [App\Http\Controllers\FichaAtencionAppController::class, 'getFichaPorToken']);
Route::put('/paciente/ficha-atencion-app/{id}', [App\Http\Controllers\FichaAtencionAppController::class, 'update']);
Route::delete('/paciente/ficha-atencion-app/{id}', [App\Http\Controllers\FichaAtencionAppController::class, 'destroy']);
*/