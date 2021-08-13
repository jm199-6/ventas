
function addFields(etiqueta, nombre, container){
		html = '<div class="input-group bottom items"><div class="input-group-prepend">';
		html +='<span class="input-group-text">'+etiqueta+'</span>';
		html +='</div>';
		html +='<input type="text" class="form-control" name="'+nombre+'[]" maxlength="75" />';
		html += '<div class="input-group-prepend"><button onclick="$(this).parents(';
		html +="'.items'";
		html +=').remove()" class="remove-btn btn btn-default text-danger"><span class="fa fa-trash"></span></button></div></div>';
        $("#"+container+"Fields").append(html);
    }
$(document).ready(function(){
	$("#idTda").on("change", function (){
		id = $("#idTda").val();
		getTda(host,id);
	});
	$("#ver1").click(function(){
		if($("#p1").attr("type")=="password"){
			$("#p1").attr("type","text");
			$("#icVer1").removeClass("fa-eye");
			$("#icVer1"). addClass("fa-eye-slash");
		}else{
			$("#p1").attr("type","password");
			$("#icVer1").removeClass("fa-eye-slash");
			$("#icVer1"). addClass("fa-eye");
		}
	});
	$("#rVer1").click(function(){
		if($("#rP1").attr("type")=="password"){
			$("#rP1").attr("type","text");
			$("#icRVer1").removeClass("fa-eye");
			$("#icRVer1"). addClass("fa-eye-slash");
		}else{
			$("#rP1").attr("type","password");
			$("#icRVer1").removeClass("fa-eye-slash");
			$("#icRVer1"). addClass("fa-eye");
		}
	});
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip();
	});
});

function setTtle(title){
  document.title = title;
}

function setGuion(type,id){
	// 1-dui, 2-telefono, 3-nit
	digits = 0;
	dNit=0;
	element = document.getElementById(id);
	valor=element.value;
	switch(type){
		case 1:
			digits = 8;
			break;
		case 2:
			digits = 4;
			break;
		case 3:
			dNit = {"d1":4,"d2":11,"d3":15};
			break;
	}
	if(valor.length == digits && !(digits==0)){
		element.value=valor+"-";
	}else if((valor.length == dNit.d1 || valor.length == dNit.d2 || valor.length == dNit.d3) && !(dNit==0)) {
		element.value=valor+"-";
	}
}
function setDuiC(){
	$("#duiC").val($("#duiA").val());
}
function getListCrg(url){
	$.ajax({
		type: "GET",
		url: "http://"+url+"/ventas/api/cargo.php",
		contentType: "application/json;charset=utf-8",
		dataType: "json",
		success: function (data){
			$.each(data,function (i, item){
				var option = "<option value='"+item.codigo+"'>"+item.nombre+"</option>";
				$("#idCrg").append(option);
			});
		},
		failure: function (data){
			console.log(data);
			alert(data.responseText);
		},
		error: function (data){
			console.log(data);
			alert(data.responseText);
		}
	});
}
function getListTda(url){
	$.ajax({
		type: "GET",
		url: "http://"+url+"/ventas/api/tienda.php",
		contentType: "application/json;charset=utf-8",
		dataType: "json",
		success: function(data) {
			$.each(data,function (i, item){
				var option = "<option value='"+item.codigo+"'>"+item.nombre+"</option>";
				$("#idTda").append(option);
			});
		},
		failure: function (data){
			console.log(data);
			alert(data.responseText);
		},
		error: function (data){
			console.log(data);
			alert(data.responseText);
		}
	});
}
function getTda(url,id){
	$.ajax({
		type: "GET",
		url: "http://"+url+"/ventas/api/tienda.php?id="+id,
		contentType: "application/json;charset=utf-8",
		dataType: "json",
		crossorigin: "anonymous",
		success: function(item) {
			//$.each(data,function (i, item){
			if(item.status == "ok"){
				$("#dirTda").val(item.direccion);
				$("#telTda").val(item.telefono);
			}else{
				$("#dirTda").val(item.status);
				$("#telTda").val(item.status);
			}
		},
		failure: function (data){
			console.log(data);
			alert(data.responseText);
		},
		error: function (data){
			console.log(data);
			alert(data.responseText);
		}
	});
}
function getListEmpresas(url){
	$.ajax({
		type: "GET",
		url: "http://"+url+"/ventas/api/empresa.php",
		contentType: "application/json; charset=utf-8",
		dataType: "json",
		success: function (data) {
			$.each(data,function (i, item){
				var option = "<option value='"+item.codigo+"'>"+item.nombreJ+"("+item.nombreC+")"+"</option>";
				$("#idEmp").append(option);
			});

		},
		failure: function (data){
			console.log(data);
			alert(data.responseText);
		},
		error: function (data){
			console.log(data);
			alert(data.responseText);
		}
	});
}
function disableTabById(id){
  $("#"+id+"-tab").removeClass("active");
  $("#"+id+"-tab").addClass("disabled");
	$("#"+id+"-tab > span").removeClass("badge-secondary");
  $("#"+id+"-tab > span").addClass("badge-primary");
  $("#"+id).removeClass("active show");
}
function activeTabById(id){

  $("#"+id+"-tab").addClass("active");
  $("#"+id+"-tab").removeClass("disabled");
  $("#"+id+"-tab > span").removeClass("badge-secondary");
  $("#"+id+"-tab > span").addClass("badge-primary");
  $("#"+id).addClass("show active");

}

function vPwd(id1, id2){
	valor="";
	if($("#"+id1).attr("type")=="password"){
		valor="text";
	}else{
		valor="password";
	}
	$("#"+id1).attr("type",valor);
	$("#"+id2).attr("type",valor);
	
}
