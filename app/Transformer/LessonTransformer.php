<?php
/**
 * Created by PhpStorm.
 * User: 19648
 * Date: 2018/1/3
 * Time: 11:02
 */

namespace App\Transformer;


class LessonTransformer extends Transformer
{
    public function transform($lesson){
        return [
            'title'=>$lesson['title'],
            'content'=>$lesson['body'],
            'is_free'=>(boolean)$lesson['free'],
        ];
    }
}