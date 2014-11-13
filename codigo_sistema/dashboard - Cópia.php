<?php
include 'top.php'; 
?>

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->


        <div class="row">

            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Configuração
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">                        
                         
                            
                            <div class="form-group">
                                <input type="email" class="form-control" id="inputIP" placeholder="Endereço IP" value="http://192.168.0.177">
                            </div>                            
                            <button id="BTConectar" onclick="conectar();" class="btn btn-success">Conectar</button>                        
                                    
                    </div>
                </section>
            </div>          

            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Sensores
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        
                        <div class="col-md-3">
                            <div class="mini-stat clearfix">
                                <span id="item1" class="mini-stat-icon yellow-b"><i class="fa fa-upload"></i></span>
                                <div class="mini-stat-info">
                                    <span id="temperatura1">0</span>
                                    Temperatura 1
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mini-stat clearfix">
                                <span class="mini-stat-icon tar"><i class="fa fa-upload"></i></span>
                                <div id="item2" class="mini-stat-info">
                                    <span id="temperatura2">0</span>                                    
                                    Temperatura 2
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mini-stat clearfix">
                                <span id="item3" class="mini-stat-icon pink"><i class="fa fa-certificate"></i></span>
                                <div class="mini-stat-info">
                                    <span id="luminosidade">0</span>
                                    Luminosidade
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mini-stat clearfix">
                                <span id="item4" class="mini-stat-icon green"><i class="fa fa-compress"></i></span>
                                <div class="mini-stat-info">
                                    <span id="pressao">0</span>
                                    Pressão
                                </div>
                            </div>
                        </div>


                    </div>
                </section>
            </div>


            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Entradas
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="col-md-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="top-stats-panel box_entrada">
                                <div class="gauge-canvas ">
                                    <h4 class="widget-h">Entrada 1</h4>                                    
                                </div>
                                <button type="button" class="btn btn-danger btn-lg btn-block" id="entrada1">Desligado</button>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-md-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="top-stats-panel box_entrada">
                                <div class="gauge-canvas">
                                    <h4 class="widget-h">Entrada 2</h4>
                                </div>
                                <button type="button" class="btn btn-danger btn-lg btn-block" id="entrada2">Desligado</button>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-md-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="top-stats-panel box_entrada">
                                <div class="gauge-canvas">
                                    <h4 class="widget-h">Entrada 3</h4>
                                </div>
                                <button type="button" class="btn btn-danger btn-lg btn-block" id="entrada3">Desligado</button>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-md-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="top-stats-panel box_entrada">
                                <div class="gauge-canvas">
                                    <h4 class="widget-h">Entrada 4</h4>
                                </div>
                                <button type="button" class="btn btn-danger btn-lg btn-block" id="entrada4">Desligado</button>
                            </div>
                        </div>
                    </section>
                </div> 
                    </div>
                </section>
            </div>                     

            


            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Saidas
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="col-md-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="top-stats-panel box_entrada">
                                <div class="gauge-canvas ">
                                    <h4 class="widget-h">Saída 1</h4>                                    
                                </div>
                                <button type="button" onclick="postParemeter('a');" class="btn btn-info btn-lg btn-block">Ligar|Desligar</button>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-md-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="top-stats-panel box_entrada">
                                <div class="gauge-canvas">
                                    <h4 class="widget-h">Saída 2</h4>
                                </div>
                                <button type="button" onclick="postParemeter('b');" class="btn btn-info btn-lg btn-block">Ligar|Desligar</button>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-md-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="top-stats-panel box_entrada">
                                <div class="gauge-canvas">
                                    <h4 class="widget-h">Saída 3</h4>
                                </div>
                                <button type="button" onclick="postParemeter('c');" class="btn btn-info btn-lg btn-block">Ligar|Desligar</button>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-md-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="top-stats-panel box_entrada">
                                <div class="gauge-canvas">
                                    <h4 class="widget-h">Saída 4</h4>
                                </div>
                                <button type="button" onclick="postParemeter('d');" class="btn btn-info btn-lg btn-block">Ligar|Desligar</button>
                            </div>
                        </div>
                    </section>
                </div> 
                    </div>
                </section>
            </div>
        </div>



        <!-- page end-->
        </section>
    </section>
    <!--main content end-->

