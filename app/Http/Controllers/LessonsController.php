<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LessonsController extends Controller
{
    public function index(){
        //all()方法缺陷
        //数据多的时候查找慢
        //没有提示信息
        //直接展示我们的数据结构
        //没有错误信息
        $lessons=Lesson::all();
        return Response::json([
            'status'=>'success',
            'code'=>200,
            'data'=>$this->transformCollection($lessons)
        ]);
    }

    public function show($id){
        $lesson=Lesson::findOrFail($id);
        return Response::json([
            'status'=>'success',
            'code'=>200,
            'data'=>$this->transform($lesson)
        ]);
    }

//    private function transform($lessons){
//        return array_map(function($lesson){
//            return [
//                'title'=>$lesson['title'],
//                'content'=>$lesson['body'],
//                'is_free'=>(boolean)$lesson['free'],
//            ];
//        },$lessons->toArray());
//    }
    private function transformCollection($lessons){
        return array_map([$this,'transform'],$lessons->toArray());
    }
    private function transform($lesson){
        return [
            'title'=>$lesson['title'],
            'content'=>$lesson['body'],
            'is_free'=>(boolean)$lesson['free'],
        ];
    }
}
