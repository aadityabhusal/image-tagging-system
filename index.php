<!DOCTYPE html>
<html>
<head>
	<title>Image Tagging</title>
	<link rel="stylesheet" type="text/css" href="src/css/imageTagging.css">
</head>
<body>
	<div id="outside-layer"></div>
	<div id="tag-image-box">
		<img id="tag-image" src="images/image.jpg" data-imageid='1'>
		<div id="tagTextBox">
			<input id="tagText" type="text" name="tagText" placeholder="Enter a name for tag">
			<div id="tagSuggestions">
				<ul id="tagSuggestionsList"></ul>
			</div>
		</div>
		<div id="tagList"></div>
	</div>
	<script type="text/javascript" src="src/js/imageTagging.js"></script>
</body>
</html>