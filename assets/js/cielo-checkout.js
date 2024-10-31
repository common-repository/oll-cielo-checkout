jQuery(document).ready(function($){
   var selectorModal = jQuery('#animatedModal');
   var selectorModalBtn = jQuery('.cielo-checkout-modal-btn');
   var selectorModalIframe = jQuery('.iframe-checkout-cielo');
   var selectorButton = jQuery('.cielo-checkout-action');
   var data = {};

   var color = selectorButton.attr('data-color');
   selectorModalBtn.animatedModal({
      overflow: 'hidden',
      color: color
   });
   selectorButton.click(function(){
      selectorModal.removeClass('cielo-hide');
      data.id = $(this).attr('data-id');
      if(!$(this).hasClass('cielo-in-use')){
         $(this).addClass('cielo-in-use');

         if(!$(this).hasClass('cielo-done')){
            //REQUEST CIELO
            $('span', this).addClass('cielo-load');
            cieloAjax(cieloOll.ajax_url, {
               action: 'process_cielo_checkout',
               nonce: cieloOll.ajax_nonce,
               name: 'Orlando Lacerda',
               id: data.id
            });
         }else{
            $(this).removeClass('cielo-in-use');
            selectorModalBtn.click();
         }
      }
   });



   function cieloAjax(url, data){
      jQuery.ajax({
         type: 'post',
         dataType: 'json',
         url: url,
         data: data,
         complete: 'callBack'
      }).done(function (result){

         if(result.data !== null && result.data.settings && result.status === true){
            selectorButton.addClass('cielo-done').removeClass('cielo-in-use');
            $('span', selectorButton).removeClass('cielo-load');

            var checkout = result.data.settings.checkoutUrl;
            selectorModalIframe.attr('src', checkout);
            selectorModalBtn.click();
            setTimeout(function(){
               selectorModalIframe.height(window.innerHeight);
            }, 1000)
         }else if(result.status === false){
            alert(result.msg);
         }else{
            alert('Ocorreu um erro ao processar seu pagamento, tente novamente. (1)');
         }
         selectorButton.removeClass('cielo-in-use');
         $('span', selectorButton).removeClass('cielo-load');
      }).error(function(e){
         selectorButton.removeClass('cielo-in-use');
         $('span', selectorButton).removeClass('cielo-load');
         alert('Ocorreu um erro ao processar seu pagamento, tente novamente. (2)');
      });
   }
   
   // jQuery(".cielo-checkout-action").click( function() {
   //    post_id = jQuery(this).attr("data-post_id")
   //    nonce = jQuery(this).attr("data-nonce")
   //    console.log(post_id);
   //    console.log(nonce);

   //    jQuery.ajax({
   //       type : "post",
   //       dataType : "json",
   //       url : cieloOll.ajaxurl,
   //       data : {action: "my_user_vote", post_id : post_id, nonce: nonce},
   //       success: function(response) {
   //          if(response.type == "success") {
   //             jQuery("#vote_counter").html(response.vote_count)
   //          }
   //          else {
   //             alert("Your vote could not be added")
   //          }
   //       }
   //    })   

   // })
}) 