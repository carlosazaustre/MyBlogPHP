// Documento JavaScript
// Esta función cargará las paginas
function call (url, id_contenedor)
{
    var pagina_requerida = false;
    if (window.XMLHttpRequest){
        // Si es Mozilla, Safari etc
        pagina_requerida = new XMLHttpRequest ();
    } 
	 else if (window.ActiveXObject){
        // pero si es IE
        try 
        {
            pagina_requerida = new ActiveXObject ("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            // en caso que sea una versión antigua
            try
            {
                pagina_requerida = new ActiveXObject ("Microsoft.XMLHTTP");
            }
            catch (e) {}
        }
    } 
    else return false;
    
	 pagina_requerida.onreadystatechange = function (){
        // función de respuesta
        cargarpagina (pagina_requerida, id_contenedor);
    }
    pagina_requerida.open ('GET', url, true); // asignamos los métodos open y send
    pagina_requerida.send (null);
}

// todo es correcto y ha llegado el momento de poner la información requerida
// en su sitio en la pagina xhtml
function cargarpagina (pagina_requerida, id_contenedor)
{
    if (pagina_requerida.readyState == 4 && (pagina_requerida.status == 200 || window.location.href.indexOf ("http") == - 1))
		document.getElementById (id_contenedor).innerHTML = pagina_requerida.responseText;
}

// función para abrir ventanas emergentes al pinchar en un enlace (Comentarios)
function ventanaSecundaria (URL){
   window.open(URL,"Comentarios","width=370,height=500,scrollbars=YES,resizable=NO,status=NO")
} 