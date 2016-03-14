/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    $('#ecb').click(function (){
        $('#ecm').modal('show')
                .find('#ecc')
                .load($(this).attr('value'));
    });
});
