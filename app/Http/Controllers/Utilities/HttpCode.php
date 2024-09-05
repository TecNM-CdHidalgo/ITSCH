<?php

namespace App\Http\Controllers\Utilities;

abstract class HttpCode {
    const OK             =  200;
    const SUCCESS        =  200;
    const CREATED        =  201;
    const ACCEPTED       =  202;
    const REDIRECT       =  302;
    const BAD_REQUEST    =  400;
    const UNAUTHORIZED   =  401;
    const FORBIDDEN      =  403;
    const NOT_FOUND      =  404;
    const NOT_ACCEPTABLE =  406;
    const TEAPOT         =  418;
}
