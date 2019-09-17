<?php

namespace App\Http\Controllers;

use App\FeedbackStorage\StorageFactory;
use App\Http\Requests\FeedbackRequest;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('feedback.index');
    }


    /**
     * @param FeedbackRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(FeedbackRequest $request)
    {
        $feedbackData = $request->validated();
        // Вместо фабрики можно было воспользоваться имеющимися инструментами фреймворка,
        // которые выполняют автоматическое внедрение зависимостей по интерфейсу
        $storage = StorageFactory::createStorage('file');
        $storage->store($feedbackData);
        if (request()->wantsJson()) {
            return response(['data' => $feedbackData, 'message' => 'Обращение сохранено.'], 201);
        }
        return back();
    }
}
