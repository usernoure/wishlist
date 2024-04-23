//Initialisation des variabales globales
var requete = null;
var retour = document.getElementById("load");
var testEmail = false;
var testNom = false;
var testPrenom = false;
var testDate = false;
var testMDP = 0;
var bool = false;
var regexEmail = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;

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

function getRecherche(){
    creerRequete();
    var email = document.getElementById("email").value;
    var url = "ajax/getIdentifiant-Ajax.php?Value="+email;
    requete.open("GET", url, true);
    requete.onreadystatechange = actualiserPage;
    requete.send(null);
}


function testALL(){
    verifNom();
    verifPrenom(); 
    verifDateNaissance();
    verifMdp();
    verifEmail();
    if(testEmail === true && testNom === true && testPrenom === true && testDate === true && testMDP === 1){
        document.getElementById("submit").disabled = false;
    }else{
        document.getElementById("submit").disabled = true;
    }
}

function verifEmail(){    
    var email = document.getElementById('email').value;
    if(email.match(regexEmail)){
        testEmail = true;
    }else{
        testEmail = false;
    }   
}


function verifNom(){
    var regexNom = /^[A-Za-z][a-z-éèêëç äà]*$/;
    var nom = document.getElementById("nom").value;
    if(nom.match(regexNom)){
        testNom = true;
    }else{
        testNom = false;
    }
}
function verifPrenom(){
    var regexNom = /^[A-Za-z][a-z-éèêëç äà]*$/;
    var nom = document.getElementById("prenom").value;
    if(nom.match(regexNom)){
        testPrenom = true;
    }else{
        testPrenom = false;
    }        
}

function verifDateNaissance(){
    var jour = document.getElementById("jour").value;
    var mois = document.getElementById("mois").value;
    var annee = document.getElementById("annee").value;
    var inputjour = document.getElementById("jour");
    var inputmois = document.getElementById("mois");
    var inputannee = document.getElementById("annee");
    
    
    if(annee === "" || mois === "" || jour === ""){
        testDate = false;
    }else{
        if(getNbJoursMois(mois, annee) >= jour){
            inputjour.style.borderColor = "lightgreen";
            inputmois.style.borderColor = "lightgreen";
            inputannee.style.borderColor = "lightgreen";
            testDate = true;
        }else{
            inputjour.style.borderColor = "red";
            inputmois.style.borderColor = "red";
            inputannee.style.borderColor = "red";
            testDate = false;
        }
    }   
}

function getNbJoursMois(mois, annee) {
    var lgMois = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    if ((annee%4 === 0 && annee%100 !== 0) || annee%400 === 0){
        lgMois[1] += 1;  
    }      
    return lgMois[mois-1]; // 0 < mois <11
}

function verifMdp(){
    var color1 = document.getElementById("mdp1");
    var color2 = document.getElementById("mdp2");
    var mdp1 = document.getElementById("mdp1").value;
    var mdp2 = document.getElementById("mdp2").value;
    var divmdp = document.getElementById('divmdp');
    var spanmdp = document.createElement("SPAN");
    spanmdp.setAttribute("id","spanmdp");
    var spanvalue = document.getElementById("spanmdp");
    if(bool === false){
        divmdp.appendChild(spanmdp);
        bool = true;
    }
    if(mdp1 !== "" && mdp2 !== ""){    
        if(mdp1 === mdp2){
            testMDP = 1;
            spanvalue.innerText = " ";
            color1.style.borderColor = "lightgreen";
            color2.style.borderColor = "lightgreen";
        }else{
            testMDP = 0;
            spanvalue.innerText = "Les mots de passe doivent correspondre";
            color1.style.borderColor = "red";
            color2.style.borderColor = "red";
        }      
    }   
}

function changeMdp(){
    var img = document.getElementById('img');
    var mdp1 = document.getElementById('mdp1');
    var mdp2 = document.getElementById('mdp2');
    if(img.src === "http://localhost/ListeCadeau/Images/oeilferme.png"){
        img.src = "http://localhost/ListeCadeau/Images/oeilouvert.png";
        mdp1.type = "text";
        mdp2.type = "text";
        console.log("1");
    }else{
        img.src = "http://localhost/ListeCadeau/Images/oeilferme.png";
        mdp1.type = "password";
        mdp2.type = "password";
        console.log("2");
    }
}


function actualiserPage(){	
    if (requete.readyState === 4){
        var typeEmail = document.getElementById('email');
        var div = document.getElementById('divemail');
        var valueEmail = document.getElementById('email').value;
        var email = requete.responseText;
        var span = document.createElement("SPAN");
        span.setAttribute("id","span");
        div.appendChild(span); 
        var span2 = document.getElementById("span");
        var bool2 = true;       
        if(email === "" && valueEmail !== "" && valueEmail.match(regexEmail)){
            typeEmail.style.borderColor = "lightgreen";
            span2.innerHTML = "";
            testEmail = true;
        }else{
            console.log(email);
            console.log("email");
            testEmail = false;
            typeEmail.style.borderColor = "red";
            if(valueEmail === ""){
                span2.innerText = "L'email ne doit pas être vide";                             
            }else{                               
                if(!valueEmail.match(regexEmail)){
                    span2.innerText = "L'email incorrect";                                                 
                }else{
                    if(email !== ""){
                        span2.innerText = "L'email est déjà pris";                                                  
                    } 
                }
            }
            
        }
        testALL();  
    }      
}

function testNomListe(){
    var nomliste = document.getElementById("nomliste").value;
    var regex = /[A-Za-z0-9éèçàêëï_[\]-]/;
    var submit = document.getElementById('submit');
    if(nomliste.match(regex)){
        submit.disabled = false;
    }else{
        submit.disabled = true;
    }
}
