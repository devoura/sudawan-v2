//js by Nina Teglverket

function jumpToTabs() {
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
	document.getElementById('bottom-image').scrollIntoView();
	}
};