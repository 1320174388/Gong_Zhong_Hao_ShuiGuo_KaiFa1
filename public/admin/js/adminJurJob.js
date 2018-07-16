/**
 * 版权声明 :  地老天荒科技有限公司
 * 文件名称 :  adminJurJob.js    
 * 创 建 者   :  Cheng Tao
 * 创建日期 :  2018/07/06 10:19
 * 文件描述 :  公众号web页面后台职位权限js文件
 * 历史记录 :  ----------------------- 
 */
//头部日期
var time = new Date();
var M = time.getMonth()+1;
var D = time.getDate();
var X = time.getDay();
var week = ['日','一','二','三','四','五','六'];
var timeShow = M+'月'+D+'日&ensp;星期'+week[X];
var timeWrap = document.getElementById('time-wrap');
timeWrap.innerHTML = timeShow;
//选项卡部分js代码
var idCard = document.getElementsByClassName("id-card");
var content = document.getElementsByClassName("content-wrap");
for(let i = 0; i < idCard.length; i++) {
	idCard[i].onclick = function() {
		for(var j = 0; j < content.length; j++) {
			content[j].style.display = "none";
			idCard[j].style.fontSize = 0.6 + "rem";
			idCard[j].style.backgroundColor = "#4D4F66";
		}
		idCard[i].style.backgroundColor = "#383f5a";
		idCard[i].style.fontSize = 0.75 + "rem";
		content[i].style.display = "block";
	}
}
//管理页编辑js代码
var jurBtnChoose = document.getElementsByClassName("jur-btn");
var editBtnFooter = document.getElementsByClassName("edit-btn-footer");
for(let i = 0; i < jurBtnChoose.length; i++) {
	jurBtnChoose[i].style.borderColor = "white";
	jurBtnChoose[i].onclick = function() {
		if(jurBtnChoose[i].style.borderColor == "white"){
			jurBtnChoose[i].style.borderColor = "red";
		}else{
			jurBtnChoose[i].style.borderColor = "white";
		}
	}
};

/*
 *  名      称:  alertHide()
 *  功      能:  隐藏对象
 *  输      入:  需要隐藏的对象的id值
 *  输      出:  ---------------
 *  创      建:  2018/07/09
 */
function alertHide(id){
	document.getElementById(id).style.display = "none";
};
/*
 *  名      称:  alertHide()
 *  功      能:  显示对象
 *  输      入:  需要隐藏的对象的id值
 *  输      出:  ---------------
 *  创      建:  2018/07/09
 */
function alertShow(id) {
	document.getElementById(id).style.display = "block";
};