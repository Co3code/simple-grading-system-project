<?php

namespace app\Controllers;

use config\DBConnection;
use app\Models\TaskModel;

class TaskController
{
    private $TaskModel;

    public function __construct()
    {
        $db = new DBConnection();
        $this->TaskModel = new TaskModel($db);
    }

    //from here
    public function index()
    {
        $tasks = $this->TaskModel->getAll();
        echo $GLOBALS['templates']->render('Tasks', ['tasks' => $tasks]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';

            if (empty($title)) {
                $_SESSION['danger'][] = "The title should not be empty!";
            } else {
                $this->TaskModel->create($title);
            }
        }
        header("Location: /task");
        exit;
    }

    public function edit($id)
    {
        $task = $this->TaskModel->find($id);
        echo $GLOBALS['templates']->render('taskupdate', ['task' => $task]);
    }

    public function update($id, $title, $completed)
    {
        $this->TaskModel->update($id, $title, $completed);
        header("Location: /task");
        exit;
    }

    public function delete($id)
    {
        $this->TaskModel->delete($id);
        header("Location: /task");
        exit;
    }
}
