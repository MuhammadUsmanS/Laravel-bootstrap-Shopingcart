<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Arr; //hard


use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {

        // $class = get_class($exception);

        //     //if $class ('Illuminate\Auth\AuthenticationException')
        //      $class = get_class($exception);

        //         switch($class) {
        //             case 'Illuminate\Auth\AuthenticationException':

        //                 $guard = array($exception->guards(), 0);

        //                 switch ($guard) {
        //                     case 'admin':
        //                         $login = 'admin.login';
        //                         break;
        //                     default:
        //                         $login = 'user.login';
        //                         break;
        //                 }

        //                 return redirect()->route($login);
        //         }

        return parent::render($request, $exception);
    }

    //IN LASTES laravel version i hard coded this function 
protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }//this is for    api request and give it a string 

        //custom
        $guard = Arr::get($exception->guards(),0);// it getting the string , what kind of kind of guard request  are comming  like i.e   admin or  user 
        switch ($guard) {
            case 'admin':
                $login ='admin.login';  //  for example we are accessing                  
                                        //   /adminDashboard   it means it getting admin  
                                        //    guard toute
                break;
            
            default:
                $login = 'user.login';
                break;
        }


     //   return redirect()->guest('login');
        return redirect()->guest(route($login));

    }






}




