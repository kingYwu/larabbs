<?php
$QueryString=$_SERVER["QUERY_STRING"];

$n=sscanf($QueryString,"E=%f&N=%f",$latitude,$longittude);

if(isset($longittude)){
  $servername = "212.64.1.211";
  $username = "larabbs";
  $password = "wuqingyu123";
  $dbname = "larabbs";

// 创建连接
  $conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
  if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
  }

  $sql = "UPDATE pets SET longittude = $longittude ,latitude= $latitude WHERE id=1";
  $conn->query($sql);

}

?>
@extends('layouts.app')

@section('content')

<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=GKO5tG2h8b88rEaOUXhAHdfdfT55X4Vl"></script>

<h2>百度地图</h2>

<!-- 按钮触发模态框 -->

<input type="button" value="showMap" id="createMap" style="display:none"/>

{{--<input type="button" value="hidenMap" id="hidenMap"/>--}}

<!-- 模态框（Modal） -->

<div id="maps" style="width:100%;height:700px;">

</div>

<script type="text/javascript">


  window.onload = function(){
    var button = document.getElementById('createMap');
    button.click();//执行执行点击按钮
  };

  $(function(){

   /* $("#hidenMap").click(function(){

      $("#maps").hide();

    });
*/
    $("#createMap").click(function(){

      $("#maps").show();

      var map = new BMap.Map("maps");

      var myCity = new BMap.LocalCity();

      var point = new BMap.Point(119.0160679873,33.6526680683);

      myCity.get(function(res){

        map.centerAndZoom(point,18);

      });
      map.enableScrollWheelZoom(true);
      var points;
      var marker;
      @foreach($pets as $pet)
            points= new BMap.Point({{$pet->latitude}},{{$pet->longittude}});
              marker = new BMap.Marker(points);        // 创建标注
             map.addOverlay(marker);
      @endforeach
    });

  });


</script>

@endsection
