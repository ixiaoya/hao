<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maxi-mum-scale=1.0,user-scalable=no" name="viewport" />
  <title>号卡中心</title>
  <link rel="stylesheet" href="other/main.css">
</head>

<body>
  <div class="focus">
    <ul>
      <li><img src="img/1.png"></li>
      <li><img src="img/2.png" alt=""></li>
      <li><img src="img/1.png" alt=""></li>
      <li><img src="img/2.png" alt=""></li>
      <li><img src="img/1.png" alt=""></li>
    </ul>
    <!-- 小圆点 -->
    <ol>
      <li class="current"></li>
      <li></li>
      <li></li>
    </ol>
  </div>
  <!--公告-->
  <div class="gonggao">
    <div class="gonggao-left">
      <img src="img/gonggao.png">
    </div>
    <div class="gonggao-right">
      所有套餐需激活首充固定金额才可以享受优惠政策 </div>
    <div class="clear"></div>
  </div>
  <!--分类-->
  <div class="height"></div>
  <div class="fenlei">
    <div class="banner">限量领取<a class="right" style="float:right">流量领不停 免费送到家</a></div>
    <div class="navall">
      <!--分类结束-->
      <!-- PHP获取产品 -->
      <?php
      include_once("untils/conn.php");
      mysqli_query($con, "set names utf8");
      $yysname = $_GET['yys'];
      if ($con) {
        //选择数据库
        if ($db) {
          //获取数据总行数
          $sql = "select * from list  where yys='$yysname' ORDER BY xuhao DESC";
          $sortsql = "select * from sort  ORDER BY sortid DESC";
          $data = mysqli_query($con, $sql);
          $sortdata = mysqli_query($con, $sortsql);
      ?> <ul class="box">
            <?php
            if ($yysname==null) {
               $calss='active';
            }
            echo '<li class="cat_child">
                <a href="?yys=" class="'.$calss.'">全部</a>
              </li>';
            while ($sortrow = mysqli_fetch_array($sortdata)) {
            ?> <?php $dqid = $sortrow["yys"] ?>
              <li class="cat_child">
                <a href="?yys=<?php echo $sortrow["yys"] ?>" class="<?php echo $yysname == $dqid ? 'active' : '' ?>"><?php echo $sortrow["yys"] ?></a>
              </li>
            <?php
            }
            ?>
          </ul>
          
          <?php
      function is_repeat_num($num)
     {

        if (strpos($num,'电信')!== false) {


            $res = file_get_contents("http://wap.kaboshihaoka.com/api/goodsList?agent_id=8385&operator=dx");
            return $res;
        }

         if (strpos($num,'移动')!== false) {
            $res = file_get_contents("http://wap.kaboshihaoka.com/api/goodsList?agent_id=8385&operator=yd");
            return $res;
        }

         if (strpos($num,'联通')!== false) {
            $res = file_get_contents("http://wap.kaboshihaoka.com/api/goodsList?agent_id=8385&operator=lt");
            return $res;
        }
        
         $res = file_get_contents("http://wap.kaboshihaoka.com/api/goodsList?agent_id=8385&operator=");
         return $res;   
    }
      $url=is_repeat_num($_GET["yys"]);
    
      $arr = json_decode($url,true);
      
      
      if (empty($arr['data']['data'])) {
      
      echo "<div class='listc2 ellipse1' style='padding-left: 170px'><span>暂无产品</span></div></div>";
      
       }
       
      foreach($arr['data']['data'] as $feature)  {
             $wz=strrpos($feature['goods_name'],'卡');
             $res=substr($feature['goods_name'],0,$wz).'卡';
             $ns=str_replace('卡','', substr($feature['goods_name'],$wz+0));
             //直接解码替换相应内容 简单方便 不用注重格式 想要修改直接B64解码在编码就行
             $html= base64_decode ("PGRpdiBjbGFzcz0iYWxsbGlzdCI+CiAgICAgICAgICAgICAgPGltZyBjbGFzcz0iYWxsbGlzdGwiIHNyYz0i5Li75Zu+IiBvbmNsaWNrPSJsb2NhdGlvbj0nbGonIj4KICAgICAgICAgICAgICA8ZGl2IGNsYXNzPSJhbGxsaXN0YyIgb25jbGljaz0iamF2YXNjcmlwdDpsb2NhdGlvbi5ocmVmPSdsaiciPgogICAgICAgICAgICAgICAgPGRpdiBjbGFzcz0ibGlzdGMxIGVsbGlwc2UxIj7moIfpopg8dGltZT7plb/mnJ/kvJjmg6A8L3RpbWU+CiAgICAgICAgICAgICAgIDwvYnI+CiAgICAgICAgICAgICAgICAgIDxlbXB0eT7pmo/mnLrlj7fnoIE8L2VtcHR5PgogICAgICAgICAgICAgICAgPC9kaXY+CiAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzPSJsaXN0YzIgZWxsaXBzZTEiPjxzcGFuPuWll+mkkOWGheWuuTwvc3Bhbj48L2Rpdj4KICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9InB1bGwtbGVmdCI+PHNwYW4gY2xhc3M9ImJhb3lvdSI+5YWo5Zu95YWN6LS55YyF6YKuPC9zcGFuPiZuYnNwOyZuYnNwOzxzcGFuIGNsYXNzPSJndWlzaHVkaSI+5b2S5bGe5Zyw77ya6ZqP5py6PC9zcGFuPjwvZGl2PgogICAgICAgICAgICAgIDwvZGl2PgogICAgICAgICAgICAgIDxhIGhyZWY9ImxqIiBjbGFzcz0iYWxsbGlzdHIxIj7nq4vljbPpooblj5Y8L2E+CiAgICAgICAgICAgIDwvZGl2Pg==");
            $html = str_replace('标题', $res, $html); //将搜索到的条件替换为 ' '
            $html = str_replace('主图', 'http://wap.kaboshihaoka.com/'.$feature['goods_pic'], $html); //将搜索到的条件替换为 ' '
            $html = str_replace('长期优惠', $feature['selling_point'], $html); //将搜索到的条件替换为 ' '
            $html = str_replace('<empty>随机号码</empty>', '', $html); //$feature['price']
            $html = str_replace('套餐内容',$ns, $html); //将搜索到的条件替换为 ' '
            $html = str_replace('lj',$feature['link'], $html); //将搜索到的条件替换为 ' '
            $html = str_replace('归属地：随机','优先本地发货', $html); //将搜索到的条件替换为 ' '
            echo $html;
      };
        }
      }
      ?>
    </div>
  </div>
  <input type="hidden" id="is_login" value="-1">
  <div class="bottom1">
    <div class="height1"></div>
  </div>
