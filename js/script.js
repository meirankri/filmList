
//script qui recupere le message get de l'url ou il se lance
//et avec le alert on peut afficher $_GET['msg'] qui affichera
//le message contenue dans msg.


var $_GET = {};

document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
    function decode(s) {
        return decodeURIComponent(s.split("+").join(" "));
    }

    $_GET[decode(arguments[1])] = decode(arguments[2]);
});

if ($_GET["message"]) {
	alert($_GET["message"]);
	
}



	

		/*function qui se lance au click, puis récupère les 
		valeur des input et les envoie par ajax sur la page qui
		va afficher les requêtes selon les données de l'utilisateur
		*/
$('.ajax2').click(function(){
			if ($(".type").val() != 'selected') {
				var type = $(".type").val();
				}
			if	($(".country").val()!= 'selected'){
				var country = $(".country").val();
			}

			
			
			$.ajax({
				type: 'POST',
				url:"ajaxResult.php",
				data: {type:type, country:country},
				success: function(result){

					$('.result').html(result);
				}
			});
			return false;
		})


/* pareil que la function d'au dessus sauf que c'est pour la recherche par titre et description*/
$('.dyna').click(function(){
			research = $('input').val();
			$.ajax({
				type: 'POST',
				url: "researchByTitle.php",
				data: {research : research},
				success: function(result){

					$('.result').html(result);
				}
			});
			return false;
		})
