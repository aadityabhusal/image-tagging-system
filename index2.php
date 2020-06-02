<!DOCTYPE html>
<html>
<head>
	<title>Image Tagging</title>
	<link rel="stylesheet" type="text/css" href="src/css/imageTagging.css">
</head>
<body>
	<div id="outside-layer"></div>
	<div id="tag-image-box">
		<img id="tag-image" src="src/images/image2.jpg" data-imageid='2'>
		<div id="tagTextBox">
			<input id="tagText" type="text" name="tagText" placeholder="Enter a name for tag" onkeyup="getUsers()">
			<div id="tagSuggestions">
				<ul id="tagSuggestionsList"></ul>
			</div>
		</div>
		<div id="tagList"></div>
	</div>
	<script type="text/javascript" src="src/js/imageTagging.js"></script>
</body>
</html>