</body>
<script>
  /** @format */
  window.addEventListener('load', function() {
    // alert(1);
    // 1. 获取元素
    var focus = document.querySelector('.focus');
    var ul = focus.children[0];
    // 获得focus 的宽度
    var w = focus.offsetWidth;
    var ol = focus.children[1];
    // 2. 利用定时器自动轮播图图片
    var index = 0;
    var timer = setInterval(function() {
      index++;
      var translatex = -index * w;
      ul.style.transition = 'all .3s';
      ul.style.transform = 'translateX(' + translatex + 'px)';
    }, 2000);
    // 等着我们过渡完成之后，再去判断 监听过渡完成的事件 transitionend
    ul.addEventListener('transitionend', function() {
      // 无缝滚动
      if (index >= 3) {
        index = 0;
        // console.log(index);
        // 去掉过渡效果 这样让我们的ul 快速的跳到目标位置
        ul.style.transition = 'none';
        // 利用最新的索引号乘以宽度 去滚动图片
        var translatex = -index * w;
        ul.style.transform = 'translateX(' + translatex + 'px)';
      } else if (index < 0) {
        index = 2;
        ul.style.transition = 'none';
        // 利用最新的索引号乘以宽度 去滚动图片
        var translatex = -index * w;
        ul.style.transform = 'translateX(' + translatex + 'px)';
      }
      // 3. 小圆点跟随变化
      // 把ol里面li带有current类名的选出来去掉类名 remove
      ol.querySelector('.current').classList.remove('current');
      // 让当前索引号 的小li 加上 current   add
      ol.children[index].classList.add('current');
    });

    // 4. 手指滑动轮播图
    // 触摸元素 touchstart： 获取手指初始坐标
    var startX = 0;
    var moveX = 0; // 后面我们会使用这个移动距离所以要定义一个全局变量
    var flag = false;
    ul.addEventListener('touchstart', function(e) {
      startX = e.targetTouches[0].pageX;
      // 手指触摸的时候就停止定时器
      clearInterval(timer);
    });
    // 移动手指 touchmove： 计算手指的滑动距离， 并且移动盒子
    ul.addEventListener('touchmove', function(e) {
      // 计算移动距离
      moveX = e.targetTouches[0].pageX - startX;
      // 移动盒子：  盒子原来的位置 + 手指移动的距离
      var translatex = -index * w + moveX;
      // 手指拖动的时候，不需要动画效果所以要取消过渡效果
      ul.style.transition = 'none';
      ul.style.transform = 'translateX(' + translatex + 'px)';
      flag = true; // 如果用户手指移动过我们再去判断否则不做判断效果
      e.preventDefault(); // 阻止滚动屏幕的行为
    });
    // 手指离开 根据移动距离去判断是回弹还是播放上一张下一张
    ul.addEventListener('touchend', function(e) {
      if (flag) {
        // (1) 如果移动距离大于50像素我们就播放上一张或者下一张
        if (Math.abs(moveX) > 50) {
          // 如果是右滑就是 播放上一张 moveX 是正值
          if (moveX > 0) {
            index--;
          } else {
            // 如果是左滑就是 播放下一张 moveX 是负值
            index++;
          }
          var translatex = -index * w;
          ul.style.transition = 'all .3s';
          ul.style.transform = 'translateX(' + translatex + 'px)';
        } else {
          // (2) 如果移动距离小于50像素我们就回弹
          var translatex = -index * w;
          ul.style.transition = 'all .1s';
          ul.style.transform = 'translateX(' + translatex + 'px)';
        }
      }
      // 手指离开的时候就重新开启定时器
      clearInterval(timer);
      timer = setInterval(function() {
        index++;
        var translatex = -index * w;
        ul.style.transition = 'all .3s';
        ul.style.transform = 'translateX(' + translatex + 'px)';
      }, 2000);
    });
  });
</script>

</html>