<?php

namespace App\Intervention\Templates;
namespace Intervention\Image\Templates;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Carousel implements FilterInterface
{
    public function applyFilter(Image $image)
    {
    	
        return $image->fit(1300, 400);
    }
}


