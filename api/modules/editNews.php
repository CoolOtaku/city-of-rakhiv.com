<?php 
$api = new Api(null);
if(isset($_POST)){
    $news = json_decode($_POST['news']);

    $res = mysqli_query($_SESSION['db'],"UPDATE `publications` SET `title` = '".$news->title."', `img` = '".$news->img."', `date` = '".$news->date."', `text` = '".$news->text."' WHERE `id` = $news->id");
    if($res){
        $api->add('res', true);
    }else{
        $api->add('res', false);
    }
    $api->returnRes();
}
?>