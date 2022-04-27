<?php 
    $this->layout = false;
?>
<!DOCTYPE HTML><html><head><title>Gerenciador Pericial API documentation</title><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="generator" content="https://github.com/raml2html/raml2html 7.6.0"><link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css"><script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script><script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script><script type="text/javascript">
      $(document).ready(function() {
  $('.page-header pre code, .top-resource-description pre code, .modal-body pre code').each(function(i, block) {
    hljs.highlightBlock(block);
  });

  $('[data-toggle]').click(function() {
    var selector = $(this).data('target') + ' pre code';
    $(selector).each(function(i, block) {
      hljs.highlightBlock(block);
    });
  });

  // open modal on hashes like #_action_get
  $(window).bind('hashchange', function(e) {
    var anchor_id = document.location.hash.substr(1); //strip #
    var element = $('#' + anchor_id);

    // do we have such element + is it a modal?  --> show it
    if (element.length && element.hasClass('modal')) {
      element.modal('show');
    }
  });

  // execute hashchange on first page load
  $(window).trigger('hashchange');

  // remove url fragment on modal hide
  $('.modal').on('hidden.bs.modal', function() {
    try {
      if (history && history.replaceState) {
          history.replaceState({}, '', '#');
      }
    } catch(e) {}
  });
});
    </script><style>
      .hljs {
  background: transparent;
}
.parent {
  color: #999;
}
.list-group-item > .badge {
  float: none;
  margin-right: 6px;
}
.panel-title > .methods {
  float: right;
}
.badge {
  border-radius: 0;
  text-transform: uppercase;
  width: 70px;
  font-weight: normal;
  color: #f3f3f6;
  line-height: normal;
}
.badge_get {
  background-color: #63a8e2;
}
.badge_post {
  background-color: #6cbd7d;
}
.badge_put {
  background-color: #22bac4;
}
.badge_delete {
  background-color: #d26460;
}
.badge_patch {
  background-color: #ccc444;
}
.list-group,
.panel-group {
  margin-bottom: 0;
}
.panel-group .panel+.panel-white {
  margin-top: 0;
}
.panel-group .panel-white {
  border-bottom: 1px solid #F5F5F5;
  border-radius: 0;
}
.panel-white:last-child {
  border-bottom-color: white;
  -webkit-box-shadow: none;
  box-shadow: none;
}
.panel-white .panel-heading {
  background: white;
}
.tab-pane ul {
  padding-left: 2em;
}
.tab-pane h1 {
  font-size: 1.3em;
}
.tab-pane h2 {
  font-size: 1.2em;
  padding-bottom: 4px;
  border-bottom: 1px solid #ddd;
}
.tab-pane h3 {
  font-size: 1.1em;
}
.tab-content {
  border-left: 1px solid #ddd;
  border-right: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  padding: 10px;
}
#sidebar {
  margin-top: 30px;
  padding-right: 5px;
  overflow: auto;
  height: 90%;
}
.top-resource-description {
  border-bottom: 1px solid #ddd;
  background: #fcfcfc;
  padding: 15px 15px 0 15px;
  margin: -15px -15px 10px -15px;
}
.resource-description {
  border-bottom: 1px solid #fcfcfc;
  background: #fcfcfc;
  padding: 15px 15px 0 15px;
  margin: -15px -15px 10px -15px;
}
.resource-description p:last-child {
  margin: 0;
}
.list-group .badge {
  float: left;
}
.method_description {
  margin-left: 85px;
}
.method_description p:last-child {
  margin: 0;
}
.list-group-item {
  cursor: pointer;
}
.list-group-item:hover {
  background-color: #f5f5f5;
}
pre code {
  overflow: auto;
  word-wrap: normal;
  white-space: pre;
}
.items {
  background: #f5f5f5;
  color: #333;
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 9.5px;
  margin: 0 0 10px;
  font-size: 13px;
  line-height: 1.42857143;
}
.examples {
  margin-left: 0.5em;
}
.resource-modal li > ul {
  margin-bottom: 1em;
}
.required {
  color: #f00;
}
    </style></head><body data-spy="scroll" data-target="#sidebar"><div class="container"><div class="row"><div class="col-md-9" role="main"><div class="page-header"><h1>Gerenciador Pericial API documentation <small>version v1.6</small></h1><p>https://191.252.202.56/fabrica/p05-ger-pericial/</p></div><div class="panel panel-default"><div class="panel-heading"><h3 id="account" class="panel-title">/account</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_account_verifytoken_json"><span class="parent">/account</span>/verifyToken.json</a> <span class="methods"><a href="#account_verifytoken_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_account_verifytoken_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#account_verifytoken_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint é responsável por realizar uma autenticação do token do usuário para liberar as permissões de acesso e modificação deste usuário. Atua diversas vezes no sistema, verificando se o token existe, não existe, é inválido, ou está expirado.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="account_verifytoken_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/account</span>/verifyToken.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por realizar uma autenticação do token do usuário para liberar as permissões de acesso e modificação deste usuário. Atua diversas vezes no sistema, verificando se o token existe, não existe, é inválido, ou está expirado.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#account_verifytoken_json_post_request" data-toggle="tab">Request</a></li><li><a href="#account_verifytoken_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="account_verifytoken_json_post_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>O identificador do usuário a ter seu token verificado.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>21</code></pre></div></li><li><strong>tokenCode</strong>: <em><span class="required">required</span>(string)</em><p>Código do token autenticador do usuário.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>0x e3b0cf991b7852b855342b516234fca213457</code></pre></div></li></ul></div><div class="tab-pane" id="account_verifytoken_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Token válido.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 12,
    "tokenCode": "0x e3b0cf991b7852b855342b516234fca213457"
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Token expirado, inválido ou inexistente.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 12,
    "tokenCode": "0x e3b0cf991b7852b855342b516234fca213457"
  },
