	
		<!-- 左侧栏 -->
		

<!-- 侧栏已登陆 -->

<aside class="flexbox flex-vertical m-sidebox" id="j-m-aside" data-action="aside-menu2">
	
 
	
		
			<div class="m-side-member">
<!--头像				<a href="http://mp.soqi.cn/mpCompany/goIndex.xhtml" class="m-facebox fixed"-->
				<a href="<?=yii\helpers\Url::to(['user/user'], true)?>" class="m-facebox fixed">
					<div class="m-face iconfont">
					<!--img src="http://7xitth.com2.z0.glb.qiniucdn.com/MjQ5NDM2MDI=.jpg-img120?t=1438700327296" onerror="this.style.display='none'"-->
					<img src="picture/mjq5ndm2mdi=.jpg-img300" onerror="this.style.display='none'">
					</div>
				</a>
				
<!--通知				<a href="http://mp.soqi.cn/mpCompany/systemMsg.xhtml" class="iconfont i-msg"><!-- <i class="i-circle"></i> -></a>-->


<!--姓名-->				
          <a href="{:U('Admin/Index/index')}">
		  <div class="m-name ui-elli">
		  <span style="color: #c5c9d2;">
		  	<?= $userdata['name'] ?>
		  </span>
		  </div>
		  </a>
				
			</div>
			
			<div class="m-side-nav">
				<ul class="navgrounp">
					<li><a href="{:U('Home/Member/index', array('uid'=>{$data.uid}))}" target = "_blank"><i class="iconfont i-card"></i>我的名片</a></li>
<!--					
					<li><a href="http://mp.soqi.cn/mprs/contact.xhtml"><i class="iconfont i-tx"></i>名片通讯录</a></li>
-->					
					<li><a href="http://mp.soqi.cn/mpPersonal/editMC.xhtml"><i class="iconfont i-edit"></i>编辑名片</a></li>
<!--					
					<li><a href="http://mp.soqi.cn/mpPersonal/accSys.xhtml"><i class="iconfont i-wallet"></i>我的钱包</a></li>
					
					<li><a href="http://mp.soqi.cn/vd/tooneclickpay.xhtml"><i class="iconfont i-pay"></i>一键支付</a></li>
					
					<li><a href="http://mp.soqi.cn/vip/tominishopfunction.xhtml?type=1"><i class="iconfont i-shop"></i>我的V店</a></li>
					
					<li><a href="http://mp.soqi.cn/vip/findCPs.xhtml"><i class="iconfont i-wei"></i>微单页</a></li>
					
					<li><a href="http://mp.soqi.cn/vip/findMPMLs.xhtml"><i class="iconfont i-wlink"></i>微链接</a></li>
-->					
					<li>
					<!--a href="http://mp.soqi.cn/mpServiceServices/installUM.xhtml"-->
					<a href="{:U('Admin/Index/index')}">
					<i class="iconfont i-set"></i>设置</a>
					</li>
					
					<li>
					<a href="{:U('Admin/Index/index')}">
					<i class="iconfont i-more"></i>更多</a></li>
					
					
				</ul>
			</div>
			
			<div class="m-side-ft">
				<a href="" class="iconfont i-search">企业搜索</a>
				<a href="<?=yii\helpers\Url::to(['vcards/logout'], true)?>" class="iconfont i-out">退出</a>
			</div>
		
</aside>