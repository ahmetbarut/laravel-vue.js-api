<?php 

namespace App\Github;

use Illuminate\Support\Str;

trait Parse {

    public function name($name)
    {
        return Str::of($name)->title();
    }
}