<?php
include 'footer.php'; 
?>

<script>
    //var endereco = 'http://192.168.0.177';
    var endereco = "";

    var estadoSaida1 = 0;
    var estadoSaida2 = 0;
    var estadoSaida3 = 0;
    var estadoSaida4 = 0;

    var conectado = false;
            
    setInterval(loadValores, 4000);
    
    function conectar(){
        
        if(conectado == false){
            console.log("conectado");       
            conectado = true;            
            endereco = document.getElementById("inputIP").value;
            document.getElementById("BTConectar").innerHTML="Desconectar"; 
        }   
        else
        {
            console.log("desconectado");    
            conectado = false;
            document.getElementById("BTConectar").innerHTML="Conectar";
        }

    }

    function desabilitarItens(){
        document.getElementById(id).className = "mini-stat-icon";
    }

    function loadValores(){
        if(conectado ==true){                   
            $.ajax({
                url: endereco,

                complete: function(res){
                    try {
                        var meuJSON = JSON.parse(res.responseText);
                        console.log(meuJSON); 

                        $.each(meuJSON, function(i, valor){ 
                            if(i == "entrada0"){                                
                                checkValor("entrada1", valor);                            
                            }                            

                            else if(i == "entrada1"){
                                checkValor("entrada2", valor); 
                            }
                            else if(i == "entrada2"){
                                checkValor("entrada3", valor); 
                            }

                            else if(i == "entrada3"){
                                checkValor("entrada4", valor); 
                            }

                            else if(i == "temperatura1"){
                                document.getElementById("temperatura1").innerHTML = valor;
                            }

                            else if(i == "temperatura2"){
                                document.getElementById("temperatura2").innerHTML = valor;
                            }

                            else if(i == "luminosidade"){
                                document.getElementById("luminosidade").innerHTML = valor;
                            }

                            else if(i == "pressao"){
                                document.getElementById("pressao").innerHTML = valor;
                            };
                        })
                    }catch(err) {
                        console.log("erro" + err); 
                    }
                }

                
            });  
        }
    }  

    function checkValor(id, valor){    
      if(valor == 0){
        document.getElementById(id).innerHTML = "Desligado";
        document.getElementById(id).className = "btn btn-danger btn-lg btn-block";
      }else{
        document.getElementById(id).innerHTML = "Ligado";
        document.getElementById(id).className = "btn btn-success btn-lg btn-block";
      } 
    }

     function postParemeter(saida){
        if(conectado ==true){ 
            var enderecoPost;

            if(saida == "a"){
                if(estadoSaida1 == 0){estadoSaida1 = 1;}
                else{estadoSaida1 = 0;};
            }

            if(saida == "b"){
                if(estadoSaida2 == 0){estadoSaida2 = 1;}
                else{estadoSaida2 = 0;};
            }

            if(saida == "c"){
                if(estadoSaida3 == 0){estadoSaida3 = 1;}
                else{estadoSaida3 = 0;};
            }

            if(saida == "d"){
                if(estadoSaida4 == 0){estadoSaida4 = 1;}
                else{estadoSaida4 = 0;};
            }

            enderecoPost = endereco + "?";
            enderecoPost +="a" + "=" + estadoSaida1;
            enderecoPost +="&";
            enderecoPost +="b" + "=" + estadoSaida2;
            enderecoPost +="&";
            enderecoPost +="c" + "=" + estadoSaida3;
            enderecoPost +="&";
            enderecoPost +="d" + "=" + estadoSaida4;

            console.log(enderecoPost);
            $.post(enderecoPost, function(returnedData){console.log("enviado");});
        }
        else{
            console.log("Necessáro Conectar");
        }
    }      

</script>