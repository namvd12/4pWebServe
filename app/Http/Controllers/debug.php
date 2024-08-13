<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class debug extends Controller
{  
    public function __construct($data)
    {
        $this->debug_to_console($data);
    }
    private function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
        echo "<script>console.log('log:" . $output . "' );</script>";
    }
}