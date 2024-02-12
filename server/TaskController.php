<?php

	require "Task.php";
	require "TaskService.php";
	require "DatabaseConnection.php";

	$dbConnection = new DatabaseConnection();
	$task = new Task();

	$action = isset($_GET['action']) ? $_GET['action'] : $action;
	
	if($action == 'insert' ) {
		$task->__set('name', $_POST['name']);
		$task->__set('id_status', 2);

		$taskService = new TaskService($dbConnection, $task);
		$taskService->insert();

		echo "teste";


		header('Location: new_task.php?inclusao=1');
	
	} else if($action == 'retrieve') {
		$taskService = new TaskService($dbConnection, $task);
		$tasks = $taskService->retrieve();
	} else if($action == 'update') {
		$task->__set('id', $_POST['id'])
			->__set('name', $_POST['tarefa']);
		$taskService = new TaskService($dbConnection, $task);
		if($taskService->update()) {	
			if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
				header('location: index.php');	
			} else {
				header('location: todas_tarefas.php');
			}
		}
	} else if($action == 'remove') {
		$task->__set('id', $_GET['id']);
		$taskService = new TaskService($dbConnection, $task);
		$taskService->remove();
		if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
			header('location: index.php');	
		} else {
			header('location: todas_tarefas.php');
		}
	
	} else if($action == 'markAsCompleted') {
		$task->__set('id', $_GET['id']);
		$task->__set('statusId', 1);
		$taskService = new TaskService($dbConnection, $task);
		$taskService->markAsCompleted();

		if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
			header('location: index.php');	
		} else {
			header('location: todas_tarefas.php');
		}
	
	} else if($action == 'retrievePending') {

		$task->__set('statusId', 2);
		
		$taskService = new TaskService($dbConnection, $task);
		$tasks = $taskService->retrievePending();
		
	}

?>