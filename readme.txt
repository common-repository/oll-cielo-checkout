=== OLL Cielo Checkout ===
Contributors: orlandolac
Donate link: http://orlandolacerda.com/
Tags: cielo, payments, checkout, credit card, cielo checkout, cielo api
Requires at least: 3.0.1
Tested up to: 4.7.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 
Um plugin extremamente simples e direto com foco no resultado e independente de plataformas.
 
== Description ==
Versão Gratuita

* Requer o plugin Advanced Custom Fields PRO
Um plugin extremamente simples e direto com foco no resultado. O plugin foi desenvolvido para funcionar independente de plataformas WooCommerce e afins, o que te liberta para adaptá-lo a suas necessidades. Incluso, cadastro de produtos e serviços.

* Cadastro de Produtos e Serviços (Produtos Digitais e Serviços, Retirada na Loja)
* Modo de Entrega Desativado
	* (quando desativado) Sem cobrança de frete (aplicável para serviços e produtos digitais).
* Suporta Múltiplas Contas Cielo
	* Pode ser utilizada a mesma integração para empresas distintas, como em filiais por exemplo.
* Alteração do texto do botão através do shortcode
 
Versão PRO

* Todas as opções da versão gratuita
* Cadastro de Produtos e Serviços (Material Físico, Produtos Digitais e Serviços)
* Aplicar Desconto por Tipo (Porcentagem, fixa)
* Aplicar Desconto por Metódo de Pagamento (Boleto, Cartãó de Débito)
* Ativar/Desativar Modo de Entrega 
	* Correios (É necessário uma configuração prévia no Backoffice Cielo.)
	* Frete com Valor Fixo
	* Frete Grátis
	* Retirada na Loja
	* (quando desativado) Sem cobrança de frete (aplicável para serviços e produtos digitais).
* Ativar/Desativar modo Antifraude (Proteção contra fraude, chargeback)
* Ativar/Desativar Pagamento Recorrente 
	* Mensal, Bimestral, Trimestral, Semestral ou Anual e Quantidade máxima de cobranças
* Alteração da cor do modal através do shortcode 

 
== Installation ==
 
Esta sessão descreve os requísitos e como instalar o plugin.

IMPORTANTE:
Este plugin requer o plugin Advanced Custom Fields PRO instalado
 
 
1. Envie a pasta do plugin  para o diretório `/wp-content/plugins/`
1. Ative o plugin através da aba 'Plugins' na Administração
1. Clique no novo menu "Cielo" e depois em "filiais"
1. Crie uma filial e insira o MerchantId (Código Informado pela Cielo)
1. Crie um novo produto em Cielo - Adicionar Novo
1. Inclua o código ...php do_action('[cielo-checkout-oll id='{codigo_pagamento}']'); ?> em seu template
	* Substitua o {codigo_pagamento} pelo id de seu post cielo.
	* Você também pode informar o parametro label no shortcode para mudar o título do botão, exemplo (label="Comprar")
 
== Frequently Asked Questions ==

= O plugin cria algum menu na interface administrativa? =
 
Sim. O menu possuí um ícone de "olhinho" juntamente com o nome "Cielo".

= É necessário conhecimento técnico para utilizar este plugin? =
 
Definitivamente não. Qualquer pessoa que leia bem a documentação conseguirá utilizar este plugin com bastante facilidade, se atente ao conteúdo e dicas de instalação e você terá o resultado que espera.

= Quanto custa a versão PRO e como faço para adquiri-la ? =
 
Quando você compra um plugin você não só estará ajudando a manter o projeto ativo e atualizado como também recebe suporte eficiente para seu negócio. A versão PRO é vitalícia e você poderá utilizar em seus projetos. (Preço R$ 129,90) Você não está autorizado a revende-la.
 
= Requer Advanced Custom Fields PRO =
 
Sim. Você precisará da versão PRO do plugin Advanced Custom Fields para usar este plugin.

= Quantos shortcode do plugin posso colocar em uma página? =
 
O plugin apenas suporta um único botão por página. Você pode ter botões ilimitados desde que seja em páginas distintas.

= Aonde é inserido o código da integração da Cielo? =
 
O código chamado de "MerchantId" pela Cielo, é o seu código único da loja. Você poderá incluir códigos ilimitados de lojas distintas na página de Filial do Plugin.
 
= Como é cadastrado os produtos e serviços ? =
 
Através do menu "Cielo" presente na administração do Wordpress, lá você poderá especificar quais os produtos/serviços que estão sendo cobrados, Especificar o nome, valor, quantidade e um código próprio (sku).
 
== Screenshots ==
 
1. Acesse através do Painel Administrativo do Wordpress
2. Cadastre uma ou mais filiais para a integração de acordo com sua necessidade
3. Cadastre produto e serviços de forma simples e eficiente
4. Inclua o código shortcode de acordo como sugerido no guia de instalação, informe o código do produto a ser faturado
5. O Cliente clicará no botão e pronto! um modal animado com a tela de pagamento será aberto.