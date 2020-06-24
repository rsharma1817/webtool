<?php
use Illuminate\Support\Facades\Log;

function debug($var) {
    if (config('app.debug')) {
        Log::info(print_r($var, true));
    }
}

