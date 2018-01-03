<?php
/**
 * Created by PhpStorm.
 * User: 19648
 * Date: 2018/1/3
 * Time: 10:56
 */

namespace App\Transformer;


abstract class Transformer
{
    public function transformCollection($items){
        return array_map([$this,'transform'],$items);
    }

    public abstract function transform($item);
}