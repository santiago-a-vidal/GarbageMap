<!-- Esta pagina junta los tpl en el llamado del index. este seria la primera vez que habre la pagina-->
<div id="page">
{if $opcion == "Ciudadano"}
    {include file='headerCiudadano.tpl'}
{else}
     {include file='headerCapataz.tpl'}
{/if}

 <div  id="conten"> <!-- en este div se iran cargando cada una de los tpl correspondientes a las funcionalidades -->
   {include file='inicio.tpl'}
 </div>
{include file='footer.tpl'}
</div>
