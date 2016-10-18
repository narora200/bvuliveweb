$(document).ready(function(){



	$position_res = $('#e_position').selectize({
        
        persist: false
    });
    $position = $position_res[0].selectize;
    $position.setValue(document.getElementById('pseudo_position').value);




});