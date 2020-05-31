var image = document.getElementsByClassName('tag-image');
var tagCloseX = document.getElementsByClassName('tag-close');
var inputField = document.getElementById('tagText');
var tagX;
var tagY;
var currentElem;

function deleteTag(){
	for(var k = 0; k < tagCloseX.length; k++){
		tagCloseX[k].addEventListener('click', function(){
			this.parentElement.parentElement.remove();
		});	
	}
}

for(var i = 0; i < image.length; i++){
	image[i].addEventListener('click',inputDisplay);
}

inputField.addEventListener('keypress',function(e){
	if(e.keyCode == 13){
		inputField.addEventListener('keyup', imageTag);
	}else{
		inputField.removeEventListener('keyup', imageTag);
	}
});

inputField.addEventListener('focusout', imageTag);

function imageTag(){
	if(this.value.trim() != ''){
		var tagBox = document.createElement('div');
		var tagText = document.createElement('div');
		var tagClose = document.createElement('div');
		tagText.classList.add('tag');
		tagBox.classList.add('tag-box');
		tagClose.classList.add('tag-close');
		tagBox.style.top = tagY - 40 + 'px';
		tagBox.style.left = tagX - 40 + 'px';
		tagText.innerHTML = this.value;
		tagClose.innerHTML = 'x';
		tagText.appendChild(tagClose);
		tagBox.appendChild(tagText);
		currentElem.appendChild(tagBox);
	}
	this.style.display = 'none';
	this.value = '';
	deleteTag();
}

function inputDisplay(e){
	currentElem = this;
	var imageTop = this.offsetTop;
	var imageLeft = this.offsetLeft;
	tagX = e.pageX - imageLeft;
	tagY = e.pageY - imageTop;
	inputField.style.top = tagY + 'px';
	inputField.style.left = tagX + 'px';
	inputField.style.display = 'block';
	inputField.focus();
}
