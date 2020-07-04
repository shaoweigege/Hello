<?php 
/**
 * 关于
 * 
 * @package custom 
 * 
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
	$this->need('header.php');
?>
<?php
$this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
Typecho_Widget::widget('Widget_Stat')->to($stat);
$data_arr = array();
while ($archives->next()){array_push($data_arr,date('Y-m',$archives->created));}


?>
<div class="page" id="main" role="main">
    
    <article class="post">
        <div class="charts-box">
            <div class="chart"><div id="chart-1" class="wh-100"></div></div>
            <div class="chart"><div id="chart-2" class="wh-100"></div></div>
        </div>
         <div class="charts-box">
            <div class="chart"><div id="chart-3" class="wh-100"></div></div>
            <div class="chart"><div id="chart-4" class="wh-100"></div></div>
        </div>
    </article>
    
    <article class="post">
        <div class="tem markdown-body">
	        <div class="post-content tem" itemprop="articleBody"><?php $this->content(); ?></div>
            <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1')->to($tags);
            $tagslist='';
                while($tags->next()){
                    $tagslist.='{"name":"'.$tags->name.'","value":'.$tags->count.',"url":'.'"'.$tags->permalink.'"},';
                }
            ?>
	   </div>
    </article>
<?php $this->widget('Widget_Metas_Category_List')->to($info); $info_arr = array();while($info->next()){array_push($info_arr,array($info->name,$info->count));}$new_arr = quickSort($info_arr);$selected="";$sdata="";for($i=0;$i<count($new_arr);$i++){ $sdata.='"'.$new_arr[$i][0].'",';if($i<6){$selected.='"'.$new_arr[$i][0].'":'.'true,';}else{$selected.='"'.$new_arr[$i][0].'":'.'false,';}}?>
<script src="https://lib.baomitu.com/echarts/4.7.0/echarts.min.js"></script>    
<script src="https://file.ztongyang.cn/cloud/1/2020/06/12/echarts-wordcloud.min.js"></script>    
<script type="text/javascript">
var Chart1=echarts.init(document.getElementById('chart-1'));var option1={title:{text:'文章发布统计图',textStyle:{color:"#ddd",fontSize:20},padding:[20,0,0,20],},tooltip:{trigger:'axis'},grid:{left:40,right:20,bottom:80,},xAxis:{type:'category',data:<?php echo(echart_data($data_arr)[0]);?>,axisLine:{lineStyle:{color:"#bbb",}},axisLabel:{rotate:10,interval:0},},yAxis:{type:'value',axisLine:{lineStyle:{color:"#bbb",}},splitLine:{show:true,lineStyle:{color:"grey",width:1,type:'solid'}}},dataZoom:[{startValue:'2019-11',bottom:20,},{type:'inside'}],series:[{data:<?php echo(echart_data($data_arr)[1]);?>,type:'line',color:"#1689db",name:'发布文章数',legendHoverLink:true,markLine:{silent:true,data:[{type:'average',name:'平均值',lineStyle:{normal:{color:"orange",}}}],}}],};Chart1.setOption(option1);var Chart2=echarts.init(document.getElementById('chart-2'));var option2={baseOption:{title:{text:'文章分类统计图',textStyle:{color:"#ddd",fontSize:20},padding:[20,0,0,20],},tooltip:{show:true},legend:{type:'scroll',orient:'vertical',align:"left",right:10,top:40,bottom:20,data:[<?php echo $sdata;?>],selected:{<?php echo $selected;?>},textStyle:{color:"orange"}},series:[{name:'文章分类',type:'pie',radius:'55%',color:<?php SuijiColor($stat->categoriesNum,100,250);?>,data:[<?php $this->widget('Widget_Metas_Category_List')->parse('{name:"{name}",value:"{count}",url:"{permalink}"},');?>],itemStyle:{normal:{shadowBlur:200,shadowColor:'rgba(0, 0, 0, 0.5)'}}}],},media:[{query:{maxWidth:992},option:{legend:{type:'scroll',orient:'horizontal',align:"left",bottom:20,left:"center",data:[<?php echo $sdata;?>],selected:{<?php echo $selected;?>},textStyle:{color:"orange"}},}},]};Chart2.setOption(option2);function eConsole(param){window.open(param.data.url)}Chart2.on("click",eConsole);function getVirtulData(year){year=year||'2017';var date=+echarts.number.parseDate(year+'-01-01');var end=+echarts.number.parseDate((+year+1)+'-01-01');var dayTime=3600*24*1000;var data=[];for(var time=date;time<end;time+=dayTime){data.push([echarts.format.formatTime('yyyy-MM-dd',time),Math.floor(Math.random()*10)])}return data}var data=getVirtulData(2016);var Chart3=echarts.init(document.getElementById('chart-3'));var option3={title:{text:'文章发布日历图',subtext:'测试中，数据纯属虚构',textStyle:{color:"#ddd",fontSize:20},padding:[20,0,0,20],},tooltip:{show:true,},calendar:[{top:65,left:60,right:20,range:['2016-01-01','2016-06-30'],cellSize:[20,15],splitLine:{show:true,lineStyle:{color:'#000',width:2,type:'solid'}},yearLabel:{formatter:'{start}  1st',textStyle:{color:'#bbb',fontSize:16,}},dayLabel:{color:'#bbb',fontSize:10,},monthLabel:{color:'#bbb',fontSize:10,},itemStyle:{color:'#323c48',borderWidth:1,borderColor:'#111'}},{top:200,left:60,right:20,range:['2016-07-01','2016-12-31'],cellSize:[20,15],splitLine:{show:true,lineStyle:{color:'#000',width:2,type:'solid'}},dayLabel:{color:'#bbb',fontSize:10,},monthLabel:{color:'#bbb',fontSize:10,},yearLabel:{formatter:'{start}  2nd',textStyle:{color:'#bbb',fontSize:16,}},itemStyle:{color:'#323c48',borderWidth:1,borderColor:'#111'}}],series:[{name:'发布文章',type:'scatter',coordinateSystem:'calendar',data:data,symbolSize:function(val){return val[1]*1.6},itemStyle:{color:'green'}},{name:'发布文章',type:'scatter',coordinateSystem:'calendar',calendarIndex:1,data:data,symbolSize:function(val){return val[1]*1.6},itemStyle:{color:'#ddb926'}},]};Chart3.setOption(option3);var Chart4=echarts.init(document.getElementById('chart-4'));var option4={title:{text:'文章标签词云图',textStyle:{color:"#ddd",fontSize:20},padding:[20,0,0,20],},tooltip:{show:true,},series:[{type:'wordCloud',sizeRange:[16,65],rotationRange:[-45,90],textStyle:{normal:{color:function(){return'rgb('+[Math.round(Math.random()*160),Math.round(Math.random()*160),Math.round(Math.random()*160)].join(',')+')'}}},data:[<?php echo $tagslist;?>]}]};Chart4.setOption(option4);Chart4.on("click",eConsole);    
</script>


<?php $this->need('comments.php'); ?>
</div>
<?php $this->need('footer.php'); ?>
    




        