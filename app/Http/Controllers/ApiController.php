<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class ApiController extends Controller
{
    protected $statusCode=200;

    public function getStatusCode(){
        return $this->statusCode;
    }

    public function setStatusCode($statusCode){
        $this->statusCode=$statusCode;
        return $this;
    }

    public function responseNotFound($message='Not found'){
        return $this->setStatusCode(404)->responseError($message);
    }
    private function responseError($message){
        return $this->response([
            'status'=>'failed',
           'errors'=>[
               'code'=>$this->getStatusCode(),
               'message'=>$message
           ]
        ]);
//        return $this->response([
//            'status'=>'failed',
//            'code'=>$this->getStatusCode(),
//            'message'=>$message
//        ]);
//        return Response::json([
//            'status'=>'failed',
//            'code'=>404,
//            'message'=>$message
//        ]);
    }

    public function response($data){
        return Response::json($data,$this->getStatusCode());
    }
}
