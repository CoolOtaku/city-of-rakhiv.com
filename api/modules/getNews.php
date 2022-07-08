<?php 
if(isset($_POST)){
    switch ($_POST['type']) {
		case 'byId':
			ReturnById($_POST['id']);
			break;	
		case 'all':
			ReturnAll();
			break;
	}
}
function ReturnAll(){
	$news = mysqli_query($_SESSION['db'],"SELECT * FROM `publications` ORDER BY `id` DESC");
    $emparray = array();
    while($row = mysqli_fetch_assoc($news)){
        $emparray[] = $row;
    }
    $res = json_encode($emparray);
	exit($res);
}
function ReturnById($id){
	$news = mysqli_query($_SESSION['db'],"SELECT * FROM `publications` WHERE `id` = $id");
	$row = mysqli_fetch_assoc($news);
    $res = json_encode($row);
	exit($res);
}
?>