<?php
session_start();

require_once 'task_manager.php';

$taskManager = new TaskManager();

if (isset($_POST['add_task_list'])) {
    $category = $_POST['task_list'];

    $taskManager->addTaskList($category);
}

if (isset($_POST['select_list'])) {
    $category = $_POST['category'];

    $taskManager->selectedTaskList($category);
}

if (isset($_POST['add_task']) && !empty($_SESSION['selected_task_category'])) {
    $task = $_POST['task'];
    $category = $_SESSION['selected_task_category'];

    $taskManager->addTask($task, $category);
}

if (isset($_GET['delete_task'])) {
    $taskIndex = $_GET['delete_task'];

    $taskManager->deleteTask($taskIndex);
    header('location: index.php');
}

if (isset($_POST['clear_all'])) {
    $taskManager->clearAllTasks();
}

$taskDisplayList = $taskManager->getTaskDisplayList();

$taskList = $taskManager->getTaskList();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Task List Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script>
        function confirmClear() {
            return confirm("Are you sure you want to clear all tasks?");
        }
    </script>
</head>

<body>
    <div class="container">
        <h2>Task List Manager</h2>
        <hr>

        <div class="row">
            <!-- Add task section start -->
            <div class="col-6">
                <?php if (empty($_SESSION['task_list'])) { ?>
                    <p>Add a new list to be managed</p>
                <?php } else { ?>
                    <?php if (!empty($_SESSION['selected_task_category'])) { ?>
                        <p>Current selected list
                            <ul>
                                <li><?php echo $_SESSION['selected_task_category']; ?></li>
                            </ul>
                        </p>
                    <?php } ?>

                    <?php if (!empty($_SESSION['selected_task_category']) && empty($_SESSION['task_display_list'])) { ?>
                        <p>There are no tasks in the selected task list.</p>
                    <?php } ?>
                <?php } ?>

                <?php if (!empty($_SESSION['task_list'])) { ?>
                    <form method="post">
                        <div class="form-group">
                            <label>Task:</label>
                            <input type="text" name="task" class="form-control" style="width:50%;" required>
                        </div>
                        <br>
                        <div class="button-group">
                            <button type="submit" name="add_task" class="add_task btn btn-primary submit mb-4">Add Task</button>
                        </div>
                    </form>
                <?php } ?>
            </div>
            <!-- Add task section end -->

            <!-- Add list section start -->
            <div class="col-6">
                <div class="form-group">
                    <h4>List Selection</h4>
                    <?php
                    if (empty($_SESSION['task_list'])) {
                    ?>
                        <p>There are no task lists.</p>
                    <?php } else { ?>
                        <form method="post">
                            <div class="form-group">
                                <label>List:</label>
                                <select name="category" class="form-select form-select-sm" style="width:50%;" required>
                                    <?php foreach ($taskList as $index => $task_list) { ?>
                                        <option value="<?php echo $task_list['category']; ?>"
                                            <?php if (!empty($_SESSION['selected_task_category']) && $_SESSION['selected_task_category'] == $task_list['category']) { echo " selected"; } ?>>
                                            <?php echo $task_list['category']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br>
                            <div class="button-group">
                                <button type="submit" name="select_list" class="btn btn-primary submit mb-4">Select List</button>
                            </div>
                        </form>
                    <?php } ?>
                </div>
                <br>
                <form method="post">
                    <div class="form-group">
                        <h5>Add task list</h5>
                        <label>List:</label>
                        <input type="text" name="task_list" class="form-control" style="width:50%;" required>
                    </div>
                    <br>
                    <div class="button-group">
                        <button type="submit" name="add_task_list" class="btn btn-primary submit mb-4">Add List</button>
                    </div>
                </form>
            </div>
            <!-- Add list section end -->
        </div>
        <div class="row">
            <form id="clearAllForm" method="post" style="display: none;">
                <input type="hidden" name="clear_all">
            </form>
            <div class="col-4"></div>
            <div class="col-4">
                <?php
                    $session_not_set = false;
                    if (empty($_SESSION['task_display_list']) && empty($_SESSION['task_list']) && empty($_SESSION['selected_task_category'])) {
                        $session_not_set = true;
                    }
                ?>
                <div class="button-group">
                    <button type="button" name="clear_all" class="btn btn-danger submit mb-4" onclick="if(confirmClear()) { document.getElementById('clearAllForm').submit(); }" <?php if ($session_not_set) { echo " disabled"; } ?>>Clear All</button>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
        <div class="row task-list">
            <div class="col-6">
                <h2>Task List:</h2>
                <table class="table table-striped">
                    <tr>
                        <th scope="col">Task</th>
                        <th scope="col">Category</th>
                        <th scope="col">Actions</th>
                    </tr>
                    <?php
                    if (!empty($taskDisplayList)) {
                        foreach ($taskDisplayList as $index => $task) { ?>
                            <tr scope="row">
                                <td><?php echo $task['task']; ?></td>
                                <td><?php echo $task['category']; ?></td>
                                <td class="actions">
                                    <a href="index.php?delete_task=<?php echo $index; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr scope="row">
                            <td colspan="3">There is no task available.</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function(){
        var selectedList = '';
        <?php if ($_SESSION['selected_task_category']){ ?>
            selectedList = "<?php echo $_SESSION['selected_task_category']; ?>";
        <?php } ?>

        $('.add_task').click(function(){
            if (selectedList == '') {
                alert('Please select task list first.');
            }
        });
    });
</script>