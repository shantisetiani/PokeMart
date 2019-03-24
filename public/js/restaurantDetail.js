var contact = document.getElementById('contactContent');
var menu = document.getElementById('menuContent');
var review = document.getElementById('reviewContent');

function showContact(){
	contact.style.display='';
	menu.style.display='none';
	review.style.display='none';
	contact.onclick();
}

function showMenu(){
	contact.style.display='none';
	menu.style.display='';
	review.style.display='none';
}

function showReview(){
	contact.style.display='none';
	menu.style.display='none';
	review.style.display='';
}