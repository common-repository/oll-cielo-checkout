<?php
if((isset($attributes['id']) && (int)$attributes['id'] > 0)):
$html = <<<HTML
<div id="animatedModal" class="cielo-hide">
    <!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID  class="close-animatedModal" -->
    <div id="closebt-container" class="close-lightSpeedIn close-animatedModal">
    	<span></span> 
    </div>
    <div class="modal-content">
        <iframe class="iframe-checkout-cielo" frameborder="0" width="100%" height="500"></iframe>
    </div>
</div>
<a href="#!" class="{$attributes['class']} cielo-checkout-action" data-id="{$attributes['id']}"> <span></span> {$attributes['label']} </a>
<a href="#animatedModal" class="cielo-checkout-modal-btn cielo-hide" style="display: none;"> .oll </a>
HTML;
else:
	$html = '<i><small><b>Problema Cielo Checkout</b> Informe o ID do recurso cielo.</small></i>';
endif;
?>