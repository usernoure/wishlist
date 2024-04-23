var id;
var acheteEtat;

function creerRequete()
{
    try
    {
        requete = new XMLHttpRequest();
    } 
    catch (essaimicrosoft)
    {
        try
        {
            requete = new ActiveXObject("Msxm12.XMLHTTP");
        } 
        catch (autremicrosoft)
        {
            try
            {
                requete = new ActiveXObject("Microsoft.XMLHTTP");
            } 
            catch (echec)
            {
                requete = null;
            }
        }
    }
    if (requete === null)
    alert ("impossible de créer l'objet requête");
}

function achete(idCheckbox, identifiant){
    id = idCheckbox;
    if (document.getElementById(id).checked === true){
        acheteEtat = 1;
    }
    if (document.getElementById(id).checked === false){
        acheteEtat = 0;
    }
    
    creerRequete();
    var url = "ajax/achete-Ajax.php?id="+id+"&value="+acheteEtat+"&identifiant="+identifiant;
    requete.open("GET", url, true);
    requete.onreadystatechange = actualiserPage;
    requete.send(null);
}


function actualiserPage(){
    var checkboxEtat = document.getElementById(id).checked;
    if (requete.readyState === 4){
        if (acheteEtat === 1){
            if (checkboxEtat === true){
                if (!document.getElementById("span"+id)){
                    console.log("Acheté");
                    var spanCheckbox = document.createElement("SPAN");
                    spanCheckbox.setAttribute("id", "span"+id);
                    spanCheckbox.innerHTML = "Acheté";
                    document.getElementById(id).after(spanCheckbox);
                }
            }
        }
        if (acheteEtat === 0){
            if(checkboxEtat === false){
                if (document.getElementById("span"+id)){
                    document.getElementById("span"+id).remove(this);
                }
            }
        }
    }
}