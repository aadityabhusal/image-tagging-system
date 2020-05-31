var imageBox = document.getElementById('tag-image-box');
var image = document.getElementById('tag-image');
var tagTextBox = document.getElementById('tagTextBox');
var inputField = document.getElementById('tagText');
var suggestions = document.getElementById('tagSuggestions');
var suggestionsList = document.getElementById('tagSuggestionsList');
var tagCloseX = document.getElementsByClassName('tag-close');
var tagX;
var tagY;

document.getElementById('outside-layer').addEventListener('click',function(){
	tagTextBox.style.display = 'none';
	inputField.value = '';
});

document.addEventListener('DOMContentLoaded',showTags);

image.addEventListener('click',inputDisplay);

// inputField.addEventListener('focusout', imageTag);

function inputDisplay(e){
	tagX = e.pageX - imageBox.offsetLeft;
	tagY = e.pageY - imageBox.offsetTop;
	tagTextBox.style.top = tagY + 'px';
	tagTextBox.style.left = tagX + 'px';
	tagTextBox.style.display = 'block';
	inputField.focus();
}


function createXHR(parameters,fileName){
	if(window.XMLHttpRequest){
		XHR = new XMLHttpRequest();
	}else{
		XHR = new ActiveXObject('Microsoft.XMLHTTP');
	}
	
	XHR.open('POST','modules/'+fileName+'.php',true);
	XHR.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	XHR.send(parameters);

	return XHR;
}

function getUsers(){
	users = createXHR('userName=' + document.getElementById('tagText').value, 'getUsers');

	users.onreadystatechange = function(){
		if(users.readyState==4 && users.status==200){
			suggestionsList.innerHTML = users.responseText;
		}
	}
}

function setTag(elems){
	tagTextBox.style.display = 'none';
	inputField.value = '';

	tags = createXHR('tagId=' + elems.getAttribute('data-userid') +'&imageId='+image.getAttribute('data-imageId') + '&tagX='+(tagX-40)+'&tagY='+(tagY-40), 'setTag');

	tags.onreadystatechange = function(){
		if(tags.readyState==4 && tags.status==200){
			showTags();
		}
	}
}

function showTags(){
	showT = createXHR('imgId=' + image.getAttribute('data-imageId'), 'showTags');

	showT.onreadystatechange = function(){
		if(showT.readyState==4 && showT.status==200){
			document.getElementById('tagList').innerHTML = showT.responseText;
		}
	}	
}

function removeTag(emmt){
	remTag = createXHR('tagId=' + emmt.getAttribute('data-tagid'), 'removeTag');

	remTag.onreadystatechange = function(){
		if(remTag.readyState==4 && remTag.status==200){
			showTags();
		}
	}
}