<?php

if(isset($_POST['enviar'])) {

    $nome           = strip_tags(trim($_POST['nome']));
    $fone           = strip_tags(trim($_POST['fone']));
    $Whatsapp       = strip_tags(trim($_POST['Whatsapp']));
    $email          = addslashes(trim($_POST['email']));
    $assunto        = addslashes(trim($_POST['assunto']));
    $mensagem       = addslashes(trim($_POST['mensagem']));
    $data = date('Y-m-d h:i:s');
    $ipcliente = $_SERVER['REMOTE_ADDR'];

    $data = date('d-m-Y H:i');
    $ipcliente = $_SERVER['REMOTE_ADDR'];
    $nomeremetente = "Contato site - Teste";
    $emailremetente = "contato@teste.com.br";
    $emaildestinatario = "contato@teste.com.br";
    $emailsender = "contato@teste.com.br";

    /* Verifica qual éo sistema operacional do servidor para ajustar o cabeçalho de forma correta.  */
    if (PATH_SEPARATOR == ";") $quebra_linha = "\r\n"; //Se for Windows
    else $quebra_linha = "\n"; //Se "nÃ£o for Windows"
    /* Montando a mensagem a ser enviada no corpo do e-mail. */
    $mensagemHTML = '<P>Formulário enviado através do site -> SIL MASSOTERAPIA</P>

<P>Nome: ' . $nome . '</P>
<P>Fone°: ' . $fone . '</P>
<P>E-mail: ' . $email . '</P>
<P>Whatsapp: ' . $Whatsapp . '</P>
<P>Assunto: ' . $assunto . '</P>
<P>Mensagem: ' . $mensagem . '</P>
<P>Data: ' . $data . '</P>
<P>IP: ' . $ipcliente . '</P>

<p>.</p>
<p>.</p>
<hr>';
    /* Montando o cabeÃ§alho da mensagem */
    $headers = "MIME-Version: 1.1" . $quebra_linha;
    $headers .= "Content-type: text/html; charset=utf-8" . $quebra_linha;
// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
    $headers .= "From: " . $emailsender . $quebra_linha;
    $headers .= "Reply-To: " . $emailremetente . $quebra_linha;
//É obrigatório o uso do parâmetro -r (concatenação do "From na linha de envio"), aqui na Locaweb:
    if (!mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r" . $emailsender)) { // Se for Postfix
        $headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "não for Postfix"
        mail($emaildestinatario, $assunto, $mensagemHTML, $headers);
    }

    echo "<script>window.location = 'index.php?pagina=msg'</script>";
}
?>
<section class="hero-wrap js-fullheight" style="background-image: url('contato2.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-3 bread">Página de contato</h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section contact-section">
    <div class="container">
        <div class="row block-9">
            <div class="col-md-4 contact-info ftco-animate bg-light p-4">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <h2 class="h4">Contato e informações</h2>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Endereço:</span> R. dos Pinheiros, Fraiburgo - SC </p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Fone:</span> <a href="tel://9999999">49 9999-9999</a></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Email:</span> <a href="mailto:contato@teste.com.br">contato@teste.com.br</a></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Website:</span> <a href="#">www.teste.com.br/</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6 ftco-animate">
                <form name="novo" action="" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="nome" class="form-control" placeholder="Nome">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="fone" class="form-control" placeholder="Telefone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="Whatsapp" class="form-control" placeholder="Whatsapp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="E-mail">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="assunto" class="form-control" placeholder="Assunto">
                    </div>
                    <div class="form-group">
                        <textarea name="mensagem" cols="30" rows="7" class="form-control" placeholder="Mensagem"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="enviar" value="Enviar mensagem" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3554.337529146162!2d-50.92994538495281!3d-27.019498383081626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e13a2a08704f9d%3A0xed6a0f1107645dab!2sR.%20dos%20Pinheiros%2C%20107%20-%20Santa%20M%C3%94NICA%2C%20Fraiburgo%20-%20SC%2C%2089580-000!5e0!3m2!1spt-BR!2sbr!4v1591722990491!5m2!1spt-BR!2sbr" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
