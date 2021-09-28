window.onload = function() { myFunction(); }
function myFunction(){
    var jenisRoast = document.getElementbyId("jenisRoast");
    var jenisGrind = document.getElementbyId("jenisGrind");
    var btnCart = document.getElementById("buttonCart");
    jenisRoast.addEventListener("change", function(){
        if(jenisRoast.value == "haha"){
            var ringan = ["Pemeriksaan lampu", "Pemeriksaan kelayakan ban", "Pemeriksaan roda", "Pemeriksaan rem", "Pemeriksaan oli", "Pemeriksaan busi", "Penyetelan gas", "Pemeriksaan rantai", "Pemeriksaan oli gear", "Pemeriksaan kopling"];
			for(var i=0;i<ringan.length;i++){
				var tambahOptionRingan = document.createElement("option");
				var textNodeRingan = document.createTextNode(ringan[i]);
				tambahOptionRingan.appendChild(textNodeRingan);
				document.getElementById("jenisGrind").appendChild(tambahOptionRingan);
			}
        }else{
            
        }
    });
    
}

