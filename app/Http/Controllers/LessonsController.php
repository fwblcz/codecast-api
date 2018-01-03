<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Transformer\LessonTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LessonsController extends ApiController
{
    //如果LessonTransformer中的方法没有被正确的引入  可以到命令行工具中执行composer dump-autoload  会把自动加载文件重新编译一遍
    //就可以找到Transformer、LessonTransformer两个类
    protected $lessonTransformer;
    public function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer=$lessonTransformer;
    }

    public function index(){
        //all()方法缺陷
        //数据多的时候查找慢
        //没有提示信息
        //直接展示我们的数据结构
        //没有错误信息
        $lessons=Lesson::all();
        return $this->response([
            'status'=>'success',
            'code'=>200,
            'data'=>$this->lessonTransformer->transformCollection($lessons->toArray())
        ]);
    }

    public function show($id){
        $lesson=Lesson::find($id);
        if(!$lesson){
            return $this->responseNotFound();
        }
        return $this->response([
            'status'=>'success',
            'code'=>200,
            'data'=>$this->lessonTransformer->transform($lesson)
        ]);
    }


    public function store(Request $request){
        
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

}