"success": false,
"status": 400
}
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_account_changepass_json"><span class="parent">/account</span>/changePass.json</a> <span class="methods"><a href="#account_changepass_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_account_changepass_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#account_changepass_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint é responsável por trocar a senha do usuário.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="account_changepass_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/account</span>/changePass.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por trocar a senha do usuário.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#account_changepass_json_post_request" data-toggle="tab">Request</a></li><li><a href="#account_changepass_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="account_changepass_json_post_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>O identificador do usuário que vai mudar sua senha.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>25</code></pre></div></li><li><strong>password</strong>: <em><span class="required">required</span>(string)</em><p>A nova senha do usuário será utilizada para realização do login no sistema.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>12345678</code></pre></div></li></ul></div><div class="tab-pane" id="account_changepass_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Senha alterada com sucesso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 25,
    "password": "12345678"
  },
  "success": true,
  "status": 200
}
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>A senha não foi alterada. Por favor, tente novamente.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 25,
    "password": "12345678"
  },
  "success": false,
  "status": 400
}     
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_account_lostaccount_json"><span class="parent">/account</span>/lostAccount.json</a> <span class="methods"><a href="#account_lostaccount_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_account_lostaccount_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#account_lostaccount_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint é responsável por recuperar a conta de um usuário que esqueceu sua senha.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="account_lostaccount_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/account</span>/lostAccount.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por recuperar a conta de um usuário que esqueceu sua senha.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#account_lostaccount_json_post_request" data-toggle="tab">Request</a></li><li><a href="#account_lostaccount_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="account_lostaccount_json_post_request"><h3>Query Parameters</h3><ul><li><strong>email</strong>: <em><span class="required">required</span>(string)</em><p>O email do usuário será utilizado para realização da recuperação de conta.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>joao.sousa@email.com.br</code></pre></div></li></ul></div><div class="tab-pane" id="account_lostaccount_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Email de recuperação de senha enviado com sucesso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "email": "joao.sousa@email.com.br"
  },
  "success": true,
  "status": 200
}
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro. Email de recuperação de senha não enviado.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "email": "joao.sousa@email.com.br"
  },
  "success": false,
  "status": 400
}
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_account_confirmaccount_json"><span class="parent">/account</span>/confirmAccount.json</a> <span class="methods"><a href="#account_confirmaccount_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_account_confirmaccount_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#account_confirmaccount_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint é responsável por confirmar a conta de um novo usuário.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="account_confirmaccount_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/account</span>/confirmAccount.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por confirmar a conta de um novo usuário.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#account_confirmaccount_json_post_request" data-toggle="tab">Request</a></li><li><a href="#account_confirmaccount_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="account_confirmaccount_json_post_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>O identificador do usuário que vai ter sua conta confirmada.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>15</code></pre></div></li></ul></div><div class="tab-pane" id="account_confirmaccount_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>A conta foi confirmada com sucesso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 22
  },
  "success": true,
  "status": 200
}
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Conta não confirmada. Por Favor, tente novamente.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 22
  },
  "success": false,
  "status": 400
}
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_account_resendemail_json"><span class="parent">/account</span>/resendEmail.json</a> <span class="methods"><a href="#account_resendemail_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_account_resendemail_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#account_resendemail_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint é responsável por reenviar o email de confirmação da conta de um novo usuário.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="account_resendemail_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/account</span>/resendEmail.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por reenviar o email de confirmação da conta de um novo usuário.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#account_resendemail_json_post_request" data-toggle="tab">Request</a></li><li><a href="#account_resendemail_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="account_resendemail_json_post_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>O identificador do usuário que irá receber outro email de confirmação de conta.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>57</code></pre></div></li></ul></div><div class="tab-pane" id="account_resendemail_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>O email foi enviado com sucesso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 57
  },
  "success": true,
  "status": 200
}
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao enviar email.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 57
  },
  "success": false,
  "status": 400
}
</code></pre></div></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="login_json" class="panel-title">/login.json</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_login_json"><span class="parent"></span>/login.json</a> <span class="methods"><a href="#login_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_login_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#login_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint é responsável por realizar a autenticação (log in) do usuário no sistema, permitindo sua utilização.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="login_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent"></span>/login.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por realizar a autenticação (log in) do usuário no sistema, permitindo sua utilização.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#login_json_post_request" data-toggle="tab">Request</a></li><li><a href="#login_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="login_json_post_request"><h3>Query Parameters</h3><ul><li><strong>email</strong>: <em><span class="required">required</span>(string)</em><p>O email do usuário que quer entrar no sistema.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>maria.da.silva@email.com</code></pre></div></li><li><strong>password</strong>: <em><span class="required">required</span>(string)</em><p>A senha referente a esse usuário.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>12345678</code></pre></div></li></ul></div><div class="tab-pane" id="login_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Token válido.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "email": "maria.da.silva@email.com",
    "password": "123456789"
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Usuário ou senha inválidos.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "email": "maria.da.silva@email.com",
    "password": "123467892"
  },
