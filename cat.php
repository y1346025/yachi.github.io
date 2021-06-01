<form>
搜尋：<input type="text" name="搜尋">
</form><?php
class SQLiteDB extends SQLite3
{
  function __construct()
  {
     $this->open('cat.db');
  }
}
$db = new SQLiteDB();

// 查詢表中的數據

echo "<b> Select Data from cat table :</b><hr/>";

$sql =<<<EOF
  SELECT * from cat;
EOF;

$ret = $db->query($sql);
while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ 
  echo "Name = ". $row['Name'] ."<br/>\n";
  echo "Age = ". $row['Age'] . "<br/>\n";
  echo "Color = ". $row['Color'] ."<br/>\n";
  echo "Appearence =  ".$row['Appearence'] ."<br/>\n\n";
  echo '----------------------------------<br/>';
}

$db->close();
?>
搜尋:<input type="search" class="light-table-filter" data-table="order-table" placeholder="請輸入關鍵字">
<body>
    <div class="wrap">
        <div class="table"></div>
        <div class="body"></div>
    </div>
</body>
<table class="order-table">
  <thead>
    <tr>
      <th>名字</th>
      <th>年齡</th>
	  <th>顏色</th>
	  <th>特徵</th>
	  <th>圖片</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>步步</td>
      <td>2歲</td>
	  <td>橘色</td>
	  <td>蘇格蘭折耳假立耳貓 黏人 小醜貓1號 大叔</td>
	  <td><img src = "https://scontent.ftpe7-4.fna.fbcdn.net/v/t1.15752-9/185721361_369367494512686_1546488880284783025_n.jpg?_nc_cat=107&ccb=1-3&_nc_sid=ae9488&_nc_ohc=xgav139Jrg4AX97bt-o&tn=87NdA4TJJQ6NdaJ8&_nc_ht=scontent.ftpe7-4.fna&oh=ab8dc125e24c156c07e5188389e498bd&oe=60D8171D" width = "200" >
	  <td>
    </tr>
    <tr>
      <td>毛毛</td>
      <td>2歲</td>
	  <td>黑白</td>
	  <td>蘇格蘭折耳貓 可愛 很像貓</td>
	  <td><img src = "https://scontent.ftpe7-2.fna.fbcdn.net/v/t1.15752-9/193203620_525377838870765_8858463153082674150_n.jpg?_nc_cat=109&ccb=1-3&_nc_sid=ae9488&_nc_ohc=O0OQSbv2frcAX9rez-U&_nc_ht=scontent.ftpe7-2.fna&oh=1c16ca3addbe0a681ad9c195fdf00d63&oe=60D6E3E3" width = "200" >
	  <td>
    </tr>
    <tr>
      <td>白白</td>
      <td>1歲</td>
	  <td>黑白橘(髒髒)</td>
	  <td>蘇格蘭折耳貓捲耳貓 臭臉臉小公主 可愛 大屁股</td>
	  <td><img src = "https://scontent.ftpe7-3.fna.fbcdn.net/v/t1.15752-9/192897106_518679262651033_6255626975742883949_n.jpg?_nc_cat=108&ccb=1-3&_nc_sid=ae9488&_nc_ohc=gp-lGC8X9FIAX_fLiUN&_nc_ht=scontent.ftpe7-3.fna&oh=5e8515da2d92e1d2fb71ab4ad2b69ed2&oe=60D6C1A3" width = "200" >
	  <td>
    </tr>
    <tr>
      <td>豆豆</td>
      <td>1歲</td>
	  <td>黑白</td>
	  <td>蘇格蘭折耳貓真立耳貓 很肥 小醜貓2號 會被毛毛揍</td>
	  <td><img src = "https://scontent.ftpe7-3.fna.fbcdn.net/v/t1.15752-9/147569789_244633063872374_2092778725357662834_n.jpg?_nc_cat=103&ccb=1-3&_nc_sid=ae9488&_nc_ohc=Yt0CpZSa204AX98l3KH&_nc_ht=scontent.ftpe7-3.fna&oh=80a9f530170c0b88abb03ed8e633fe54&oe=60D70307" width = "200" >
	  <td>
    </tr>
	<tr>
	  <td>可樂</td>
      <td>1歲</td>
	  <td>黑白</td>
	  <td>蘇格蘭折耳貓 黏人 小醜貓3號 戰鬥陀螺 會被白白扁</td>
	  <td><img src = "https://scontent.ftpe7-2.fna.fbcdn.net/v/t1.15752-9/191378592_1312668512461401_9036458140251865668_n.jpg?_nc_cat=109&ccb=1-3&_nc_sid=ae9488&_nc_ohc=eyQoeonrf2wAX8_Lla1&_nc_ht=scontent.ftpe7-2.fna&oh=ec8697b556d867f8fd937754daea619b&oe=60D6C82D" width="200" >
	  </td>
	 </tr>
  </tbody>
</table>
<script>
(function(document) {
  'use strict';

  // 建立 LightTableFilter
  var LightTableFilter = (function(Arr) {

    var _input;

    // 資料輸入事件處理函數
    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
      Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }

    // 資料篩選函數，顯示包含關鍵字的列，其餘隱藏
    function _filter(row) {
      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
      // 初始化函數
      init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
    };
  })(Array.prototype);

  // 網頁載入完成後，啟動 LightTableFilter
  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });

})(document);
</script>