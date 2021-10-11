<?php 

namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Core\Request;
use App\Core\Response;
use App\Models\Worklog;
use App\Models\Feedback;

class AdminController extends Controller{
    protected Worklog $worklog;
    protected Feedback $feedback;

    public function __construct()
    {
        AuthMiddleware::admin();
        $this->worklog = new Worklog();
        $this->feedback = new Feedback();
    }

    public function index() {
        $worklogs = (array) $this->worklog->getAllWorklogs();
        $pages = $this->worklog->getPaginationNumber();

        $this->view('Admin/dashboard', array('worklogs' => $worklogs,
         'pages' => $pages));
    }

    public function show(Request $request, $id){
        $this->viewData['input'] = (array) $this->worklog->getWorklog(['id' => $id]);
        $this->viewData['feedback'] = (array) $this->feedback->getFeedback(['worklog_id' => $id]);
        $this->view('Admin/feedback-add', $this->viewData);
    }

    public function store(Request $request, $id){
        $this->viewData['input'] = $request->getBody();

        foreach($this->viewData['input'] as $key => $value){
            if(empty($value)){
                $this->viewData['error'][$key] = "Please enter $key.";
            }
        }

        if(empty(array_values($this->viewData['error']))){
            $this->feedback->createFeedback([
                'feedback' => $this->viewData['input']['feedback'],
                'worklog_id' => $id
            ]);

            Response::redirect('/admin-dashboard');
        }
        $this->view('Admin/feedback-add', $this->viewData);
    }
}