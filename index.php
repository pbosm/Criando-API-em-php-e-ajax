<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP com Ajax</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="scripts.js"></script>
</head>
<body>

<script type="text/html" id="templateRowEditClient">
     <tr data-table-order="{{order}}">
          <td data-column="cliente">{{cliente}}</td>
          <td data-column="cidade">{{cidade}}</td>
          <td data-column="email">{{email}}</td>
     </tr>
</script>

<script type="text/html" id="templateEditClient">
    <form class="text-center" id="editClient">
          <span class="text center">Nome do Cliente: </span><br>
               <input type="text" name="txtClienteEdit" id="cliente"><br>
          <span>Cidade: </span><br>
               <input type="text" name="txtCidadeEdit" id="cidade"><br>
          <span>Email: </span><br>
               <input type="email" name="txtEmailEdit" id="email"><br><br>
          <button id="editar">Editar</button> 
    </form>
</script>

<script type="text/html" id="templateRowSelectClient">
     <tr data-table-order="{{order}}">
          <td data-column="cliente">{{cliente}}</td>
          <td data-column="cidade">{{cidade}}</td>
          <td data-column="email">{{email}}</td>
          <td data-column="edit" onclick="editClient('{{idedit}}', '{{clienteedit}}', '{{cidadeedit}}', '{{emailedit}}')" class='btn btn-primary'>Editar</td>
          <td data-column="delete" onclick="deleteClient('{{iddelete}}', '{{clientedelete}}')" class='btn btn-danger'>Excluir</td>
     </tr>
</script>

<script type="text/html" id="templateSelectClient">
     <div class="row ml-0">
		<div class="col-12">
               <div class="table-responsive">
                    <table class="table w-100 text-center table-striped clients">
                         <thead>
                              <tr>
                                   <th>
                                        Cliente
                                   </th>
                                   <th>
                                        Cidade
                                   <th>
                                        Email
                                   </th>
                                   <th>
                                        Opções
                                   </th>
                              </tr>
                         </thead>
                         <tbody>
                         </tbody>
                    </table>
               </div>
		</div>
	</div>
</script>

<div class="fp-modal" show="false">
    <div class="b-modal">
        <div class="h-modal text-center">
            <span class="h-modal-title">
                {{modalTitle}}
            </span>
            <button class="x-modal">&#x2715;</button>
        </div>
        <div class="c-modal">
        </div>
    </div>
</div>

<div class="text-center mt-4">
     <form class="text-center" id="formCreate">
          <div class="form-group">
               <label for="txtCliente">Nome do Cliente: </label>
               <input type="text" id="txtCliente" name="txtCliente">
          </div>
          <div class="form-group">
               <label for="txtCliente">Cidade: </label>
               <input type="text" id="txtCidade" name="txtCidade">
          </div>
          <div class="form-group">
               <label for="txtCliente">Email: </label>
               <input type="email" id="txtEmail" name="txtEmail">
          </div>
          <button id="salvar" type="submit">Cadastrar</button> 
          <button id="select" type="button" onclick="showClients()">Ver usuários</button>
          <br><div id="msg" style="margin-top: 10px;"></div>    
    </form>
</div>    

    <script>
	    createClient();
    </script>

</body>
</html>