"success": false,
"status": 400
}
</code></pre></div></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="reports" class="panel-title">/reports</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_reports_view_json"><span class="parent">/reports</span>/view.json</a> <span class="methods"><a href="#reports_view_json_get"><span class="badge badge_get">get</span></a></span></h4></div><div id="panel_reports_view_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#reports_view_json_get'" class="list-group-item"><span class="badge badge_get">get</span><div class="method_description"><p>Esse endpoint retorna todos os laudos registrados no sistema.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="reports_view_json_get"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get</span> <span class="parent">/reports</span>/view.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint retorna todos os laudos registrados no sistema.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#reports_view_json_get_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="reports_view_json_get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Sucesso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "success": true,
  "status": 200
}
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Você precisa de autorização para realizar essa requisição.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "success": false,
  "status": 400
}     
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_reports_add_json"><span class="parent">/reports</span>/add.json</a> <span class="methods"><a href="#reports_add_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_reports_add_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#reports_add_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint é responsável por adicionar um novo laudo ao sistema.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="reports_add_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/reports</span>/add.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por adicionar um novo laudo ao sistema.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#reports_add_json_post_request" data-toggle="tab">Request</a></li><li><a href="#reports_add_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="reports_add_json_post_request"><h3>Query Parameters</h3><ul><li><strong>report_id</strong>: <em><span class="required">required</span>(number)</em><p>Número de ordem do novo laudo.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>132</code></pre></div></li><li><strong>user_id</strong>: <em><span class="required">required</span>(number)</em><p>O perito responsável pela confecção do laudo.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>9</code></pre></div></li><li><strong>request_id</strong>: <em><span class="required">required</span>(number)</em><p>O perito responsável pela confecção do laudo.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>92</code></pre></div></li><li><strong>deliver_date</strong>: <em>(date-only)</em><p>Data da entrega do laudo.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>2020-05-15</code></pre></div></li><li><strong>receiver</strong>: <em>(string)</em><p>Servidor que recebeu o laudo pronto.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Antônio Sousa</code></pre></div></li><li><strong>status</strong>: <em>(string)</em><p>Situação atual do laudo.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Entregue</code></pre></div></li></ul></div><div class="tab-pane" id="reports_add_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>O laudo foi adicionado com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 433,
    "user_id": 123,
    "request_id": 55,
    "deliver_date": "2020/05/15",
    "receiver": "Antonio Silva",
    "status": "Entregue"
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao adicionar laudo.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"data": {
  "id": 433,
  "user_id": 123,
  "request_id": 55,
  "deliver_date": "2020/05/15",
  "receiver": "Antonio Silva",
  "status": "Entregue"
},
"success": false,
"status": 400
}
    
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_reports_edit_json"><span class="parent">/reports</span>/edit.json</a> <span class="methods"><a href="#reports_edit_json_put"><span class="badge badge_put">put</span></a> <a href="#reports_edit_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_reports_edit_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#reports_edit_json_put'" class="list-group-item"><span class="badge badge_put">put</span><div class="method_description"><p>Esse endpoint é responsável modificar um atributo dentro de um laudo já existente.</p></div><div class="clearfix"></div></div><div onclick="window.location.href = '#reports_edit_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint é responsável adicionar um atributo dentro de um laudo já existente.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="reports_edit_json_put"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_put">put</span> <span class="parent">/reports</span>/edit.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável modificar um atributo dentro de um laudo já existente.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#reports_edit_json_put_request" data-toggle="tab">Request</a></li><li><a href="#reports_edit_json_put_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="reports_edit_json_put_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>Identificação do laudo que será editado.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>68</code></pre></div></li><li><strong>data</strong>: <em><span class="required">required</span>(any)</em><p>Dado(s) a ser(em) adicionado(s) ou modificado(s) no laudo.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Marcos Mercadante</code></pre></div></li></ul></div><div class="tab-pane" id="reports_edit_json_put_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>O laudo foi modificado com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 65,
    "receiver": "Marcos de Souza",
    "status": "Aguardando laboratório"
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao modificar o laudo.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"data": {
  "id": 65,
  "receiver": "Marcos de Souza"
},
"success": false,
"status": 400
}
</code></pre></div></div></div></div></div></div></div><div class="modal fade" tabindex="0" id="reports_edit_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/reports</span>/edit.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável adicionar um atributo dentro de um laudo já existente.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#reports_edit_json_post_request" data-toggle="tab">Request</a></li><li><a href="#reports_edit_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="reports_edit_json_post_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>Identificação do laudo que será editado.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>32</code></pre></div></li><li><strong>data</strong>: <em><span class="required">required</span>(any)</em><p>Dado(s) a ser(em) adicionado(s) ou modificado(s) no laudo.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Marcos Mercadante</code></pre></div></li></ul></div><div class="tab-pane" id="reports_edit_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>O laudo foi modificado com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 32,
    "receiver": "Marcos de Souza"
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao modificar o laudo.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"data": {
  "id": 32,
  "receiver": "Marcos de Souza"
},
"success": false,
"status": 400
}
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_reports_delete_json"><span class="parent">/reports</span>/delete.json</a> <span class="methods"><a href="#reports_delete_json_delete"><span class="badge badge_delete">delete</span></a> <a href="#reports_delete_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_reports_delete_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#reports_delete_json_delete'" class="list-group-item"><span class="badge badge_delete">delete</span><div class="method_description"><p>Esse endpoint é responsável por excluir do banco de dados um laudo previamente adicionado.</p></div><div class="clearfix"></div></div><div onclick="window.location.href = '#reports_delete_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint é responsável por excluir do banco de dados um laudo previamente adicionado.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="reports_delete_json_delete"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_delete">delete</span> <span class="parent">/reports</span>/delete.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por excluir do banco de dados um laudo previamente adicionado.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#reports_delete_json_delete_request" data-toggle="tab">Request</a></li><li><a href="#reports_delete_json_delete_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="reports_delete_json_delete_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>Identificação do laudo que será excluído.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>51</code></pre></div></li></ul></div><div class="tab-pane" id="reports_delete_json_delete_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>O laudo foi excluído com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 51
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao tentar excluir laudo. Por favor, tente novamente.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"data": {
  "id": 41
},
"success": false,
"status": 400
}
</code></pre></div></div></div></div></div></div></div><div class="modal fade" tabindex="0" id="reports_delete_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/reports</span>/delete.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por excluir do banco de dados um laudo previamente adicionado.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#reports_delete_json_post_request" data-toggle="tab">Request</a></li><li><a href="#reports_delete_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="reports_delete_json_post_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>Identificação do laudo que será excluído.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>43</code></pre></div></li></ul></div><div class="tab-pane" id="reports_delete_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>O laudo foi excluído com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 43
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao tentar excluir laudo. Por favor, tente novamente.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"data": {
  "id": 41
},
"success": false,
"status": 400
}
                    
