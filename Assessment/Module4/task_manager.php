<?php

class TaskManager {
    private $taskDisplayList;
    private $taskList;
    private $selectedTaskCategory;

    public function __construct() {
        $this->taskDisplayList = isset($_SESSION['task_display_list']) ? $_SESSION['task_display_list'] : array();
        $this->taskList = isset($_SESSION['task_list']) ? $_SESSION['task_list'] : array();
    }

    public function addTaskList($category) {
        $newTaskList = array(
            'category' => $category
        );

        $this->taskList[] = $newTaskList;

        $_SESSION['task_list'] = $this->taskList;
    }

    public function addTask($task, $category) {
        $newTask = array(
            'task' => $task,
            'category' => $category
        );

        $this->taskDisplayList[] = $newTask;

        $_SESSION['task_display_list'] = $this->taskDisplayList;
    }

    public function selectedTaskList($category) {
        $newSelectedTaskList = $category;

        $this->selectedTaskCategory = $newSelectedTaskList;

        $_SESSION['selected_task_category'] = $this->selectedTaskCategory;
    }

    public function deleteTask($index) {
        if (isset($this->taskDisplayList[$index])) {
            unset($this->taskDisplayList[$index]);

            $this->taskDisplayList = array_values($this->taskDisplayList);

            $_SESSION['task_display_list'] = $this->taskDisplayList;
        }
    }

    public function clearAllTasks() {
        $this->taskDisplayList = array();
        $this->taskList = array();
        $this->selectedTaskCategory = array();

        $_SESSION['task_display_list'] = $this->taskDisplayList;
        $_SESSION['task_list'] = $this->taskList;
        $_SESSION['selected_task_category'] = $this->selectedTaskCategory;
    }

    public function getTaskDisplayList() {
        return $this->taskDisplayList;
    }

    public function getTaskList() {
        return $this->taskList;
    }
}
?>
