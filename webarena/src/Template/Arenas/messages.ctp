<?php

echo "Send message to: ";

echo $this->Form->create(NULL);
echo $this->Form->input('prix', ['type'=>'select','options'=>($fightersNameAndId), 'empty'=>'Choose a fighter']);
echo $this->Form->end();
 ?>
<div id="listeDiv"></div>

<br /><br /><br />


<script>
$(function () {
  $("#prix").bind('input', function () {
            $.ajax({
                url: "<?= $this->Url->build(['controller'=>'arenas','action'=>'liste'])?>",
                data: {
                    prix: $("#prix").val()
                },
                dataType: 'html',
                type: 'post',
                success: function (html) {
                    $("#listeDiv").html(html);
                }
            })
        });
      })



</script>
