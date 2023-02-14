let msg = document.getElementById('msg'),
	alertD = document.getElementById('alert'),
	closeB = document.getElementById('close-btn');

console.log(msg,alertD,closeB);

function showAlert(param){
	let text = document.createTextNode(param)
	msg.appendChild(text);
	alertD.classList.add("show");
	alertD.classList.remove("hide");
	alertD.classList.add("showAlert");
	setTimeout(function(){
		alertD.classList.remove("show");
		alertD.classList.add("hide");
	},4000);
 
	closeB.click(function(){
	alertD.classList.remove("show");
	alertD.classList.add("hide");});
};