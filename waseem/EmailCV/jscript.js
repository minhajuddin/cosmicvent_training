/*
 * File:	jscript.js
 * Author:	AbdulSattar (http://isattar.com)
 * Description: Contains all the JavaScript that is required by this theme. Based on jQuery.
 */

$(function() {
	//$("#sidebar").css("height") > $("#content").css("height") ? $("#content").height($("#sidebar").css("height")) : $("#sidebar").height($("#content").css("height"));
	$("tr:even").addClass("alt");
	$("#templates").change(function(){
		var name = $("#templates").val();
		$.get("Core/Ajax/GetTemplate.php?name=" + name ,null,function(data){
			$("#message").html(data);
		});
	});
	$("#addUser").click(function() {
		var userName = $("#userName").val();
		var userEmail = $("#userEmail").val();
		$.get("Core/Ajax/AddUser.php?name=" + userName + "&email=" + userEmail ,null,function(data){
			alert(data);
		});
	});
	$("#saveTemplate").click(function(){
		var name = $("#templateName").val();
		var message = $("#message").val();
		$.get("Core/Ajax/SaveTemplate.php?name=" + name + "&message=" + message, null, function(data){
			alert(data);
		});
	});
});