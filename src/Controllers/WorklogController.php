<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Core\Request;
use App\Core\Response;
use App\Models\Feedback;
use App\Models\Worklog;

class WorklogController extends Controller{
    public function __construct()
    {
        AuthMiddleware::auth();
        $this->worklog = new Worklog();
        $this->feedback = new Feedback();

    }

    public function index() {
        $worklogs = $this->worklog->getUserWorklogs();

        $this->view('Employee/dashboard', $worklogs);
    }

    public function getWorklogForm() {
        $this->view('Employee/worklog-add');
    }

    public function store(Request $request) {
        $this->viewData['input'] = $request->getBody();

        foreach($this->viewData['input'] as $key => $value){
            if(empty($value)){
                $this->viewData['error'][$key] = "Please enter $key.";
            }
        }

        if(empty(array_values($this->viewData['error']))){
            $this->worklog->createWorklog([
                'description' => $this->viewData['input']['description'],
                'user_id' => $this->viewData['input']['user_id']
            ]);

            Response::redirect('/main');
        }
        $this->view('Employee/worklog-add', $this->viewData);
    }

    public function show(Request $request, $id) {
        $this->viewData['input'] = (array) $this->worklog->getWorklog(['id' => $id]);

        $this->viewData['feedback'] = (array) $this->feedback->getFeedback(['worklog_id' => $id]);

        $this->view('Employee/worklog-edit', $this->viewData);
    }


    public function update(Request $request, $id) {
        $this->viewData['input'] = $request->getBody();

        foreach($this->viewData['input'] as $key => $value){
            if(empty($value)){
                $this->viewData['error'][$key] = "Please enter $key.";
            }
        }

        if(empty(array_values($this->viewData['error']))){
            $this->worklog->updateWorklog([
                'description' => $this->viewData['input']['description'],
                'user_id' => $this->viewData['input']['user_id'],
                'id' => $this->viewData['input']['id']
            ]);

            Response::redirect('/main');
        }
        $this->view('Employee/worklog-edit', $this->viewData);
    }

    public function destroy(Request $request, $id) {
        $worklog = $this->worklog->getWorklog(['id' => $id]);

        if($worklog) {
            $this->worklog->deleteWorklog(['id' => $id]);
            Response::redirect('/admin-dashboard');
        }

        echo "Something went wrong";
    }
}