</code></pre></div></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="requesitions" class="panel-title">/requesitions</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_requesitions_view_json"><span class="parent">/requesitions</span>/view.json</a> <span class="methods"><a href="#requesitions_view_json_get"><span class="badge badge_get">get</span></a></span></h4></div><div id="panel_requesitions_view_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#requesitions_view_json_get'" class="list-group-item"><span class="badge badge_get">get</span><div class="method_description"><p>Esse endpoint retorna todas as requisições registradas no sistema.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="requesitions_view_json_get"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get</span> <span class="parent">/requesitions</span>/view.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint retorna todas as requisições registradas no sistema.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#requesitions_view_json_get_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="requesitions_view_json_get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Sucesso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "success": true,
  "status": 200
}
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Você precisa de autorização para realizar essa requisição.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "success": false,
  "status": 400
}     
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_requesitions_viewone__id__json"><span class="parent">/requesitions</span>/viewOne/{id}.json</a> <span class="methods"><a href="#requesitions_viewone__id__json_get"><span class="badge badge_get">get</span></a></span></h4></div><div id="panel_requesitions_viewone__id__json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#requesitions_viewone__id__json_get'" class="list-group-item"><span class="badge badge_get">get</span><div class="method_description"><p>Esse endpoint é responsável por exibir uma requisição específica do sistema.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="requesitions_viewone__id__json_get"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get</span> <span class="parent">/requesitions</span>/viewOne/{id}.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por exibir uma requisição específica do sistema.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#requesitions_viewone__id__json_get_request" data-toggle="tab">Request</a></li><li><a href="#requesitions_viewone__id__json_get_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="requesitions_viewone__id__json_get_request"><h3>URI Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(string)</em></li></ul><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>Identificação da requisição que será exibida.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>62</code></pre></div></li></ul></div><div class="tab-pane" id="requesitions_viewone__id__json_get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Sucesso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
  "id": 53
  },
  "success": true,
  "status": 200
}
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Requisição não encontrada.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
  "id": 46
  },
  "success": false,
  "status": 400
}     
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_requesitions_select_json"><span class="parent">/requesitions</span>/select.json</a> <span class="methods"><a href="#requesitions_select_json_get"><span class="badge badge_get">get</span></a></span></h4></div><div id="panel_requesitions_select_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#requesitions_select_json_get'" class="list-group-item"><span class="badge badge_get">get</span><div class="method_description"><p>Seleciona o perito que tiver cumprido a menor parcela de laudos. Em outras palavras, aquele que menos tiver feito laudo é escolhido. Em caso de empate, a escolha é feita de forma aleatória.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="requesitions_select_json_get"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get</span> <span class="parent">/requesitions</span>/select.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Seleciona o perito que tiver cumprido a menor parcela de laudos. Em outras palavras, aquele que menos tiver feito laudo é escolhido. Em caso de empate, a escolha é feita de forma aleatória.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#requesitions_select_json_get_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="requesitions_select_json_get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Sucesso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "success": true,
  "status": 200
}
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Você precisa de autorização para realizar essa requisição.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "success": false,
  "status": 400
}     
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_requesitions_add_json"><span class="parent">/requesitions</span>/add.json</a> <span class="methods"><a href="#requesitions_add_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_requesitions_add_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#requesitions_add_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint é responsável por adicionar uma nova requisição no sistema.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="requesitions_add_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/requesitions</span>/add.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por adicionar uma nova requisição no sistema.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#requesitions_add_json_post_request" data-toggle="tab">Request</a></li><li><a href="#requesitions_add_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="requesitions_add_json_post_request"><h3>Query Parameters</h3><ul><li><strong>descricao</strong>: <em>(string)</em><p>Descrição escrita da requisição e demais informações pertinentes.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Requisição de perícia de veículos</code></pre></div></li><li><strong>data_documento</strong>: <em>(date-only)</em><p>Data do documento que criou a nova requisição.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>2020-02-16</code></pre></div></li><li><strong>n_documento</strong>: <em>(string)</em><p>Número do documento que foi recebido e deu origem a uma nova requisição.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>578/2012</code></pre></div></li><li><strong>data_realizacao_pericia</strong>: <em>(date-only)</em><p>Data em que foi realizada a perícia.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>2019-09-30</code></pre></div></li><li><strong>data_recebimento</strong>: <em>(date-only)</em><p>Data de recebimento da requisição.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>2013-01-31</code></pre></div></li><li><strong>escrivao</strong>: <em>(string)</em><p>Escrivão responsável pelo recebimento da requisição.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Carla Marques</code></pre></div></li><li><strong>delegacia</strong>: <em>(string)</em><p>Delegacia de onde se originou a requisição.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>15ª DP Paranaíba</code></pre></div></li><li><strong>autoridade_requisitante</strong>: <em>(string)</em><p>Nome da autoridade que fez a requisição de perícia.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>João Paraná</code></pre></div></li><li><strong>logradouro</strong>: <em>(string)</em><p>Nome do logradouro onde ocorreu o crime.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Mato Grosso</code></pre></div></li><li><strong>tipo_logradouro</strong>: <em>(string)</em><p>Tipo do logradouro onde ocorreu o crime.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Avenida</code></pre></div></li><li><strong>nmr_logradouro</strong>: <em>(string)</em><p>Número do logradouro onde ocorreu o crime.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>3332</code></pre></div></li><li><strong>bairro</strong>: <em>(string)</em><p>Nome do bairro onde ocorreu o crime.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Centro</code></pre></div></li><li><strong>cidade</strong>: <em>(string)</em><p>Nome da cidade onde ocorreu o crime.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Paranaíba</code></pre></div></li><li><strong>n_laudos_expedidos</strong>: <em>(string)</em><p>Número de laudos que foram originados da requisição.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>3</code></pre></div></li><li><strong>cargo</strong>: <em>(string)</em><p>Cargo do remetente da requisição.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Delegado</code></pre></div></li><li><strong>observacoes</strong>: <em>(string)</em><p>Demais informações sobre a requisição.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Perícia urgente</code></pre></div></li><li><strong>n_oficio</strong>: <em>(string)</em><p>Número do ofício que originou a requisição.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>22/2019</code></pre></div></li><li><strong>tipo_pericia</strong>: <em>(string)</em><p>O tipo de perícia a ser realizada pelo perito responsável.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Balística</code></pre></div></li><li><strong>exame_pericia</strong>: <em>(string)</em><p>O exame relacionado ao objetivo da perícia.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Exame in loco</code></pre></div></li><li><strong>n_bo</strong>: <em>(string)</em><p>Número do boletim de ocorrência relacionado com a requisição.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>123/2016</code></pre></div></li><li><strong>n_ip</strong>: <em>(string)</em><p>Número do Inquérito Policial relacionado com a requisição.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>23/2016</code></pre></div></li><li><strong>outros_proc</strong>: <em>(string)</em><p>Outros processos relacionados com a requisição.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Ofício n° 215 do 11º DP de Cassilândia</code></pre></div></li><li><strong>nome_vitima</strong>: <em>(string)</em><p>Nome da vítima relacionada com a requisição.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Claudio Castro</code></pre></div></li></ul></div><div class="tab-pane" id="requesitions_add_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>O laudo foi adicionado com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 59,
    "user_id": 7,
    "deliver_date": "2020/05/15",
    "receiver": "Antonio Silva",
    "status": "Entregue"
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao adicionar laudo.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"data": {
  "id": 66,
  "user_id": 8,
  "deliver_date": "2020/05/15",
  "receiver": "Antonio Silva",
  "status": "Entregue"
},
"success": false,
"status": 400
}
    
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_requesitions_edit_json"><span class="parent">/requesitions</span>/edit.json</a> <span class="methods"><a href="#requesitions_edit_json_put"><span class="badge badge_put">put</span></a> <a href="#requesitions_edit_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_requesitions_edit_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#requesitions_edit_json_put'" class="list-group-item"><span class="badge badge_put">put</span><div class="method_description"><p>Esse endpoint é responsável por modificar dentro de uma requisição já existente.</p></div><div class="clearfix"></div></div><div onclick="window.location.href = '#requesitions_edit_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint é responsável por adicionar um atributo dentro de uma requisição já existente.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="requesitions_edit_json_put"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_put">put</span> <span class="parent">/requesitions</span>/edit.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por modificar dentro de uma requisição já existente.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#requesitions_edit_json_put_request" data-toggle="tab">Request</a></li><li><a href="#requesitions_edit_json_put_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="requesitions_edit_json_put_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>Identificação da requisição que será editada.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>11</code></pre></div></li><li><strong>data</strong>: <em><span class="required">required</span>(any)</em><p>Dado(s) a ser(em) adicionado(s) ou modificado(s) na requisição.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>5ª Delegacia de Polícia</code></pre></div></li></ul></div><div class="tab-pane" id="requesitions_edit_json_put_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>A requisição foi modificada com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 65,
    "data_realizacao_pericia": "15/07/2014",
    "tipo_pericia": "Balística"
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao modificar a requisição.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"data": {
  "id": 22,
  "tipo_pericia": "Balística"
},
"success": false,
"status": 400
}
</code></pre></div></div></div></div></div></div></div><div class="modal fade" tabindex="0" id="requesitions_edit_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/requesitions</span>/edit.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por adicionar um atributo dentro de uma requisição já existente.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#requesitions_edit_json_post_request" data-toggle="tab">Request</a></li><li><a href="#requesitions_edit_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="requesitions_edit_json_post_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>Identificação da requisição que será editada.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>32</code></pre></div></li><li><strong>data</strong>: <em><span class="required">required</span>(any)</em><p>Dado(s) a ser(em) adicionado(s) ou modificado(s) na requisição.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Marcos</code></pre></div></li></ul></div><div class="tab-pane" id="requesitions_edit_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>A requisição foi modificada com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 77,
    "escrivao": "Fabio Pereira"
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao modificar a requisição.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"data": {
  "id": 32,
  "escrivao": "Marcos de Souza",
  "cargo": "Escrivão de Polícia"
},
"success": false,
"status": 400
}
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_requesitions_delete_json"><span class="parent">/requesitions</span>/delete.json</a> <span class="methods"><a href="#requesitions_delete_json_delete"><span class="badge badge_delete">delete</span></a> <a href="#requesitions_delete_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_requesitions_delete_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#requesitions_delete_json_delete'" class="list-group-item"><span class="badge badge_delete">delete</span><div class="method_description"><p>Esse endpoint é responsável por excluir do banco de dados uma requisição previamente adicionada.</p></div><div class="clearfix"></div></div><div onclick="window.location.href = '#requesitions_delete_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint é responsável por excluir do banco de dados uma requisição previamente adicionada.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="requesitions_delete_json_delete"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_delete">delete</span> <span class="parent">/requesitions</span>/delete.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por excluir do banco de dados uma requisição previamente adicionada.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#requesitions_delete_json_delete_request" data-toggle="tab">Request</a></li><li><a href="#requesitions_delete_json_delete_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="requesitions_delete_json_delete_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>Identificação da requisição que será excluída.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>6543</code></pre></div></li></ul></div><div class="tab-pane" id="requesitions_delete_json_delete_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>A requisição foi excluída com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 553
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao tentar excluir a requisição. Por favor, tente novamente.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"data": {
  "id": 235
},
"success": false,
"status": 400
}
</code></pre></div></div></div></div></div></div></div><div class="modal fade" tabindex="0" id="requesitions_delete_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/requesitions</span>/delete.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por excluir do banco de dados uma requisição previamente adicionada.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#requesitions_delete_json_post_request" data-toggle="tab">Request</a></li><li><a href="#requesitions_delete_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="requesitions_delete_json_post_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>Identificação da requisição que será excluída.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>6543</code></pre></div></li></ul></div><div class="tab-pane" id="requesitions_delete_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>A requisição foi excluída com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 553
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao tentar excluir a requisição. Por favor, tente novamente.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"data": {
  "id": 235
},
"success": false,
"status": 400
}
</code></pre></div></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="roles" class="panel-title">/roles</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_roles_add_json"><span class="parent">/roles</span>/add.json</a> <span class="methods"><a href="#roles_add_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_roles_add_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#roles_add_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint permite ao administrador cadastrar um novo cargo.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="roles_add_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/roles</span>/add.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint permite ao administrador cadastrar um novo cargo.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#roles_add_json_post_request" data-toggle="tab">Request</a></li><li><a href="#roles_add_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="roles_add_json_post_request"><h3>Query Parameters</h3><ul><li><strong>name</strong>: <em><span class="required">required</span>(string)</em><p>O nome do cargo que será adicionado no sistema.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Inspetor de Cybercrimes</code></pre></div></li></ul></div><div class="tab-pane" id="roles_add_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Cargo registrado com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "name":"Inspetor"
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao tentar resgistrar cargo.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
   "data": {
     "name":"Inspetor"
 },
 "success": false,
 "status": 400
 }
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_roles_edit_json"><span class="parent">/roles</span>/edit.json</a> <span class="methods"><a href="#roles_edit_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_roles_edit_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#roles_edit_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint permite ao administrador editar um novo cargo existente.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="roles_edit_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/roles</span>/edit.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint permite ao administrador editar um novo cargo existente.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#roles_edit_json_post_request" data-toggle="tab">Request</a></li><li><a href="#roles_edit_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="roles_edit_json_post_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>Identificação do cargo que será editado.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>3</code></pre></div></li><li><strong>data</strong>: <em><span class="required">required</span>(string)</em><p>Dado(s) a ser(em) adicionado(s) ou modificado(s) no cargo.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Inspetor de Armas</code></pre></div></li></ul></div><div class="tab-pane" id="roles_edit_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Cargo modificado com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id":"4",
    "data":"Inspetor Sênior"
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao tentar modificar cargo.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
   "data": {
     "id":"4",
     "data":"Inspetor Sênior"
 },
 "success": false,
 "status": 400
 }
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_roles_delete_json"><span class="parent">/roles</span>/delete.json</a> <span class="methods"><a href="#roles_delete_json_delete"><span class="badge badge_delete">delete</span></a></span></h4></div><div id="panel_roles_delete_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#roles_delete_json_delete'" class="list-group-item"><span class="badge badge_delete">delete</span><div class="method_description"><p>Esse endpoint é responsável por excluir do banco de dados um cargo previamente registrado.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="roles_delete_json_delete"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_delete">delete</span> <span class="parent">/roles</span>/delete.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por excluir do banco de dados um cargo previamente registrado.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#roles_delete_json_delete_request" data-toggle="tab">Request</a></li><li><a href="#roles_delete_json_delete_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="roles_delete_json_delete_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>Identificação do cargo que será excluído.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>3</code></pre></div></li></ul></div><div class="tab-pane" id="roles_delete_json_delete_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>O cargo foi excluído com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 4
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao tentar excluir cargo. Por favor, tente novamente.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"data": {
  "id": 4
},
"success": false,
"status": 400
}
</code></pre></div></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="users" class="panel-title">/users</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_users_verifyuser_json"><span class="parent">/users</span>/verifyUser.json</a> <span class="methods"><a href="#users_verifyuser_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_users_verifyuser_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#users_verifyuser_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint permite ao usuário realizar uma confirmação de seu email.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="users_verifyuser_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/users</span>/verifyUser.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint permite ao usuário realizar uma confirmação de seu email.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#users_verifyuser_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="users_verifyuser_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Usuário verificado com sucesso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Usuário não pode ser verificado. Por favor, tente novamente.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"success": false,
"status": 400
}
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_users_uploadfile_json"><span class="parent">/users</span>/uploadFile.json</a> <span class="methods"><a href="#users_uploadfile_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_users_uploadfile_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#users_uploadfile_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint permite que um usuário carregue no sistema uma foto de perfil.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="users_uploadfile_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/users</span>/uploadFile.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint permite que um usuário carregue no sistema uma foto de perfil.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#users_uploadfile_json_post_request" data-toggle="tab">Request</a></li><li><a href="#users_uploadfile_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="users_uploadfile_json_post_request"><h3>Query Parameters</h3><ul><li><strong>photo</strong>: <em><span class="required">required</span>(file)</em><p>Arquivo de imagem a ser carregado.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>foto.jpg</code></pre></div></li></ul></div><div class="tab-pane" id="users_uploadfile_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Imagem alterada com sucesso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "photo": "foto.jpg"
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Ocorreu um erro ao tentar salvar a imagem. Por favor, tente novamente.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"data": {
  "photo": "foto.jpg"
},
"success": false,
"status": 400
}
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_users_viewunusers_json"><span class="parent">/users</span>/viewUnUsers.json</a> <span class="methods"><a href="#users_viewunusers_json_get"><span class="badge badge_get">get</span></a></span></h4></div><div id="panel_users_viewunusers_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#users_viewunusers_json_get'" class="list-group-item"><span class="badge badge_get">get</span><div class="method_description"><p>Esse endpoint retorna todos os usuários do sistema que ainda não foram autorizados por um administrador.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="users_viewunusers_json_get"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get</span> <span class="parent">/users</span>/viewUnUsers.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint retorna todos os usuários do sistema que ainda não foram autorizados por um administrador.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#users_viewunusers_json_get_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="users_viewunusers_json_get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Sucesso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "success": true,
  "status": 200
}
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Você precisa de autorização para realizar essa requisição.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "success": false,
  "status": 400
}     
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_users_viewusers_json"><span class="parent">/users</span>/viewUsers.json</a> <span class="methods"><a href="#users_viewusers_json_get"><span class="badge badge_get">get</span></a></span></h4></div><div id="panel_users_viewusers_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#users_viewusers_json_get'" class="list-group-item"><span class="badge badge_get">get</span><div class="method_description"><p>Esse endpoint retorna todos os usuários do sistema já autorizados por um administrador.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="users_viewusers_json_get"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get</span> <span class="parent">/users</span>/viewUsers.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint retorna todos os usuários do sistema já autorizados por um administrador.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#users_viewusers_json_get_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="users_viewusers_json_get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Sucesso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "success": true,
  "status": 200
}
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Você precisa de autorização para realizar essa requisição.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "success": false,
  "status": 400
}     
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_users_authorizeuser_json"><span class="parent">/users</span>/authorizeUser.json</a> <span class="methods"><a href="#users_authorizeuser_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_users_authorizeuser_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#users_authorizeuser_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint permite que um administrador autorize um novo usuário a utilizar o sistema.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="users_authorizeuser_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/users</span>/authorizeUser.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint permite que um administrador autorize um novo usuário a utilizar o sistema.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#users_authorizeuser_json_post_request" data-toggle="tab">Request</a></li><li><a href="#users_authorizeuser_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="users_authorizeuser_json_post_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>Identificação do usuário que será autorizado.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>68</code></pre></div></li><li><strong>role_id</strong>: <em><span class="required">required</span>(number)</em><p>Atributo a ser associado ao usuário, ocasionando sua autorização.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>1</code></pre></div></li></ul></div><div class="tab-pane" id="users_authorizeuser_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Usuário foi autorizado com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": "102"
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao tentar autorizar usuário.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"data": {
  "id": "102"
},
"success": false,
"status": 400
}
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_users_unauthorizeuser_json"><span class="parent">/users</span>/unauthorizeUser.json</a> <span class="methods"><a href="#users_unauthorizeuser_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_users_unauthorizeuser_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#users_unauthorizeuser_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint permite que um administrador desautorize um usuário a utilizar o sistema.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="users_unauthorizeuser_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/users</span>/unauthorizeUser.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint permite que um administrador desautorize um usuário a utilizar o sistema.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#users_unauthorizeuser_json_post_request" data-toggle="tab">Request</a></li><li><a href="#users_unauthorizeuser_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="users_unauthorizeuser_json_post_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>Identificação do usuário que será desautorizado.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>68</code></pre></div></li></ul></div><div class="tab-pane" id="users_unauthorizeuser_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Usuário foi desautorizado com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": "102"
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao tentar desautorizar usuário.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"data": {
  "id": "102"
},
"success": false,
"status": 400
}
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_users_promoteuser_json"><span class="parent">/users</span>/promoteUser.json</a> <span class="methods"><a href="#users_promoteuser_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_users_promoteuser_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#users_promoteuser_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint permite que um administrador promova um usuário normal do sistema para um usuário administrador.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="users_promoteuser_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/users</span>/promoteUser.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint permite que um administrador promova um usuário normal do sistema para um usuário administrador.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#users_promoteuser_json_post_request" data-toggle="tab">Request</a></li><li><a href="#users_promoteuser_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="users_promoteuser_json_post_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>Identificação do usuário que será desautorizado.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>68</code></pre></div></li><li><strong>role_id</strong>: <em><span class="required">required</span>(number)</em><p>Atributo a ser modificado dentro de um usuário, o transformando em usuário administrador.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>2</code></pre></div></li></ul></div><div class="tab-pane" id="users_promoteuser_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Usuário foi desautorizado com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 102,
    "role_id": 2
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao tentar desautorizar usuário.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"data": {
  "id": 23,
  "role_id": 2
},
"success": false,
"status": 400
}
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_users_add_json"><span class="parent">/users</span>/add.json</a> <span class="methods"><a href="#users_add_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_users_add_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#users_add_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint é responsável por adicionar um novo usuário ao sistema, enviando a ele um email de confirmação após a adição.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="users_add_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/users</span>/add.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por adicionar um novo usuário ao sistema, enviando a ele um email de confirmação após a adição.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#users_add_json_post_request" data-toggle="tab">Request</a></li><li><a href="#users_add_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="users_add_json_post_request"><h3>Query Parameters</h3><ul><li><strong>email</strong>: <em><span class="required">required</span>(string)</em><p>O email do usuário será utilizado para realização do login no sistema.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>joao.silva@email.com</code></pre></div></li><li><strong>password</strong>: <em><span class="required">required</span>(string)</em><p>A senha do usuário será utilizada para realização do login no sistema.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>12345678</code></pre></div></li><li><strong>name</strong>: <em><span class="required">required</span>(string)</em><p>O nome completo do usuário.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>João Silva</code></pre></div></li><li><strong>phone</strong>: <em><span class="required">required</span>(string)</em><p>O telefone do usuário.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>55 66666 9999</code></pre></div></li><li><strong>position</strong>: <em><span class="required">required</span>(string)</em><p>O cargo do usuário dentro da Polícia Civil.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>Agente de Polícia Científica</code></pre></div></li></ul></div><div class="tab-pane" id="users_add_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Usuário registrado com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "email":"joao.silva@email.com",
    "password": "12345678",
    “name”: “João Silva”,
    “phone”: “55 66666 9999”,
    “position”: “Agente de Polícia Científica”
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao tentar resgistrar usuário.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
 "data": {
   "email":"joao.silva@email.com",
   "password": "12345678",
   “name”: “João Silva”,
   “phone”: “55 66666 9999”,
   “position”: “Agente de Polícia Científica”
 },
 "success": false,
 "status": 400
 }
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_users_edit_json"><span class="parent">/users</span>/edit.json</a> <span class="methods"><a href="#users_edit_json_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_users_edit_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#users_edit_json_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Esse endpoint é responsável por modificar um atributo de algum usuário já cadastrado no sistema.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="users_edit_json_post"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/users</span>/edit.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por modificar um atributo de algum usuário já cadastrado no sistema.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#users_edit_json_post_request" data-toggle="tab">Request</a></li><li><a href="#users_edit_json_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="users_edit_json_post_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>Identificação do usuário que será editado.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>32</code></pre></div></li><li><strong>data</strong>: <em><span class="required">required</span>(any)</em><p>Dado(s) a ser(em) adicionado(s) ou modificado(s) no usuário.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>email@email.com</code></pre></div></li></ul></div><div class="tab-pane" id="users_edit_json_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>O usuário foi editado com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 32,
    "email": "maria.silva@email.com.br"
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao editar o usário.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"data": {
  "id": 32,
  "email": "maria.silva@email.com.br"
},
"success": false,
"status": 400
}
</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_users_delete_json"><span class="parent">/users</span>/delete.json</a> <span class="methods"><a href="#users_delete_json_delete"><span class="badge badge_delete">delete</span></a></span></h4></div><div id="panel_users_delete_json" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#users_delete_json_delete'" class="list-group-item"><span class="badge badge_delete">delete</span><div class="method_description"><p>Esse endpoint é responsável por excluir do banco de dados um usuário previamente registrado.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="users_delete_json_delete"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_delete">delete</span> <span class="parent">/users</span>/delete.json</h4></div><div class="modal-body"><div class="alert alert-info"><p>Esse endpoint é responsável por excluir do banco de dados um usuário previamente registrado.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#users_delete_json_delete_request" data-toggle="tab">Request</a></li><li><a href="#users_delete_json_delete_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="users_delete_json_delete_request"><h3>Query Parameters</h3><ul><li><strong>id</strong>: <em><span class="required">required</span>(number)</em><p>Identificação do usuário que será excluído.</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>51</code></pre></div></li></ul></div><div class="tab-pane" id="users_delete_json_delete_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>O usuário foi excluído com sucessso.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "data": {
    "id": 51
  },
  "success": true,
  "status": 200
  }
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/400" target="_blank">400</a></h2><p>Erro ao tentar excluir usuário. Por favor, tente novamente.</p><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: any</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
"data": {
  "id": 41
},
"success": false,
"status": 400
}
</code></pre></div></div></div></div></div></div></div></div></div></div></div></div><div class="col-md-3"><div id="sidebar" class="hidden-print affix" role="complementary"><ul class="nav nav-pills nav-stacked"><li><a href="#account">/account</a></li><li><a href="#login_json">/login.json</a></li><li><a href="#reports">/reports</a></li><li><a href="#requesitions">/requesitions</a></li><li><a href="#roles">/roles</a></li><li><a href="#users">/users</a></li></ul></div></div></div></div></body></html>