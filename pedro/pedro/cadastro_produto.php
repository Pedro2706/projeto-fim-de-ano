<?php
 include_once ( 'config.php' );

 se ( $_SERVER [ 'MÉTODO_DE_SOLUÇÃO' ] == 'POST' ) {

 // Função para upload de imagem (com tratamento de erros)
 function uploadImagem ( $imagem ) {
 $target_dir = "imagem/" ;
 $target_file = $target_dir . basename ( $imagem [ "nome" ]);

 se ( mover_arquivo_carregado ( $imagem [ "nome_tmp" ], $arquivo_destino )) {
 retornar $target_file ;
 } outro {
 echo "Erro ao fazer upload da imagem." ;
 retornar nulo ;
 }
 }

 // Recebe os dados do formulário
 $nome = $_POST [ 'nome' ];
 $editora = $_POST [ 'editora' ];
 $código = $_POST [ 'Preço' ];
 $ano_publicação = $_POST [ 'ano_publicação' ];
 $genero = $_POST [ 'genero' ];
 $imagem = $_FILES [ "imagem" ];

 // Carregar a imagem
 $imagem_path = nulo ;
 if ( isset ( $imagem ) && $imagem [ "erro" ] === 0 ) {
 $imagem_path = uploadImagem ( $imagem );
 se (! $imagem_path ) {
 $erros [] = "Erro ao enviar imagem." ;
 }
 }

 // Insira os dados na tabela
 $stmt = $conexao -> prepare ( " INSERT INTO mangas (nome, editora, codigo, ano_publicacao, genero, imagem) VALORES (?, ?, ?, ?, ?, ?) " );
 $stmt -> bind_param ( "ssssss" , $nome , $editora , $codigo , $ano_publicacao , $genero , $imagem_path ,);

 se ( $stmt -> executar ()) {
 echo "Novo mangá cadastrado com sucesso" ;
 } outro {
 echo "Erro ao cadastrar o manga: " . $stmt -> erro ;
 }

 $stmt -> fechar ();
 $conexao -> fechar ();
 }
 ? >


 <! DOCTYPE html >
 < html lang = "pt" >
 < cabeça >
 < meta charset = "UTF-8" >
 < meta http-equiv = "Compatível com X-UA" content = "IE=edge" >
 < meta name = "viewport" content = "largura=largura-do-dispositivo, escala-inicial=1.0" >
 < link rel = "folha de estilo" href = "cadastro.css" >
 < title > tela do produto </ title >
 < a href = "paginaprincipal.php" >< button > voltar </ button ></ a >< br >< br >
 </ cabeça >

 < corpo >
 < div id = "div1" >
 < h1 > Projeto A </ h1 >
 < h2 > produto </ h2 >

 < form action = "cadastro_produto.php" method = "post" enctype = "multipart/form-data" >
 < div class = "campo" >
 < label for = "nome" > Nome do Mangá: </ label >
 < input type = "text" id = "nome" name = "nome" placeholder = "Digite o nome da Pizza" obrigatório >
 </div>​​


 < div class = "campo" >
 < label for = "Preço" > Ano de Publicação: </ label >
 < input type = "Valor" id = "Preço" name = "Preço" obrigatório >
 </div>​​

 < div class = "campo" >
 < label for = "gênero" > gênero: </ label >
 < selecione id = "genero" nome = "genero" obrigatório >
 < opção valor = "drama" > drama </ opção >
 < option value = "açao" > ação </ option >
 < option value = "comedia" > comédia </ option >
 < opção valor = "terror" > terror </ opção >
 < opção valor = "romance" > romance </ opção >
 </ selecionar >
 </div>​​
 < div class = "campo" >
 < label for = "imagem" > Capa do Mangá (JPG, PNG): </ label >
 < tipo de entrada = "arquivo" id = "imagem" nome = "imagem" aceitar = "imagem/jpeg, imagem/png" >
 </div>​​

 < button type = "enviar" > Cadastrar </ button >
 </ formulário >

 </div>​​
 </ corpo >
 </ html >