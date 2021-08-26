/* Author: 

*/

openElement_menu("enseignant");
			function openElement_menu(eltName) {
				var i;
				var x = document.getElementsByClassName("element_menu");
				for ( i = 0; i < x.length; i++) {
					x[i].style.display = "none";
				}
				document.getElementById(etlName).style.display = "block";
			}





















