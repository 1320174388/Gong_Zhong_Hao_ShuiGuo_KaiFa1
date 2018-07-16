/**
 * 版权声明 :  地老天荒科技有限公司
 * 文件名称 :  platformManage.js    
 * 创 建 者   :  Cheng Tao
 * 创建日期 :  2018/07/13 11:59
 * 文件描述 :  公众号web页面平台管理js文件
 * 历史记录 :  ----------------------- 
 */
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