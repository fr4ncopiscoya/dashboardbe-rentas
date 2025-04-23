<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\VCardController;
use App\Http\Controllers\MailingController;
use App\Http\Controllers\SubscriptionController;

Route::get('/', function () {
    return 'API REST - ERP  ';
});

Route::prefix('dashboard')->group(function () {
    Route::post('sel-anio', [ReporteController::class, 'selAnio']);
    Route::post('sel-mes', [ReporteController::class, 'selMes']);
    Route::post('sel-dia', [ReporteController::class, 'selDia']);
    Route::post('sel-contribuyente', [ReporteController::class, 'selContribuyente']);
    Route::post('sel-concepto', [ReporteController::class, 'selConcepto']);
    Route::post('sel-concepto-montos', [ReporteController::class, 'selConceptoMontos']);
    Route::post('sel-tupa', [ReporteController::class, 'reporteTupa']);
    Route::post('sel-tupa-area', [ReporteController::class, 'reporteTupaArea']);
    Route::post('sel-tupa-area-calendar', [ReporteController::class, 'reporteTupaAreaCalendar']);
    Route::post('sel-multa-calendar', [ReporteController::class, 'reporteMultaCalendar']);
    Route::post('sel-dia-tupa', [ReporteController::class, 'selTupaDia']);

    Route::post('sel-anio-multa', [ReporteController::class, 'selMultaAnio']);
    Route::post('acceso', [ReporteController::class, 'loginUser']);
});

Route::prefix('v1')->group(function () {
    Route::post('vcard-member', [VCardController::class, 'vCardMemberSearch']);
    Route::post('contact-message', [MailingController::class, 'webSendContactMail']);
    Route::post('add-subscriber', [SubscriptionController::class, 'addSubscriber']);
});
