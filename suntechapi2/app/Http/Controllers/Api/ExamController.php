<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ExamService;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;


class ExamController extends Controller
{
    private  $examService;

    public function __construct(ExamService $examService){
        $this -> examService = $examService;
    }

    public function index(Request $request)
    {
        try{
            $limit = $request -> get('limit') ?? config('app.paginate.per_page');  //constan tu khai bao trong config
            $orderBys = [];
            if($request->get('column') && $request->get('sort')){
                $orderBys['column'] = $request->get('column');
                $orderBys['sort'] = $request->get('sort');
            }

            $examsPaginate = $this -> examService -> getAll($orderBys,$limit);
            // return response() -> json([
            //     'status' => true,
            //     'code'   => Response::HTTP_OK,
            //     'exams'  => $examsPaginate -> items(),
            //     'meta'   => [
            //         'total' => $examsPaginate -> total(),
            //         'perPage' => $examsPaginate -> perPage(),
            //         'currentPage' => $examsPaginate -> currentPage()
            //     ]
            // ]);

            $exams = $examsPaginate -> items();
            return view('admin.exam.index', compact('exams'));

        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ]);
        }
    }


    public function create()
    {
        return view('admin.exam.create');
    }


    public function store(Request $request)
    {
        try{
            $exam = $this -> examService -> save(['name' => $request->name]);
            // return response() -> json([
            //     'status' => true,
            //     'code'   => Response::HTTP_OK,
            //     'exam' => $exam
            // ]);
            return redirect('/exams');

        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $name = $request->get('name');
        $validator = Validator::make($request -> all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()->withErrors(['Field required']);
            // return redirect()->back()->with('success', 'your message,here');   
        }


        try{
            $exam = $this -> examService -> findByName($name);
            // dd($exam -> name);
            // return response() -> json([
            //     'status' => true,
            //     'code'   => Response::HTTP_OK,
            //     'exams'  => $exam,
            // ]);
            if($exam -> isEmpty()) {
                return redirect() -> back()->withErrors(['Not found']);
            }
            return view('admin.exam.index', compact('exam'));
            

        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ]);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = $this -> examService -> findById($id);

        return view('admin.exam.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $exam = $this -> examService -> save(['name' => $request->name], $id);
            return response() -> json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'exam' => $exam
            ]);

        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $this -> examService -> delete($id);
            return response() -> json([
                'status' => true,
                'code'   => Response::HTTP_OK
            ]);

        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
