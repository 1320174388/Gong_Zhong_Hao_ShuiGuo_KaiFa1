/**
 * 版权声明 :  地老天荒科技有限公司
 * 文件名称 :  storeManage.js    
 * 创 建 者   :  Cheng Tao
 * 创建日期 :  2018/07/13 17:28
 * 文件描述 :  公众号web页面店铺管理js文件
 * 历史记录 :  ----------------------- 
 */
//时间日期
var time = new Date();
var Y = time.getFullYear();
var M = time.getMonth() + 1;
var D = time.getDate();
var H = time.getHours();
var m = time.getMinutes();
var S = time.getSeconds();
if(m < 10) {
	m = '0' + m;
};
if(S < 10) {
	S = '0' + S;
}
var timeShow = Y + '-' + M + '-' + D;
var timeDetail = H + ':' + m + ':' + S;
var timeWrap = document.getElementById('time-wrap');
var timeTwo = document.getElementsByClassName('time-two');
timeWrap.innerHTML = timeShow;
for(var i = 0; i < timeTwo.length; i++) {
	timeTwo[i].innerHTML = timeShow + '&ensp;' + timeDetail;
}

//选项卡部分js代码
var idCard = document.getElementsByClassName("id-card");
var content = document.getElementsByClassName("content-wrap");
var orderType = document.getElementById('order-type');

for(let i = 0; i < idCard.length; i++) {
	idCard[i].onclick = function() {
		if(i == idCard.length - 1) {
			for(var j = 0; j < content.length; j++) {
				content[j].style.display = "none";
				idCard[j].style.fontSize = 0.6 + "rem";
				idCard[j].style.backgroundColor = "#4D4F66";

			}
			idCard[i].style.backgroundColor = "#383f5a";
			idCard[i].style.fontSize = 0.75 + "rem";
			content[i].style.display = "block";
			//订单类型管理下拉框
			if(orderType.style.display == 'block'){
				orderType.style.display = 'none';
			}else{
				orderType.style.display = 'block';
			}
			
		} else {
			for(var j = 0; j < content.length; j++) {
				content[j].style.display = "none";
				idCard[j].style.fontSize = 0.6 + "rem";
				idCard[j].style.backgroundColor = "#4D4F66";

			}
			idCard[i].style.backgroundColor = "#383f5a";
			idCard[i].style.fontSize = 0.75 + "rem";
			content[i].style.display = "block";
			orderType.style.display = 'none';
		}

	}
}
