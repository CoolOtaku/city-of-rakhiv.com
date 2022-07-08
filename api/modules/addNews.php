<?php 
$api = new Api(null);
if(isset($_POST)){
    $news = json_decode($_POST['news']);

    $res = mysqli_query($_SESSION['db'],"INSERT INTO `publications` (`title`, `img`, `text`, `date`) VALUES ('".$news->title."', '".$news->img."', '".$news->text."', '".$news->date."')");
    if($res){
        $api->add('res', true);
    }else{
        $api->add('res', false);
    }
    $api->returnRes();
}
?>