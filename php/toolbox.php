<?php
// °°°°°°°°°°°°°°°°°°°°°°°°°° ToDO °°°°°°°°°°°°°°°°°°°°°°°°°°
// OK Font links not in CSS file
// OK Trim text before sending it the the DB
// Reduce queries to 1, not 2
// Why rowCount??
// OK Upload DB on GitHub
// !!!Pick Up Your Debug Code On Your Way Out!!!!
// °°°°°°°°°°°°°°°°°°°°°°°°°° Debug °°°°°°°°°°°°°°°°°°°°°°°°°°
ini_set('display_errors', 1);
error_reporting(E_ALL);
// °°°°°°°°°°°°°°°°°°°°°°°°°° DB HookUp °°°°°°°°°°°°°°°°°°°°°°°°°°
try
{
  $db = new PDO('mysql:host=localhost;dbname=todolist;charset=utf8', 'root', 'user', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
// °°°°°°°°°°°°°°°°°°°°°°°°°° Sani °°°°°°°°°°°°°°°°°°°°°°°°°°
function sanitize($key, $filter=FILTER_SANITIZE_STRIPPED){
    $sanitized_variable = null;
    if(isset($_POST['desc'])OR isset($_POST['task[]'])){
        if(is_array($key)){
        $sanitized_variable = filter_var_array($key, $filter);
        }
        else {
        $sanitized_variable = filter_var($key, $filter);
        }
    }
    return $sanitized_variable;
echo($sanitized_variable);
}
// °°°°°°°°°°°°°°°°°°°°°°°°°° Task addition °°°°°°°°°°°°°°°°°°°°°°°°°°
if(isset($_POST['desc'])) {
  $desc = sanitize($_POST['desc']);
  $desc = trim($_POST['desc']);
  if (!empty($desc)) {
    $add_task = $db->prepare('
      INSERT INTO task_table (task_desc)
      VALUES (:desc)
    ');
    $add_task->execute([
      'desc' => $desc
    ]);
  }
}
// °°°°°°°°°°°°°°°°°°°°°°°°°° Task' status change °°°°°°°°°°°°°°°°°°°°°°°°°°
if (isset($_POST['check_task'])){
  $check = ($_POST['task']);
  foreach ($check as $key) {
  $dbup = '
    UPDATE task_table
    SET done = 1
    WHERE task_desc = "'.$key.'"
    ';
  $update = $db->exec($dbup);
  }
}
// °°°°°°°°°°°°°°°°°°°°°°°°°° Display tasks w/cond °°°°°°°°°°°°°°°°°°°°°°°°°°
$request = $db->prepare('SELECT * FROM task_table');
$request->execute();
$task_todos = $request->rowCount() ? $request : []; //Why??

// °°°°°°°°°°°°°°°°°°°°°°°°°° !!!! 1 QUERY °°°°°°°°°°°°°°°°°°°°°°°°°°
// <?php
//     foreach ($receipt as $key => $value) {
//         if ($value["Terminer"] == false){
//
//             echo "<li><input id='chkTask' onclick='ShowHideDiv(this)' type='checkbox' name='newtask[]' value='".$value["taskname"]."'/>
//             <label for='choice'>".$value["taskname"]."</label></li><br />";
//         }
//     }

$tasks_todo = $db->query('SELECT * FROM task_table WHERE done=0');
$tasks_done = $db->query('SELECT * FROM task_table WHERE done=1');
$title = 'TodoList (SQL)';
?>
