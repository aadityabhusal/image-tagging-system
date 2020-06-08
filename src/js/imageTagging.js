const imageBox = document.getElementById('tag-image-box');
const image = document.getElementById('tag-image');
const tagTextBox = document.getElementById('tagTextBox');
const inputField = document.getElementById('tagText');
const suggestions = document.getElementById('tagSuggestions');
const suggestionsList = document.getElementById('tagSuggestionsList');
const tagCloseX = document.getElementsByClassName('tag-close');
let tagX;
let tagY;
let XHR;

document.addEventListener('DOMContentLoaded',setInit);

function setInit(){
	
	document.getElementById('outside-layer').addEventListener('click',function(){
		tagTextBox.style.display = 'none';
		inputField.value = '';
	});

	document.getElementById('tagText').addEventListener('keyup',function(){
		getListItems();
	});

	image.addEventListener('click',inputDisplay);
	showTags();
}

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
	
	XHR.open('POST','./src/modules/'+fileName+'.php',true);
	XHR.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	XHR.send(parameters);

	return XHR;
}

function getListItems(){
	items = createXHR('itemName=' + document.getElementById('tagText').value, 'getListItems');

	items.onreadystatechange = function(){
		if(items.readyState==4 && items.status==200){
			suggestionsList.innerHTML = items.responseText;
		}
	}
}

function setTag(elems){
	tagTextBox.style.display = 'none';
	inputField.value = '';

	tags = createXHR('tagId=' + elems.getAttribute('data-itemid') +'&imageId='+image.getAttribute('data-imageId') + '&tagX='+(tagX-40)+'&tagY='+(tagY-40), 'setTag');

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